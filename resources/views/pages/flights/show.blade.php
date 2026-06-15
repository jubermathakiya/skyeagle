@php
    $page = 'flight-details';
    $departure = \Carbon\Carbon::parse($flightDetails['departure_at']);
    $return = !empty($flightDetails['return_at']) ? \Carbon\Carbon::parse($flightDetails['return_at']) : null;
    $flightBannerImage = $flightMedia?->images?->first()?->image_url;
@endphp
@extends('layout.mainlayout')
@section('title', $flightDetails['title'])

@section('content')
    <div class="breadcrumb-bar breadcrumb-bg-05 text-center" @if($flightBannerImage) style="background-image: url('{{ $flightBannerImage }}');" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Flight Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('flight-grid') }}">Flight</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Flight Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-wrap slider-wrap-five mb-4">
                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                            <div class="mb-2">
                                <h4 class="mb-1 d-flex align-items-center flex-wrap">
                                    {{ $flightDetails['title'] }}
                                    <span class="badge badge-xs bg-success rounded-pill ms-2"><i class="isax isax-ticket-star5 me-1"></i>Verified</span>
                                    <span class="badge badge-xs bg-indigo rounded-pill ms-2">Cheapest</span>
                                </h4>
                                <div class="d-flex align-items-center flex-wrap">
                                    <p class="fs-14 mb-2 me-3 pe-3 border-end d-flex align-items-center">
                                        <img src="{{ URL::asset('build/img/icons/airindia.svg') }}" class="me-2" alt="Airline"> {{ $flightDetails['airline'] }}
                                        <span class="bg-primary divide-point mx-2"></span>{{ $flightDetails['stop_text'] }}
                                    </p>
                                    <p class="fs-14 mb-2 me-3 pe-3 border-end"><i class="isax isax-location5 me-2"></i>{{ $flightDetails['origin_name'] }} to {{ $flightDetails['destination_name'] }}</p>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">{{ $flightDetails['rating'] }}</span>
                                        <p class="fs-14">(400 Reviews)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <a href="#" class="btn btn-outline-light btn-icon btn-sm d-flex align-items-center justify-content-center me-2"><i class="isax isax-share"></i></a>
                                <a href="#" class="btn btn-outline-light btn-sm d-inline-flex align-items-center"><i class="isax isax-heart5 text-danger me-1"></i>Save</a>
                            </div>
                        </div>
                        <div class="service-wrap mb-4">
                            <div class="slider-wrap">
                                <div class="owl-carousel service-carousel nav-center mb-4" id="large-img">
                                    @foreach($flightDetails['large_images'] as $image)
                                        @php $imageUrl = str_starts_with($image, 'http') ? $image : URL::asset($image); @endphp
                                        <div class="service-img">
                                            <img src="{{ $imageUrl }}" class="img-fluid" alt="Flight">
                                        </div>
                                    @endforeach
                                </div>
                                @php $firstLargeImage = str_starts_with($flightDetails['large_images'][0], 'http') ? $flightDetails['large_images'][0] : URL::asset($flightDetails['large_images'][0]); @endphp
                                <a href="{{ $firstLargeImage }}" data-fancybox="gallery" class="btn btn-white btn-xs view-btn"><i class="isax isax-image me-1"></i>See All</a>
                            </div>
                            <div class="owl-carousel slider-nav-thumbnails nav-center" id="small-img">
                                @foreach($flightDetails['thumb_images'] as $image)
                                    @php $imageUrl = str_starts_with($image, 'http') ? $image : URL::asset($image); @endphp
                                    <div><img src="{{ $imageUrl }}" class="img-fluid" alt="Flight"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-none bg-light-200">
                        <div class="card-body pb-1">
                            <h5 class="d-flex align-items-center fs-18 mb-3">
                                <span class="avatar avatar-md rounded-circle bg-primary me-2"><i class="isax isax-airplane5"></i></span>
                                Flight Information
                            </h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Flight No.</h6><p>{{ $flightDetails['airline_code'] }} {{ $flightDetails['flight_number'] }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Departure</h6><p>{{ $departure->format('d M Y') }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Duration</h6><p>{{ $flightDetails['duration'] }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Stops</h6><p>{{ $flightDetails['stop_text'] }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Origin</h6><p>{{ $flightDetails['origin'] }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Destination</h6><p>{{ $flightDetails['destination'] }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Class</h6><p>{{ request('cabin_class', 'Economy') }}</p></div></div>
                                <div class="col-lg-3 col-md-4 col-sm-6"><div class="mb-3"><h6 class="mb-1">Seats</h6><p>{{ $flightDetails['seats_left'] }} Left</p></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion custom-accordion accordion-shadow-none">
                        <div class="accordion-item border-0 mb-4">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_description" aria-expanded="true">Description</button>
                            </div>
                            <div id="accordion_description" class="accordion-collapse collapse show">
                                <div class="accordion-body pt-0">
                                    <p class="mb-2">{{ $flightDetails['airline'] }} flight {{ $flightDetails['flight_number'] }} connects {{ $flightDetails['origin_name'] }} to {{ $flightDetails['destination_name'] }} with {{ strtolower($flightDetails['stop_text']) }} availability and live fare data when the provider returns it.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-0 border-0 pb-1">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_amenities" aria-expanded="true">Amenities</button>
                            </div>
                            <div id="accordion_amenities" class="accordion-collapse collapse show">
                                <div class="accordion-body pt-0">
                                    <div class="row">
                                        @foreach(['Complimentary meals', 'Cabin baggage', 'Charging Ports', 'Priority Support', 'Flexible fare rules', 'Seat selection'] as $amenity)
                                            <div class="col-lg-4 col-md-6">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="isax isax-verify text-primary me-2 fs-16"></i>
                                                    <p>{{ $amenity }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 theiaStickySidebar">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <span class="btn btn-outline-light flex-fill"><span class="icon-rotate-up me-2"><i class="isax isax-airplane"></i></span>{{ $flightDetails['origin_name'] }}</span>
                                <a href="#" class="way-icon badge badge-primary rounded-pill mx-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></a>
                                <span class="btn btn-outline-light flex-fill"><span class="icon-rotate-down me-2"><i class="isax isax-airplane"></i></span>{{ $flightDetails['destination_name'] }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between bg-light-200 rounded p-3 mb-3">
                                <p class="fs-13 fw-medium mb-0">Starts From</p>
                                <h5 class="text-primary">{{ strtoupper($flightDetails['currency']) }} {{ number_format($flightDetails['price']) }} <span class="fs-14 text-default fw-normal">/ Person</span></h5>
                            </div>
                            <h5 class="fs-18 mb-3">Check Availability</h5>
                            <div class="banner-form">
                                <form action="{{ route('flight-grid') }}" method="get" class="form-info border-0 js-flight-search-form">
                                    <div class="form-info border-0">
                                        <input type="hidden" name="trip_type" value="{{ $return ? 'roundtrip' : 'oneway' }}">
                                        <div class="form-item border rounded p-3 mb-3 w-100">
                                            <label class="form-label fs-14 text-default mb-1">From</label>
                                            <input type="text" class="form-control" name="origin" value="{{ $flightDetails['origin'] }}">
                                            <p class="fs-12 mb-0">{{ $flightDetails['origin_name'] }} Airport</p>
                                        </div>
                                        <div class="form-item border rounded p-3 mb-3 w-100">
                                            <label class="form-label fs-14 text-default mb-1">To</label>
                                            <input type="text" class="form-control" name="destination" value="{{ $flightDetails['destination'] }}">
                                            <p class="fs-12 mb-0">{{ $flightDetails['destination_name'] }} Airport</p>
                                        </div>
                                        <div class="form-item border rounded p-3 mb-3 w-100">
                                            <label class="form-label fs-14 text-default mb-1">Departure</label>
                                            <input type="text" class="form-control datetimepicker" name="departure_at" value="{{ $departure->format('d-m-Y') }}">
                                            <p class="fs-12 mb-0">{{ $departure->format('l') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-14 text-default mb-1">Preferred Class</label>
                                            <select class="select" name="cabin_class">
                                                <option>Economy</option>
                                                <option>Premium Economy</option>
                                                <option>Business</option>
                                                <option>First Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg search-btn ms-0 w-100 mb-3 fs-14">Search Again</button>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="fs-14 fw-medium text-success">{{ $flightDetails['seats_left'] }} Seats Available on your Search</h6>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-none mb-0">
                        <div class="card-body">
                            <h5 class="fs-18 mb-3">Provider Details</h5>
                            <div class="py-1">
                                <div class="bg-light-500 br-10 mb-3 d-flex align-items-center p-3">
                                    <a href="#" class="avatar avatar-lg flex-shrink-0">
                                        <img src="{{ URL::asset('build/img/users/user-05.jpg') }}" alt="Agent" class="rounded-circle">
                                    </a>
                                    <div class="ms-2 overflow-hidden">
                                        <h6 class="fw-medium text-truncate"><a href="#">Sky Eagle Trip</a></h6>
                                        <p class="fs-14">Live fares by Travelpayouts</p>
                                    </div>
                                </div>
                                @if($flightDetails['link'])
                                    <a href="{{ $flightDetails['link'] }}" target="_blank" rel="noopener" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                        View Provider Fare
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/flight/flight-search.js'])
@endsection
