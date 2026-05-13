<?php

namespace App\Services\Flight;

use App\Contracts\FlightApiContract;
use Carbon\Carbon;

class DummyFlightApiService implements FlightApiContract
{
    public function search(array $criteria): array
    {
        $origin = strtoupper((string) ($criteria['origin'] ?? ''));
        $destination = strtoupper((string) ($criteria['destination'] ?? ''));
        $departureDate = (string) ($criteria['departure_date'] ?? '');
        $returnDate = (string) ($criteria['return_date'] ?? '');
        $cabinClass = (string) ($criteria['cabin_class'] ?? 'Economy');
        $tripType = (string) ($criteria['trip_type'] ?? 'oneway');
        $adults = max(1, (int) ($criteria['adults'] ?? 1));
        $children = max(0, (int) ($criteria['children'] ?? 0));
        $infants = max(0, (int) ($criteria['infants'] ?? 0));

        $catalog = $this->catalog();
        $results = array_values(array_filter($catalog, function (array $flight) use (
            $origin,
            $destination,
            $departureDate,
            $cabinClass,
            $tripType
        ) {
            if ($origin !== '' && strtoupper($flight['origin_code']) !== $origin) {
                return false;
            }

            if ($destination !== '' && strtoupper($flight['destination_code']) !== $destination) {
                return false;
            }

            if ($departureDate !== '' && $flight['departure_date'] !== $departureDate) {
                return false;
            }

            if ($cabinClass !== '' && strcasecmp($flight['cabin_class'], $cabinClass) !== 0) {
                return false;
            }

            if ($tripType === 'roundtrip' && empty($flight['return_date'])) {
                return false;
            }

            if ($tripType === 'oneway' && !empty($flight['return_date'])) {
                return false;
            }

            return true;
        }));

        if ($results === [] && ($origin === '' || $destination === '')) {
            $results = $catalog;
        }

        $passengerCount = $adults + $children + $infants;

        $results = array_map(function (array $flight) use ($passengerCount, $returnDate, $tripType) {
            $flight['price'] = (float) $flight['base_price'] * max(1, $passengerCount);
            $flight['passenger_count'] = $passengerCount;

            if ($tripType === 'roundtrip' && $returnDate !== '') {
                $flight['return_date'] = $returnDate;
            }

            return $flight;
        }, $results);

        return [
            'data' => $results,
            'meta' => [
                'total' => count($results),
                'source' => 'dummy',
            ],
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function catalog(): array
    {
        $today = Carbon::today();

        return [
            [
                'id' => 'SKY-101',
                'slug' => 'sky-101-del-bom',
                'origin_code' => 'DEL',
                'origin_city' => 'New Delhi',
                'origin_airport' => 'Indira Gandhi International Airport',
                'destination_code' => 'BOM',
                'destination_city' => 'Mumbai',
                'destination_airport' => 'Chhatrapati Shivaji Maharaj International Airport',
                'airline_name' => 'Air India',
                'airline_logo' => 'build/img/icons/airindia.svg',
                'flight_name' => 'SkyEagle 101',
                'stops_label' => 'Non-stop',
                'departure_date' => $today->copy()->addDays(3)->toDateString(),
                'return_date' => null,
                'cabin_class' => 'Economy',
                'base_price' => 5200,
                'seats_left' => 18,
                'rating' => 4.8,
                'badge' => 'Cheapest',
                'images' => [
                    'build/img/flight/flight-09.jpg',
                    'build/img/flight/flight-05.jpg',
                ],
            ],
            [
                'id' => 'SKY-118',
                'slug' => 'sky-118-del-bom',
                'origin_code' => 'DEL',
                'origin_city' => 'New Delhi',
                'origin_airport' => 'Indira Gandhi International Airport',
                'destination_code' => 'BOM',
                'destination_city' => 'Mumbai',
                'destination_airport' => 'Chhatrapati Shivaji Maharaj International Airport',
                'airline_name' => 'IndiGo',
                'airline_logo' => 'build/img/icons/airindia.svg',
                'flight_name' => 'SkyBound 118',
                'stops_label' => '1-stop at Jaipur',
                'departure_date' => $today->copy()->addDays(3)->toDateString(),
                'return_date' => null,
                'cabin_class' => 'Economy',
                'base_price' => 4890,
                'seats_left' => 12,
                'rating' => 4.5,
                'badge' => 'Fastest',
                'images' => [
                    'build/img/flight/flight-08.jpg',
                ],
            ],
            [
                'id' => 'SKY-205',
                'slug' => 'sky-205-bom-goi',
                'origin_code' => 'BOM',
                'origin_city' => 'Mumbai',
                'origin_airport' => 'Chhatrapati Shivaji Maharaj International Airport',
                'destination_code' => 'GOI',
                'destination_city' => 'Goa',
                'destination_airport' => 'Goa International Airport',
                'airline_name' => 'Vistara',
                'airline_logo' => 'build/img/icons/airindia.svg',
                'flight_name' => 'Coastal 205',
                'stops_label' => 'Non-stop',
                'departure_date' => $today->copy()->addDays(5)->toDateString(),
                'return_date' => null,
                'cabin_class' => 'Economy',
                'base_price' => 3600,
                'seats_left' => 20,
                'rating' => 4.7,
                'badge' => 'Popular',
                'images' => [
                    'build/img/flight/flight-07.jpg',
                ],
            ],
            [
                'id' => 'SKY-330',
                'slug' => 'sky-330-del-blr',
                'origin_code' => 'DEL',
                'origin_city' => 'New Delhi',
                'origin_airport' => 'Indira Gandhi International Airport',
                'destination_code' => 'BLR',
                'destination_city' => 'Bengaluru',
                'destination_airport' => 'Kempegowda International Airport',
                'airline_name' => 'Air India',
                'airline_logo' => 'build/img/icons/airindia.svg',
                'flight_name' => 'Tech City 330',
                'stops_label' => 'Non-stop',
                'departure_date' => $today->copy()->addDays(7)->toDateString(),
                'return_date' => $today->copy()->addDays(10)->toDateString(),
                'cabin_class' => 'Business',
                'base_price' => 11800,
                'seats_left' => 8,
                'rating' => 4.9,
                'badge' => 'Premium',
                'images' => [
                    'build/img/flight/flight-09.jpg',
                    'build/img/flight/flight-07.jpg',
                ],
            ],
            [
                'id' => 'SKY-412',
                'slug' => 'sky-412-blr-dxb',
                'origin_code' => 'BLR',
                'origin_city' => 'Bengaluru',
                'origin_airport' => 'Kempegowda International Airport',
                'destination_code' => 'DXB',
                'destination_city' => 'Dubai',
                'destination_airport' => 'Dubai International Airport',
                'airline_name' => 'Emirates',
                'airline_logo' => 'build/img/icons/airindia.svg',
                'flight_name' => 'Gulf Express 412',
                'stops_label' => '1-stop at Doha',
                'departure_date' => $today->copy()->addDays(12)->toDateString(),
                'return_date' => $today->copy()->addDays(18)->toDateString(),
                'cabin_class' => 'Premium Economy',
                'base_price' => 24500,
                'seats_left' => 14,
                'rating' => 4.6,
                'badge' => 'International',
                'images' => [
                    'build/img/flight/flight-05.jpg',
                    'build/img/flight/flight-08.jpg',
                ],
            ],
            [
                'id' => 'SKY-509',
                'slug' => 'sky-509-del-lhr',
                'origin_code' => 'DEL',
                'origin_city' => 'New Delhi',
                'origin_airport' => 'Indira Gandhi International Airport',
                'destination_code' => 'LHR',
                'destination_city' => 'London',
                'destination_airport' => 'Heathrow Airport',
                'airline_name' => 'British Airways',
                'airline_logo' => 'build/img/icons/airindia.svg',
                'flight_name' => 'Atlantic 509',
                'stops_label' => '1-stop at Doha',
                'departure_date' => $today->copy()->addDays(15)->toDateString(),
                'return_date' => $today->copy()->addDays(22)->toDateString(),
                'cabin_class' => 'First Class',
                'base_price' => 86500,
                'seats_left' => 6,
                'rating' => 5.0,
                'badge' => 'Luxury',
                'images' => [
                    'build/img/flight/flight-09.jpg',
                ],
            ],
        ];
    }
}
