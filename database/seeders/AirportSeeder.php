<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    public function run(): void
    {
        $airports = [
            ['iata_code' => 'DEL', 'icao_code' => 'VIDP', 'name' => 'Indira Gandhi International Airport', 'city' => 'New Delhi', 'country' => 'India', 'timezone' => 'Asia/Kolkata'],
            ['iata_code' => 'BOM', 'icao_code' => 'VABB', 'name' => 'Chhatrapati Shivaji Maharaj International Airport', 'city' => 'Mumbai', 'country' => 'India', 'timezone' => 'Asia/Kolkata'],
            ['iata_code' => 'BLR', 'icao_code' => 'VOBL', 'name' => 'Kempegowda International Airport', 'city' => 'Bengaluru', 'country' => 'India', 'timezone' => 'Asia/Kolkata'],
            ['iata_code' => 'GOI', 'icao_code' => 'VOGO', 'name' => 'Goa International Airport', 'city' => 'Goa', 'country' => 'India', 'timezone' => 'Asia/Kolkata'],
            ['iata_code' => 'DXB', 'icao_code' => 'OMDB', 'name' => 'Dubai International Airport', 'city' => 'Dubai', 'country' => 'United Arab Emirates', 'timezone' => 'Asia/Dubai'],
            ['iata_code' => 'LHR', 'icao_code' => 'EGLL', 'name' => 'Heathrow Airport', 'city' => 'London', 'country' => 'United Kingdom', 'timezone' => 'Europe/London'],
            ['iata_code' => 'JFK', 'icao_code' => 'KJFK', 'name' => 'John F. Kennedy International Airport', 'city' => 'New York', 'country' => 'United States', 'timezone' => 'America/New_York'],
            ['iata_code' => 'LAX', 'icao_code' => 'KLAX', 'name' => 'Los Angeles International Airport', 'city' => 'Los Angeles', 'country' => 'United States', 'timezone' => 'America/Los_Angeles'],
            ['iata_code' => 'SIN', 'icao_code' => 'WSSS', 'name' => 'Singapore Changi Airport', 'city' => 'Singapore', 'country' => 'Singapore', 'timezone' => 'Asia/Singapore'],
            ['iata_code' => 'SYD', 'icao_code' => 'YSSY', 'name' => 'Sydney Kingsford Smith Airport', 'city' => 'Sydney', 'country' => 'Australia', 'timezone' => 'Australia/Sydney'],
        ];

        foreach ($airports as $airport) {
            Airport::query()->updateOrCreate(
                ['iata_code' => $airport['iata_code']],
                array_merge($airport, ['is_active' => true])
            );
        }
    }
}
