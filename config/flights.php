<?php

return [
    'driver' => env('FLIGHT_API_DRIVER', 'dummy'),

    'api' => [
        'base_url' => rtrim(env('FLIGHT_API_BASE_URL', ''), '/'),
        'search_endpoint' => env('FLIGHT_API_SEARCH_ENDPOINT', '/search'),
        'timeout' => (int) env('FLIGHT_API_TIMEOUT', 15),
    ],

    'search' => [
        'per_page' => 9,
        'default_trip_type' => 'oneway',
        'default_cabin_class' => 'Economy',
        'max_passengers' => 9,
    ],
];
