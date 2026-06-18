<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\PackageAttribute;
use App\Models\Toures;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ToureRepository extends BaseRepository
{
    public function __construct(Toures $model)
    {
        parent::__construct($model);
    }

    public function getTours(Request $request)
    {
        $allowedTypes = ['Domestic', 'International'];
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
        if ($isTrending) {
            $packagesQuery->where('is_trending', 1);
        }
        if (in_array($selectedType, $allowedTypes, true)) {
            $packagesQuery->where('booking_type', $selectedType);
        }
        if ($selectedDestination !== '') {
            $like = '%' . addcslashes($selectedDestination, '%_\\') . '%';
            $packagesQuery->where(function ($query) use ($like) {
                $query->where('destination_city', 'like', $like)
                    ->orWhere('source_city', 'like', $like);
            });
        }
        if (!empty($selectedCategoryIds)) {
            $packagesQuery->whereIn('categories_id', $selectedCategoryIds);
        }
        foreach ($selectedAttributeIds as $attributeId) {
            $packagesQuery->whereHas('packageAttributes', function ($query) use ($attributeId) {
                $query->where('package_attributes.id', $attributeId)
                    ->where('package_attributes.status', 1);
            });
        }
        if ($tourTypeSearch !== '') {
            $packagesQuery->whereHas('category', function ($query) use ($tourTypeSearch) {
                $query->where('name', 'like', '%' . $tourTypeSearch . '%');
            });
        }
        $perPage = $isTrending ? 8 : 5;
        $packages = $packagesQuery
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
        return [
            'packages' => $packages,
            'categories' => $categories,
            'selectedType' => $selectedType,
            'selectedDestination' => $selectedDestination,
            'selectedCategoryIds' => $selectedCategoryIds,
            'selectedAttributeIds' => $selectedAttributeIds,
            'packageAttributeGroups' => $packageAttributeGroups,
            'tourTypeSearch' => $tourTypeSearch,
            'isTrending' => $isTrending,
        ];
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
