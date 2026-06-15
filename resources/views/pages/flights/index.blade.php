@php
    $page = 'flight-grid';
    $departure = \Carbon\Carbon::parse($criteria['departure_at']);
    $return = !empty($criteria['return_at']) ? \Carbon\Carbon::parse($criteria['return_at']) : $departure->copy()->addDays(2);
    $airlineTypes = [
        ['name' => 'American Airline', 'count' => '216 Flights', 'image' => 'build/img/flight/flight-company-01.svg'],
        ['name' => 'Delta Airlines', 'count' => '569 Flights', 'image' => 'build/img/flight/flight-company-02.svg'],
        ['name' => 'Emirates', 'count' => '129 Flights', 'image' => 'build/img/flight/flight-company-03.svg'],
        ['name' => 'Air France', 'count' => '600 Flights', 'image' => 'build/img/flight/flight-company-04.svg'],
        ['name' => 'Qatar Airways', 'count' => '200 Flights', 'image' => 'build/img/flight/flight-company-05.svg'],
        ['name' => 'Air India', 'count' => '180 Flights', 'image' => 'build/img/flight/flight-company-06.svg'],
    ];
    $flightBannerImage = $flightMedia?->images?->first()?->image_url;
@endphp
@extends('layout.mainlayout')
@section('title', 'Flights')

