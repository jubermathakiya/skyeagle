<?php

namespace App\Repositories;

use App\Models\Destination;
use App\Models\Toures;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DestinationRepository extends BaseRepository
{
    public function __construct(Destination $model)
    {
        parent::__construct($model);
    }

    public function getActiveDestinations(int $perPage = 12): LengthAwarePaginator
    {
        return Destination::query()
            ->withCount(['packages' => fn ($query) => $query->where('status', 1)])
            ->where('status', 1)
            ->latest()
            ->paginate($perPage);
    }

    public function getHomeDestinations(int $limit = 8): Collection
    {
        return Destination::query()
            ->withCount(['packages' => fn ($query) => $query->where('status', 1)])
            ->where('status', 1)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function getDestinationDetails(string $slug): Destination
    {
        return Destination::query()
            ->withCount(['packages' => fn ($query) => $query->where('status', 1)])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function getPackagesForDestination(Destination $destination, int $perPage = 6): LengthAwarePaginator
    {
        return Toures::with(['images' => fn ($query) => $query->limit(4), 'category'])
            ->where('status', 1)
            ->where(function ($query) use ($destination) {
                $query->where('destination_id', $destination->id);

                if (filled($destination->city)) {
                    $query->orWhere('destination_city', 'like', '%' . addcslashes($destination->city, '%_\\') . '%');
                }

                if (filled($destination->name)) {
                    $query->orWhere('destination_city', 'like', '%' . addcslashes($destination->name, '%_\\') . '%');
                }
            })
            ->latest()
            ->paginate($perPage);
    }
}
