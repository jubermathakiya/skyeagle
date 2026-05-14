<?php

/**
 * Map your existing geography tables/columns here if they differ from defaults.
 */
return [
    'countries_table' => env('GEO_COUNTRIES_TABLE', 'countries'),
    'states_table' => env('GEO_STATES_TABLE', 'states'),
    'cities_table' => env('GEO_CITIES_TABLE', 'cities'),

    'country_name_column' => env('GEO_COUNTRY_NAME_COLUMN', 'name'),
    'state_name_column' => env('GEO_STATE_NAME_COLUMN', 'name'),
    'city_name_column' => env('GEO_CITY_NAME_COLUMN', 'name'),

    'state_country_id_column' => env('GEO_STATE_COUNTRY_ID_COLUMN', 'country_id'),
    'city_state_id_column' => env('GEO_CITY_STATE_ID_COLUMN', 'state_id'),
];
