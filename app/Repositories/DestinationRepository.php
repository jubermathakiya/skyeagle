<?php

namespace App\Repositories;

use App\Models\Destination;
use App\Models\Toures;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class DestinationRepository extends BaseRepository
{
    public function __construct(Destination $model)
    {
        parent::__construct($model);
    }

    public function getActiveDestinations(int $perPage = 12): LengthAwarePaginator
    {
        $destinations = Destination::query()
            ->where('status', 1)
            ->latest()
            ->paginate($perPage);

        $destinations->getCollection()->each(fn (Destination $destination) => $this->setPackagesCount($destination));

        return $destinations;
    }

    public function getHomeDestinations(int $limit = 8): Collection
    {
        $destinations = Destination::query()
            ->where('status', 1)
            ->latest()
            ->limit($limit)
            ->get();

        $destinations->each(fn (Destination $destination) => $this->setPackagesCount($destination));

        return $destinations;
    }

    public function getDestinationDetails(string $slug): Destination
    {
        $destination = Destination::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return $this->setPackagesCount($destination);
    }

    public function getPackagesForDestination(Destination $destination, int $perPage = 6): LengthAwarePaginator
    {
        return $this->matchingPackagesQuery($destination)
            ->with(['images' => fn ($query) => $query->limit(4), 'category'])
            ->latest()
            ->paginate($perPage);
    }

    protected function setPackagesCount(Destination $destination): Destination
    {
        $destination->setAttribute('packages_count', $this->matchingPackagesQuery($destination)->count());

        return $destination;
    }

    protected function matchingPackagesQuery(Destination $destination): Builder
    {
        return Toures::query()
            ->where('status', 1)
            ->where(function (Builder $query) use ($destination) {
                $query->where('destination_id', $destination->id);

                foreach ([$destination->city, $destination->name] as $location) {
                    if (filled($location)) {
                        $query->orWhere('destination_city', 'like', '%' . addcslashes($location, '%_\\') . '%');
                    }
                }
            });
    }
}
