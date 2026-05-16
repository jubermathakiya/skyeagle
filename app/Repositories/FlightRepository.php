<?php

namespace App\Repositories;

use App\Contracts\FlightApiContract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FlightRepository
{
    public function __construct(
        protected FlightApiContract $flightApi,
        protected AirportRepository $airportRepository
    ) {
    }

    public function search(Request $request): array
    {
        $criteria = $this->buildCriteria($request);
        $response = $this->flightApi->search($criteria);
        $flights = collect($response['data'] ?? []);
        $perPage = (int) config('flights.search.per_page', 9);
        $page = max(1, (int) $request->query('page', 1));

        $paginator = $this->paginateCollection($flights, $perPage, $page, $request);

        return [
            'flights' => $paginator,
            'criteria' => $criteria,
            'meta' => $response['meta'] ?? ['total' => $flights->count()],
            'originAirport' => $this->airportRepository->findByCode((string) ($criteria['origin'] ?? '')),
            'destinationAirport' => $this->airportRepository->findByCode((string) ($criteria['destination'] ?? '')),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function buildCriteria(Request $request): array
    {
        $tripType = (string) $request->query(
            'trip_type',
            config('flights.search.default_trip_type', 'oneway')
        );
        $allowedTripTypes = ['oneway', 'roundtrip', 'multiway'];

        if (!in_array($tripType, $allowedTripTypes, true)) {
            $tripType = 'oneway';
        }

        $cabinClass = (string) $request->query(
            'cabin_class',
            config('flights.search.default_cabin_class', 'Economy')
        );

        $departureDate = $this->normalizeDate((string) $request->query('departure_date', ''));
        $returnDate = $this->normalizeDate((string) $request->query('return_date', ''));

        if ($departureDate === '') {
            $departureDate = Carbon::today()->addDays(3)->toDateString();
        }

        if ($tripType !== 'roundtrip') {
            $returnDate = '';
        }

        return [
            'trip_type' => $tripType,
            'origin' => strtoupper(trim((string) $request->query('origin', ''))),
            'destination' => strtoupper(trim((string) $request->query('destination', ''))),
            'origin_city' => trim((string) $request->query('origin_city', '')),
            'destination_city' => trim((string) $request->query('destination_city', '')),
            'departure_date' => $departureDate,
            'return_date' => $returnDate,
            'adults' => max(1, (int) $request->query('adults', 1)),
            'children' => max(0, (int) $request->query('children', 0)),
            'infants' => max(0, (int) $request->query('infants', 0)),
            'cabin_class' => $cabinClass,
        ];
    }

    private function normalizeDate(string $value): string
    {
        $value = trim($value);

        if ($value === '') {
            return '';
        }

        $formats = ['Y-m-d', 'd-m-Y', 'd/m/Y', 'm/d/Y'];

        foreach ($formats as $format) {
            try {
                return Carbon::createFromFormat($format, $value)->toDateString();
            } catch (\Throwable) {
                continue;
            }
        }

        try {
            return Carbon::parse($value)->toDateString();
        } catch (\Throwable) {
            return '';
        }
    }

    private function paginateCollection(
        Collection $items,
        int $perPage,
        int $page,
        Request $request
    ): LengthAwarePaginator {
        $total = $items->count();
        $results = $items->forPage($page, $perPage)->values();

        return new LengthAwarePaginator(
            $results,
            $total,
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
    }
}
