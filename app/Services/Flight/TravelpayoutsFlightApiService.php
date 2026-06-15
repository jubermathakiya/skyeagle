<?php

namespace App\Services\Flight;

use App\Contracts\FlightApiContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TravelpayoutsFlightApiService implements FlightApiContract
{
    private const FALLBACK_AIRLINES = [
        'AI' => 'Air India',
        '6E' => 'Indigo',
        'UK' => 'Vistara',
        'QP' => 'Akasa Air',
        'SG' => 'SpiceJet',
        'G8' => 'Go First',
    ];

    public function search(array $criteria): array
    {
        $criteria = $this->normalizeCriteria($criteria);
        $cacheKey = 'flights.search.v2.' . md5(json_encode($criteria));

        return Cache::remember($cacheKey, now()->addMinutes((int) config('services.travelpayouts.cache_ttl', 15)), function () use ($criteria) {
            $response = $this->fetchFromProvider($criteria);
            $flights = $this->normalizeProviderRows($response['rows'], $criteria);

            if (empty($flights)) {
                $flights = $this->fallbackFlights($criteria);
            }

            foreach ($flights as $flight) {
                Cache::put($this->detailCacheKey($flight['id']), $flight, now()->addMinutes(30));
            }

            return [
                'criteria' => $criteria,
                'flights' => $flights,
                'meta' => [
                    'is_live' => $response['is_live'],
                    'provider' => 'travelpayouts',
                    'message' => $response['message'],
                ],
            ];
        });
    }

    public function findCached(string $id): ?array
    {
        return Cache::get($this->detailCacheKey($id));
    }

    private function fetchFromProvider(array $criteria): array
    {
        $token = config('services.travelpayouts.token');

        if (blank($token)) {
            return [
                'rows' => [],
                'is_live' => false,
                'message' => 'Travelpayouts token is not configured.',
            ];
        }

        $query = [
            'origin' => $criteria['origin'],
            'destination' => $criteria['destination'],
            'departure_at' => $criteria['departure_at'],
            'currency' => $criteria['currency'],
            'limit' => $criteria['limit'],
            'token' => $token,
        ];

        if (filled(config('services.travelpayouts.marker'))) {
            $query['marker'] = config('services.travelpayouts.marker');
        }

        if ($criteria['trip_type'] === 'roundtrip' && filled($criteria['return_at'])) {
            $query['return_at'] = $criteria['return_at'];
        }

        try {
            $http = Http::timeout((int) config('services.travelpayouts.timeout', 15));

            if (! (bool) config('services.travelpayouts.verify_ssl', true)) {
                $http = $http->withoutVerifying();
            }

            $endpoint = rtrim(config('services.travelpayouts.base_url'), '/') . '/' . ltrim(config('services.travelpayouts.prices_endpoint'), '/');

            if ((bool) config('services.travelpayouts.log_requests', false)) {
                Log::info('Travelpayouts flight API request', [
                    'endpoint' => $endpoint,
                    'origin' => $criteria['origin'],
                    'destination' => $criteria['destination'],
                    'departure_at' => $criteria['departure_at'],
                    'return_at' => $criteria['return_at'],
                    'currency' => $criteria['currency'],
                    'limit' => $criteria['limit'],
                ]);
            }

            $response = $http->get($endpoint, $query);

            if (! $response->successful()) {
                return [
                    'rows' => [],
                    'is_live' => false,
                    'message' => 'Flight API returned status ' . $response->status() . '.',
                ];
            }

            $payload = $response->json();

            return [
                'rows' => is_array($payload['data'] ?? null) ? $payload['data'] : [],
                'is_live' => true,
                'message' => null,
            ];
        } catch (\Throwable $exception) {
            report($exception);

            return [
                'rows' => [],
                'is_live' => false,
                'message' => 'Flight API is currently unavailable.',
            ];
        }
    }

    private function normalizeProviderRows(array $rows, array $criteria): array
    {
        return collect($rows)
            ->filter(fn ($row) => is_array($row))
            ->values()
            ->map(fn ($row, $index) => $this->normalizeFlight($row, $criteria, $index))
            ->all();
    }

    private function normalizeFlight(array $row, array $criteria, int $index): array
    {
        $airlineCode = strtoupper((string) ($row['airline'] ?? 'AI'));
        $airline = self::FALLBACK_AIRLINES[$airlineCode] ?? $airlineCode;
        $departureAt = $this->formatDate($row['departure_at'] ?? $criteria['departure_at']);
        $returnAt = $this->formatDate($row['return_at'] ?? $criteria['return_at'] ?? null);
        $transfers = (int) ($row['transfers'] ?? 0);
        $price = (float) ($row['price'] ?? 0);

        $flight = [
            'provider' => 'travelpayouts',
            'origin' => strtoupper((string) ($row['origin'] ?? $criteria['origin'])),
            'destination' => strtoupper((string) ($row['destination'] ?? $criteria['destination'])),
            'origin_airport' => strtoupper((string) ($row['origin_airport'] ?? $criteria['origin'])),
            'destination_airport' => strtoupper((string) ($row['destination_airport'] ?? $criteria['destination'])),
            'origin_name' => $this->airportLabel($row['origin'] ?? $criteria['origin']),
            'destination_name' => $this->airportLabel($row['destination'] ?? $criteria['destination']),
            'airline_code' => $airlineCode,
            'airline' => $airline,
            'flight_number' => (string) ($row['flight_number'] ?? (($index + 101) . '')),
            'title' => trim($airline . ' ' . ($row['flight_number'] ?? ($index + 101))),
            'price' => $price > 0 ? $price : (3500 + ($index * 850)),
            'currency' => strtoupper($criteria['currency']),
            'departure_at' => $departureAt,
            'return_at' => $returnAt,
            'transfers' => $transfers,
            'stop_text' => $transfers === 0 ? 'Non-stop' : $transfers . '-stop',
            'duration' => $this->formatDuration($row['duration'] ?? null),
            'link' => $this->buildAffiliateLink($row['link'] ?? null),
            'seats_left' => max(8, 28 - $index),
            'rating' => number_format(4.1 + (($index % 9) / 10), 1),
            'image' => $this->flightImagePath($index),
            'large_images' => $this->largeImages(),
            'thumb_images' => $this->thumbImages(),
            'raw' => $row,
        ];

        $flight['id'] = sha1(implode('|', [
            $flight['origin'],
            $flight['destination'],
            $flight['airline_code'],
            $flight['flight_number'],
            $flight['departure_at'],
            $flight['return_at'],
            $flight['price'],
        ]));

        return $flight;
    }

    private function normalizeCriteria(array $criteria): array
    {
        $tripType = in_array($criteria['trip_type'] ?? null, ['oneway', 'roundtrip', 'multiway'], true)
            ? $criteria['trip_type']
            : 'oneway';

        $departure = $this->normalizeDate($criteria['departure_at'] ?? null, now()->addMonth()->toDateString());
        $return = $tripType === 'roundtrip'
            ? $this->normalizeDate($criteria['return_at'] ?? null, Carbon::parse($departure)->addDays(2)->toDateString())
            : null;

        return [
            'trip_type' => $tripType,
            'origin' => $this->normalizeAirportCode($criteria['origin'] ?? 'AMD'),
            'destination' => $this->normalizeAirportCode($criteria['destination'] ?? 'DEL'),
            'departure_at' => $departure,
            'return_at' => $return,
            'currency' => strtolower((string) ($criteria['currency'] ?? config('services.travelpayouts.currency', 'inr'))),
            'limit' => max(1, min((int) ($criteria['limit'] ?? 10), 30)),
            'adults' => max(1, (int) ($criteria['adults'] ?? 1)),
            'children' => max(0, (int) ($criteria['children'] ?? 0)),
            'infants' => max(0, (int) ($criteria['infants'] ?? 0)),
            'cabin_class' => $criteria['cabin_class'] ?? 'Economy',
        ];
    }

    private function normalizeAirportCode(string $value): string
    {
        $value = strtoupper(trim($value));
        $lookupKey = $this->airportLookupKey($value);

        $aliases = $this->airportAliases();

        if (isset($aliases[$value])) {
            return $aliases[$value];
        }

        if (isset($aliases[$lookupKey])) {
            return $aliases[$lookupKey];
        }

        foreach ($aliases as $alias => $code) {
            if (strlen($lookupKey) >= 5 && abs(strlen($alias) - strlen($lookupKey)) <= 2 && levenshtein($lookupKey, $alias) <= 2) {
                return $code;
            }
        }

        if (preg_match('/\(([A-Z]{3})\)/', $value, $matches)) {
            return $matches[1];
        }

        if (preg_match('/^[A-Z]{3}$/', $value)) {
            return $value;
        }

        return Str::upper(Str::substr(preg_replace('/[^A-Z]/', '', $value), 0, 3)) ?: 'AMD';
    }

    private function normalizeDate(?string $value, string $fallback): string
    {
        $value = trim((string) $value);

        foreach (['Y-m-d', 'd-m-Y', 'd/m/Y', 'Y-m'] as $format) {
            try {
                $date = Carbon::createFromFormat($format, $value);

                return $date->format('Y-m-d');
            } catch (\Throwable) {
                //
            }
        }

        try {
            return Carbon::parse($value ?: $fallback)->format('Y-m-d');
        } catch (\Throwable) {
            return Carbon::parse($fallback)->format('Y-m-d');
        }
    }

    private function formatDate(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Throwable) {
            return null;
        }
    }

    private function formatDuration(mixed $minutes): string
    {
        $minutes = (int) $minutes;

        if ($minutes <= 0) {
            return '2h 10m';
        }

        return intdiv($minutes, 60) . 'h ' . ($minutes % 60) . 'm';
    }

    private function buildAffiliateLink(?string $link): ?string
    {
        if (blank($link)) {
            return null;
        }

        if (str_starts_with($link, 'http')) {
            return $link;
        }

        return 'https://www.aviasales.com' . $link;
    }

    private function airportLabel(string $code): string
    {
        $airport = collect(config('flight.airports', []))
            ->firstWhere('code', strtoupper($code));

        return $airport['city'] ?? strtoupper($code);
    }

    private function flightImagePath(int $index): string
    {
        return 'build/img/flight/flight-' . str_pad((string) (($index % 10) + 1), 2, '0', STR_PAD_LEFT) . '.jpg';
    }

    private function largeImages(): array
    {
        return collect(range(1, 6))
            ->map(fn ($number) => 'build/img/flight/flight-large-' . str_pad((string) $number, 2, '0', STR_PAD_LEFT) . '.jpg')
            ->all();
    }

    private function thumbImages(): array
    {
        return collect(range(1, 6))
            ->map(fn ($number) => 'build/img/flight/flight-thumb-' . str_pad((string) $number, 2, '0', STR_PAD_LEFT) . '.jpg')
            ->all();
    }

    private function airportAliases(): array
    {
        return collect(config('flight.airports', []))
            ->flatMap(function (array $airport) {
                $code = strtoupper($airport['code']);
                $keys = collect([
                    $airport['code'] ?? null,
                    $airport['city'] ?? null,
                    $airport['airport'] ?? null,
                ])
                    ->merge($airport['aliases'] ?? [])
                    ->filter()
                    ->map(fn ($value) => strtoupper(trim((string) $value)));

                return $keys->flatMap(fn ($key) => [
                    $key => $code,
                    $this->airportLookupKey($key) => $code,
                ]);
            })
            ->all();
    }

    private function airportLookupKey(string $value): string
    {
        return preg_replace('/[^A-Z0-9]/', '', strtoupper($value)) ?: '';
    }

    private function fallbackFlights(array $criteria): array
    {
        $rows = [
            ['airline' => 'AI', 'flight_number' => '102', 'price' => 5200, 'transfers' => 0],
            ['airline' => '6E', 'flight_number' => '345', 'price' => 6100, 'transfers' => 1],
            ['airline' => 'UK', 'flight_number' => '215', 'price' => 7350, 'transfers' => 0],
            ['airline' => 'QP', 'flight_number' => '789', 'price' => 6800, 'transfers' => 1],
            ['airline' => 'SG', 'flight_number' => '505', 'price' => 5900, 'transfers' => 0],
            ['airline' => 'AI', 'flight_number' => '333', 'price' => 8400, 'transfers' => 1],
        ];

        return collect($rows)
            ->take($criteria['limit'])
            ->values()
            ->map(fn ($row, $index) => $this->normalizeFlight($row, $criteria, $index))
            ->all();
    }

    private function detailCacheKey(string $id): string
    {
        return 'flights.detail.v2.' . $id;
    }
}
