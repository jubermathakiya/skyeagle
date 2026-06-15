@if(count($flights) > 0)
    <div class="owl-carousel place-slider nav-center">
        @foreach($flights as $flight)
            @include('pages.flights.partials.flight-card', [
                'flight' => $flight,
                'criteria' => [
                    'origin' => $flight['origin'],
                    'destination' => $flight['destination'],
                    'departure_at' => $flight['departure_at'],
                    'return_at' => $flight['return_at'],
                    'trip_type' => filled($flight['return_at']) ? 'roundtrip' : 'oneway',
                    'currency' => $flight['currency'],
                ],
                'wrap' => false,
            ])
        @endforeach
    </div>
@else
    <div class="text-center py-4">
        <p class="fs-14 mb-0">No trending flights available right now.</p>
    </div>
@endif
