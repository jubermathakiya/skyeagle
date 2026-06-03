<?php

namespace App\Repositories;

use App\Models\Category;
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
        $categories = Category::query()
            ->select(['id', 'name'])
            ->when($tourTypeSearch !== '', function ($query) use ($tourTypeSearch) {
                $query->where('name', 'like', '%' . $tourTypeSearch . '%');
            })
            ->orderBy('name')
            ->get();
        $packagesQuery = Toures::with([
            'images' => function ($query) {
                $query->limit(4);
            },
            'category',
        ])->where('status', 1);
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
        if ($tourTypeSearch !== '') {
            $packagesQuery->whereHas('category', function ($query) use ($tourTypeSearch) {
                $query->where('name', 'like', '%' . $tourTypeSearch . '%');
            });
        }
        $packages = $packagesQuery
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return [
            'packages' => $packages,
            'categories' => $categories,
            'selectedType' => $selectedType,
            'selectedDestination' => $selectedDestination,
            'selectedCategoryIds' => $selectedCategoryIds,
            'tourTypeSearch' => $tourTypeSearch,
        ];
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