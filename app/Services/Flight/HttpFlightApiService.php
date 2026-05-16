<?php

namespace App\Services\Flight;

use App\Contracts\FlightApiContract;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class HttpFlightApiService implements FlightApiContract
{
    public function search(array $criteria): array
    {
        $baseUrl = config('flights.api.base_url');

        if ($baseUrl === '') {
            throw new RuntimeException('FLIGHT_API_BASE_URL is not configured.');
        }

        $endpoint = config('flights.api.search_endpoint', '/search');
        $response = Http::timeout(config('flights.api.timeout', 15))
            ->acceptJson()
            ->get($baseUrl . $endpoint, $criteria);

        $response->throw();

        $payload = $response->json();

        return [
            'data' => $payload['data'] ?? [],
            'meta' => $payload['meta'] ?? [
                'total' => count($payload['data'] ?? []),
                'source' => 'api',
            ],
        ];
    }
}
