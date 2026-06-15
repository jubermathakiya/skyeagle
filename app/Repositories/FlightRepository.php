<?php

namespace App\Repositories;

use App\Contracts\FlightApiContract;
use App\Services\Flight\TravelpayoutsFlightApiService;
use Illuminate\Http\Request;

class FlightRepository
{
    public function __construct(private readonly FlightApiContract $flightApi)
    {
    }

    public function search(Request|array $input): array
    {
        $criteria = $input instanceof Request ? $input->query() : $input;

        return $this->flightApi->search($criteria);
    }

    public function trending(int $limit = 6): array
    {
        $search = $this->flightApi->search([
            'origin' => 'AMD',
            'destination' => 'DEL',
            'departure_at' => now()->addMonth()->format('Y-m-d'),
            'currency' => 'inr',
            'limit' => $limit,
        ]);

        return array_slice($search['flights'], 0, $limit);
    }

    public function find(string $id, Request $request): ?array
    {
        if ($this->flightApi instanceof TravelpayoutsFlightApiService) {
            $cached = $this->flightApi->findCached($id);

            if ($cached) {
                return $cached;
            }
        }

        $search = $this->search($request);

        return collect($search['flights'])->firstWhere('id', $id) ?: collect($search['flights'])->first();
    }
}
