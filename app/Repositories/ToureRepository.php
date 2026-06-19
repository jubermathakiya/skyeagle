<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\PackageAttribute;
use App\Models\Toures;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ToureRepository extends BaseRepository
{
    private const ALLOWED_TYPES = ['Domestic', 'International'];

    public function __construct(Toures $model)
    {
        parent::__construct($model);
    }

    public function getTours(Request $request)
    {
        $selectedType = $request->query('type');
        $selectedDestination = trim((string) $request->query('destination_city', ''));
        $tourTypeSearch = trim((string) $request->query('tour_type_search', ''));
        $selectedCategoryIds = collect($request->query('categories', []))
            ->map(static fn ($id) => (int) $id)
            ->filter(static fn ($id) => $id > 0)
            ->unique()
            ->values()
            ->all();
        $selectedAttributeIds = collect($request->query('attributes', []))
            ->map(static fn ($id) => (int) $id)
            ->filter(static fn ($id) => $id > 0)
            ->unique()
            ->values()
            ->all();
        $categories = Category::query()
            ->select(['id', 'name'])
            ->when($tourTypeSearch !== '', function ($query) use ($tourTypeSearch) {
                $query->where('name', 'like', '%' . $tourTypeSearch . '%');
            })
            ->orderBy('name')
            ->get();
        $packageAttributeGroups = PackageAttribute::query()
            ->select(['id', 'type', 'name', 'sort_order'])
            ->where('status', 1)
            ->orderBy('type')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->groupBy('type');
        $isTrending = $request->boolean('is_trending');
        $imageLimit = $isTrending ? 3 : 4;
        $packagesQuery = Toures::with([
            'images' => function ($query) use ($imageLimit) {
                $query->limit($imageLimit);
            },
            'category',
            'packageAttributes',
        ])->where('status', 1);
        $this->applyTourFilters(
            $packagesQuery,
            $selectedType,
            $selectedDestination,
            $selectedCategoryIds,
            $selectedAttributeIds,
            $tourTypeSearch,
            $isTrending
        );
        $perPage = $isTrending ? 8 : 5;
        $packages = $packagesQuery
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
        return [
            'packages' => $packages,
            'categories' => $categories,
            'topTourCategories' => $this->getTopTourCategories(
                $selectedType,
                $selectedDestination,
                $selectedAttributeIds,
                $tourTypeSearch,
                $isTrending
            ),
            'selectedType' => $selectedType,
            'selectedDestination' => $selectedDestination,
            'selectedCategoryIds' => $selectedCategoryIds,
            'selectedAttributeIds' => $selectedAttributeIds,
            'packageAttributeGroups' => $packageAttributeGroups,
            'tourTypeSearch' => $tourTypeSearch,
            'isTrending' => $isTrending,
        ];
    }

    private function applyTourFilters(
        $query,
        ?string $selectedType,
        string $selectedDestination,
        array $selectedCategoryIds,
        array $selectedAttributeIds,
        string $tourTypeSearch,
        bool $isTrending,
        bool $includeCategoryFilter = true
    ): void {
        if ($isTrending) {
            $query->where('is_trending', 1);
        }

        if (in_array($selectedType, self::ALLOWED_TYPES, true)) {
            $query->where('booking_type', $selectedType);
        }

        if ($selectedDestination !== '') {
            $like = '%' . addcslashes($selectedDestination, '%_\\') . '%';
            $query->where(function ($query) use ($like) {
                $query->where('destination_city', 'like', $like)
                    ->orWhere('source_city', 'like', $like);
            });
        }

        if ($includeCategoryFilter && !empty($selectedCategoryIds)) {
            $query->whereIn('categories_id', $selectedCategoryIds);
        }

        foreach ($selectedAttributeIds as $attributeId) {
            $query->whereHas('packageAttributes', function ($query) use ($attributeId) {
                $query->where('package_attributes.id', $attributeId)
                    ->where('package_attributes.status', 1);
            });
        }

        if ($tourTypeSearch !== '') {
            $query->whereHas('category', function ($query) use ($tourTypeSearch) {
                $query->where('name', 'like', '%' . $tourTypeSearch . '%');
            });
        }
    }

    private function getTopTourCategories(
        ?string $selectedType,
        string $selectedDestination,
        array $selectedAttributeIds,
        string $tourTypeSearch,
        bool $isTrending,
        int $limit = 6
    ): Collection
    {
        $topCategoryRows = Toures::query()
            ->select('categories_id', DB::raw('COUNT(*) as tours_count'))
            ->where('status', 1)
            ->whereNotNull('categories_id');

        $this->applyTourFilters(
            $topCategoryRows,
            $selectedType,
            $selectedDestination,
            [],
            $selectedAttributeIds,
            $tourTypeSearch,
            $isTrending,
            false
        );

        $topCategoryRows = $topCategoryRows
            ->groupBy('categories_id')
            ->orderByDesc('tours_count')
            ->orderBy('categories_id')
            ->limit($limit)
            ->get();

        if ($topCategoryRows->isEmpty()) {
            return collect();
        }

        $categories = Category::query()
            ->select(['id', 'name'])
            ->whereIn('id', $topCategoryRows->pluck('categories_id'))
            ->get()
            ->keyBy('id');

        return $topCategoryRows
            ->map(function ($row) use ($categories, $selectedType, $selectedDestination, $selectedAttributeIds, $tourTypeSearch, $isTrending) {
                $category = $categories->get((int) $row->categories_id);

                if (!$category) {
                    return null;
                }

                $package = Toures::with([
                    'images' => function ($query) {
                        $query->where('status', 1)
                            ->orderBy('id')
                            ->limit(1);
                    },
                ])
                    ->where('status', 1)
                    ->where('categories_id', $category->id)
                    ->whereHas('images', function ($query) {
                        $query->where('status', 1);
                    });

                $this->applyTourFilters(
                    $package,
                    $selectedType,
                    $selectedDestination,
                    [],
                    $selectedAttributeIds,
                    $tourTypeSearch,
                    $isTrending,
                    false
                );

                $package = $package
                    ->latest()
                    ->first();

                $category->setAttribute('top_count', (int) $row->tours_count);
                $category->setAttribute('tours_count', (int) $row->tours_count);
                $category->setAttribute('image_url', backend_image($package?->images?->first()?->image));

                return $category;
            })
            ->filter()
            ->values();
    }

    public function getTrendingTours(int $limit = 8)
    {
        return Toures::with([
            'images' => function ($query) {
                $query->limit(3);
            },
            'category',
        ])
            ->where('status', 1)
            ->where('is_trending', 1)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function searchTourCities(string $term, int $limit = 20): Collection
    {
        $term = trim($term);
        $like = $term !== '' ? '%' . addcslashes($term, '%_\\') . '%' : null;

        $destinationQuery = Toures::query()
            ->where('status', 1)
            ->whereNotNull('destination_city')
            ->where('destination_city', '!=', '');

        $sourceQuery = Toures::query()
            ->where('status', 1)
            ->whereNotNull('source_city')
            ->where('source_city', '!=', '');

        if ($like !== null) {
            $destinationQuery->where('destination_city', 'like', $like);
            $sourceQuery->where('source_city', 'like', $like);
        }

        return $destinationQuery
            ->distinct()
            ->pluck('destination_city')
            ->merge(
                $sourceQuery
                    ->distinct()
                    ->pluck('source_city')
            )
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->take($limit);
    }

    public function getTourDetails(string $slug)
    {
        return Toures::with([
            'images',
            'faqs',
            'highlights',
            'itinerary'
        ])
        ->where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();
    }
}