@section('content')
    <div class="breadcrumb-bar breadcrumb-bg-05 text-center" @if($flightBannerImage) style="background-image: url('{{ $flightBannerImage }}');" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Flight</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item">Flight</li>
                            <li class="breadcrumb-item active" aria-current="page">Flight Grid</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="card mb-4 flight-search-card">
                <div class="card-body">
                    <div class="banner-form">
                        <form action="{{ route('flight-grid') }}" method="get" class="js-flight-search-form" data-airports='@json(config('flight.airports'))'>
                            <input type="hidden" name="adults" class="js-flight-adults" value="{{ $criteria['adults'] }}">
                            <input type="hidden" name="children" class="js-flight-children" value="{{ $criteria['children'] }}">
                            <input type="hidden" name="infants" class="js-flight-infants" value="{{ $criteria['infants'] }}">
                            <input type="hidden" name="cabin_class" class="js-flight-cabin-class" value="{{ $criteria['cabin_class'] }}">
                            <input type="hidden" name="currency" value="{{ $criteria['currency'] }}">
                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="form-check d-flex align-items-center me-3 mb-2">
                                        <input class="form-check-input mt-0" type="radio" name="trip_type" id="flight-oneway" value="oneway" @checked($criteria['trip_type'] === 'oneway')>
                                        <label class="form-check-label fs-14 ms-2" for="flight-oneway">Oneway</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center me-3 mb-2">
                                        <input class="form-check-input mt-0" type="radio" name="trip_type" id="flight-roundtrip" value="roundtrip" @checked($criteria['trip_type'] === 'roundtrip')>
                                        <label class="form-check-label fs-14 ms-2" for="flight-roundtrip">Round Trip</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center me-3 mb-2">
                                        <input class="form-check-input mt-0" type="radio" name="trip_type" id="flight-multitrip" value="multiway" @checked($criteria['trip_type'] === 'multiway')>
                                        <label class="form-check-label fs-14 ms-2" for="flight-multitrip">Multi Trip</label>
                                    </div>
                                </div>
                                <h6 class="fw-medium fs-16 mb-2">Millions of cheap flights. One simple search</h6>
                            </div>
                            <div class="normal-trip">
                                <div class="d-lg-flex">
                                    <div class="d-flex form-info">
                                        <div class="form-item change-drop booking-dropdown dropdown js-flight-airport-dropdown">
                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                                                <label class="form-label fs-14 text-default mb-1">From</label>
                                                <input type="text" class="form-control value-input js-flight-airport-input" name="origin" value="{{ $criteria['origin'] }}" autocomplete="off">
                                                <p class="fs-12 mb-0 js-flight-airport-name">Search city or airport code</p>
                                            </div>
                                            <div class="dropdown-menu dropdown-md p-0">
                                                <div class="input-search p-3 border-bottom">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search Location">
                                                        <span class="input-group-text px-2 border-start-0"><i class="isax isax-search-normal"></i></span>
                                                    </div>
                                                </div>
                                                <ul></ul>
                                            </div>
                                        </div>
                                        <div class="form-item change-drop booking-dropdown dropdown ps-2 ps-sm-3 js-flight-airport-dropdown">
                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                                                <label class="form-label fs-14 text-default mb-1">To</label>
                                                <input type="text" class="form-control value-input js-flight-airport-input" name="destination" value="{{ $criteria['destination'] }}" autocomplete="off">
                                                <p class="fs-12 mb-0 js-flight-airport-name">Search city or airport code</p>
                                                <span class="way-icon badge badge-primary rounded-pill translate-middle">
                                                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                                </span>
                                            </div>
                                            <div class="dropdown-menu dropdown-md p-0">
                                                <div class="input-search p-3 border-bottom">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search Location">
                                                        <span class="input-group-text px-2 border-start-0"><i class="isax isax-search-normal"></i></span>
                                                    </div>
                                                </div>
                                                <ul></ul>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label fs-14 text-default mb-1">Departure</label>
                                            <input type="text" class="form-control js-flight-departure" name="departure_at" value="{{ $departure->format('d-m-Y') }}">
                                            <p class="fs-12 mb-0 js-flight-departure-day">{{ $departure->format('l') }}</p>
                                        </div>
                                        <div class="form-item round-drip {{ $criteria['trip_type'] === 'roundtrip' ? '' : 'd-none' }}">
                                            <label class="form-label fs-14 text-default mb-1">Return</label>
                                            <input type="text" class="form-control js-flight-return" name="return_at" value="{{ $return->format('d-m-Y') }}">
                                            <p class="fs-12 mb-0 js-flight-return-day">{{ $return->format('l') }}</p>
                                        </div>
                                        <div class="form-item dropdown">
                                            <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                                                <label class="form-label fs-14 text-default mb-1">Travellers and cabin class</label>
                                                <div class="home-eight-title text-dark member-count">{{ $criteria['adults'] + $criteria['children'] + $criteria['infants'] }} <span class="fw-normal fs-14">Persons</span></div>
                                                <p class="fs-12 mb-0"><span class="adult">{{ $criteria['adults'] }}</span> Adult, <span class="class-name">{{ $criteria['cabin_class'] }}</span></p>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-xl">
                                                <div class="mb-3 home-eight-title text-dark">Select Travelers & Class</div>
                                                <div class="mb-3 border br-10 info-item pb-1">
                                                    <div class="fs-16 fw-medium mb-2 text-dark">Travellers</div>
                                                    <div class="row">
                                                        @foreach([
                                                            ['label' => 'Adults', 'hint' => '12+ Yrs', 'type' => 'adult', 'value' => $criteria['adults']],
                                                            ['label' => 'Childrens', 'hint' => '2-12 Yrs', 'type' => 'children', 'value' => $criteria['children']],
                                                            ['label' => 'Infants', 'hint' => '0-12 Yrs', 'type' => 'infant', 'value' => $criteria['infants']],
                                                        ] as $traveler)
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label text-gray-9 mb-2">{{ $traveler['label'] }} <span class="text-default fw-normal">({{ $traveler['hint'] }})</span></label>
                                                                    <div class="custom-increment">
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn float-start">
                                                                                <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus"><span><i class="isax isax-minus"></i></span></button>
                                                                            </span>
                                                                            <input type="text" name="quantity" class="input-number" value="{{ $traveler['value'] }}" data-type="{{ $traveler['type'] }}">
                                                                            <span class="input-group-btn float-end">
                                                                                <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus"><span><i class="isax isax-add"></i></span></button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="mb-3 border br-10 info-item pb-1">
                                                    <span class="fs-16 fw-medium mb-2 text-dark">Travellers</span>
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        @foreach(['Economy', 'Premium Economy', 'Business', 'First Class'] as $class)
                                                            <div class="form-check me-3 mb-3">
                                                                <input class="form-check-input" type="radio" value="{{ $class }}" name="cabin-class" id="flight-top-cabin-{{ $loop->index }}" @checked($criteria['cabin_class'] === $class)>
                                                                <label class="form-check-label" for="flight-top-cabin-{{ $loop->index }}">{{ $class }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary search-btn rounded">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="mb-3">
                    <h5 class="mb-2">Choose type of Flights you are interested</h5>
                </div>
                <div class="row">
                    @foreach($airlineTypes as $type)
                        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="d-flex align-items-center hotel-type-item mb-3">
                                <a href="{{ route('flight-grid') }}" class="avatar avatar-lg">
                                    <img src="{{ URL::asset($type['image']) }}" class="rounded-circle" alt="Airline">
                                </a>
                                <div class="ms-2">
                                    <h6 class="fs-16 fw-medium"><a href="{{ route('flight-grid') }}">{{ $type['name'] }}</a></h6>
                                    <p class="fs-14">{{ $type['count'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4 theiaStickySidebar">
                    <div class="card filter-sidebar mb-4 mb-lg-0">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5>Filters</h5>
                            <a href="{{ route('flight-grid') }}" class="fs-14 link-primary">Reset</a>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('flight-grid') }}" method="get">
                                <input type="hidden" name="origin" value="{{ $criteria['origin'] }}">
                                <input type="hidden" name="destination" value="{{ $criteria['destination'] }}">
                                <input type="hidden" name="departure_at" value="{{ $departure->format('d-m-Y') }}">
                                <input type="hidden" name="trip_type" value="{{ $criteria['trip_type'] }}">
                                <div class="p-3 border-bottom">
                                    <label class="form-label fs-16">Search by Airline Names</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon"><i class="isax isax-search-normal"></i></span>
                                        <input type="text" class="form-control" name="airline" value="{{ request('airline') }}" placeholder="Search by Airline Names">
                                    </div>
                                </div>
                                <div class="accordion accordion-list">
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-populars" aria-expanded="true" role="button">
                                                <i class="isax isax-ranking me-2 text-primary"></i>Popular
                                            </div>
                                        </div>
                                        <div id="accordion-populars" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                @foreach(['Breakfast Included', 'Budget', '4 Star Hotels', '5 Star Hotels'] as $popular)
                                                    <div class="form-checkbox form-check form-check-inline d-inline-flex align-items-center mt-2 me-2">
                                                        <input class="form-check-input ms-0 mt-0" name="popular[]" type="checkbox" id="popular-{{ $loop->index }}" @checked($loop->first)>
                                                        <label class="form-check-label ms-2" for="popular-{{ $loop->index }}">{{ $popular }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-price" aria-expanded="true" role="button">
                                                <i class="isax isax-coin me-2 text-primary"></i>Price Per Night
                                            </div>
                                        </div>
                                        <div id="accordion-price" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="filter-range"><input type="text" id="range_03"></div>
                                                <div class="filter-range-amount">
                                                    <p class="fs-14">Range : <span class="text-gray-9 fw-medium">$200 - $5695</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-flight" aria-expanded="true" role="button">
                                                <i class="isax isax-airplane4 me-2 text-primary"></i>Airline Names
                                            </div>
                                        </div>
                                        <div id="accordion-flight" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="more-content">
                                                    @foreach(['American Airlines', 'Delta Air Lines', 'Emirates', 'Air France', 'Japan Airlines', 'Qatar Airways', 'Air Canada', 'United Airlines'] as $airline)
                                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                                            <input class="form-check-input ms-0 mt-0" name="airlines[]" type="checkbox" id="airline-{{ $loop->index }}">
                                                            <label class="form-check-label ms-2" for="airline-{{ $loop->index }}">{{ $airline }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a href="#" class="more-view fw-medium fs-14">Show More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-amenity" aria-expanded="true" role="button">
                                                <i class="isax isax-candle me-2 text-primary"></i>Amenities
                                            </div>
                                        </div>
                                        <div id="accordion-amenity" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="more-content">
                                                    @foreach(['Free Wifi', 'Charging Ports', 'Entertainment', 'Blankets & Pillows', 'Adjustable headrests', 'Complimentary meals', 'Privacy dividers'] as $amenity)
                                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                                            <input class="form-check-input ms-0 mt-0" name="amenities[]" type="checkbox" id="amenity-{{ $loop->index }}">
                                                            <label class="form-check-label ms-2" for="amenity-{{ $loop->index }}">{{ $amenity }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a href="#" class="more-view fw-medium fs-14">Show More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-cabin" aria-expanded="true" role="button">
                                                <i class="isax isax-home-2 me-2 text-primary"></i>Cabin Class
                                            </div>
                                        </div>
                                        <div id="accordion-cabin" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="more-content">
                                                    @foreach(['Economy', 'Premium Economy', 'Business Class', 'First Class', 'Basic Economy', 'Suite Class'] as $class)
                                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                                            <input class="form-check-input ms-0 mt-0" name="cabin_filters[]" type="checkbox" id="cabin-filter-{{ $loop->index }}">
                                                            <label class="form-check-label ms-2" for="cabin-filter-{{ $loop->index }}">{{ $class }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a href="#" class="more-view fw-medium fs-14">Show More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-meal" aria-expanded="true" role="button">
                                                <i class="isax isax-reserve me-2 text-primary"></i>Meal plans available
                                            </div>
                                        </div>
                                        <div id="accordion-meal" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                @foreach(['All inclusive', 'Breakfast', 'Lunch', 'Dinner'] as $meal)
                                                    <div class="form-checkbox form-check form-check-inline d-inline-flex align-items-center mt-2 me-2">
                                                        <input class="form-check-input ms-0 mt-0" name="meals[]" type="checkbox" id="meal-{{ $loop->index }}">
                                                        <label class="form-check-label ms-2" for="meal-{{ $loop->index }}">{{ $meal }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordion-reviews" aria-expanded="true" role="button">
                                                <i class="isax isax-discount-shape me-2 text-primary"></i>Reviews
                                            </div>
                                        </div>
                                        <div id="accordion-reviews" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                @foreach([5, 4, 3, 2, 1] as $stars)
                                                    <div class="form-check d-flex align-items-center ps-0 mb-2">
                                                        <input class="form-check-input ms-0 mt-0" name="reviews[]" type="checkbox" id="review-{{ $stars }}">
                                                        <label class="form-check-label ms-2" for="review-{{ $stars }}">
                                                            <span class="rating d-flex align-items-center">
                                                                @for($i = 0; $i < min($stars, 5); $i++)
                                                                    <i class="fas fa-star filled text-primary me-1"></i>
                                                                @endfor
                                                                <span class="ms-2">{{ $stars }} Star</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <h6 class="mb-3">{{ count($flights) }} Flights Found on Your Search</h6>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="list-item d-flex align-items-center mb-3">
                                <a href="{{ route('flight-grid', request()->query()) }}" class="list-icon active me-2"><i class="isax isax-grid-1"></i></a>
                                <a href="{{ route('flight-grid', request()->query()) }}" class="list-icon me-2"><i class="isax isax-firstline"></i></a>
                            </div>
                            <div class="dropdown mb-3">
                                <a href="#" class="dropdown-toggle py-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fw-medium text-gray-9">Sort By : </span>Recommended
                                </a>
                                <div class="dropdown-menu dropdown-sm">
                                    <form action="{{ route('flight-grid') }}">
                                        <h6 class="fw-medium fs-16 mb-3">Sort By</h6>
                                        @foreach(['Recommended', 'Price: low to high', 'Price: high to low', 'Newest', 'Ratings', 'Reviews'] as $sort)
                                            <div class="form-check d-flex align-items-center ps-0 mb-2">
                                                <input class="form-check-input ms-0 mt-0" name="sort" type="radio" id="sort-{{ $loop->index }}" @checked($loop->first)>
                                                <label class="form-check-label ms-2" for="sort-{{ $loop->index }}">{{ $sort }}</label>
                                            </div>
                                        @endforeach
                                        <div class="d-flex align-items-center justify-content-end border-top pt-3 mt-3">
                                            <a href="{{ route('flight-grid') }}" class="btn btn-light btn-sm me-2">Reset</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(! $meta['is_live'])
                        <div class="bg-info br-10 p-3 pb-2 mb-4">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="fs-14 fw-medium mb-2 d-inline-flex align-items-center">
                                    <i class="isax isax-info-circle me-2"></i>{{ $meta['message'] ?: 'Flight API is currently unavailable.' }}
                                </p>
                                <a href="#" class="btn btn-white btn-sm mb-2">Sign In</a>
                            </div>
                        </div>
                    @else
                        <div class="bg-info br-10 p-3 pb-2 mb-4">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="fs-14 fw-medium mb-2 d-inline-flex align-items-center"><i class="isax isax-info-circle me-2"></i>Save an average of 15% on thousands of flights when you're signed in</p>
                                <a href="#" class="btn btn-white btn-sm mb-2">Sign In</a>
                            </div>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        @foreach($flights as $flight)
                            @include('pages.flights.partials.flight-card', [
                                'flight' => $flight,
                                'criteria' => $criteria,
                                'wrap' => true,
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/flight/flight-search.js'])
@endsection
