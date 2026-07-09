<?php $page="tour-details";?>
@php
    $tourDetailsBannerImage = ($tourDetailsMedia ?? null)?->images?->first()?->image_url;
    $reviewCount = package_review_count($packageDetails);
    $reviewRating = package_review_rating($packageDetails);
@endphp
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-02 text-center" @if($tourDetailsBannerImage) style="background-image: url('{{ $tourDetailsBannerImage }}'); min-height: 251px; background-size: cover; background-position: center;" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Tour Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tour-list') }}">Tours</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tour Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Wrapper -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xl-8">

                    <!-- Slider -->
                    @php
                        $images = $packageDetails->images->values();
                    @endphp
                    <style>
                        .tour-main-image-frame {
                            width: 100%;
                            height: 420px;
                            overflow: hidden;
                            border-radius: 10px;
                            background: #f2f4f7;
                        }

                        .tour-main-image {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            display: block;
                        }

                        .tour-thumb-image {
                            width: 100%;
                            height: 96px;
                            object-fit: cover;
                            border-radius: 8px;
                        }
                    </style>
                    <div>
                        <div class="service-wrap mb-4">
                            <div class="slider-wrap vertical-slider tour-vertical-slide d-flex align-items-center">
                                <div class="slider-for nav-center" id="large-img">
                                    @foreach($packageDetails->images as $image)
                                        <div class="service-img">
                                            <a href="{{ backend_image($image->image) }}" data-fancybox="tour-gallery">
                                                <div class="tour-main-image-frame">
                                                    <img src="{{ backend_image($image->image) }} "
                                                    class="img-fluid tour-main-image"
                                                    alt="Slider Img">
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="{{ backend_image($packageDetails->images[0]->image ?? '') }}" 
                                    data-fancybox="tour-gallery"
                                    class="btn btn-white btn-xs view-btn">
                                    <i class="isax isax-image me-1"></i>See All
                                </a>
                                <div class="slider-nav nav-center" id="small-img">
                                    @foreach($packageDetails->images as $image)
                                        <div>
                                            <img src="{{ backend_image($image->image) }}"
                                                class="img-fluid custom-thumb tour-thumb-image"
                                                alt="Slider Img">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="mb-2">
                                <h4 class="mb-1 d-flex align-items-center flex-wrap mb-2">{{ $packageDetails->package_name }}<span
                                        class="badge badge-xs bg-success rounded-pill ms-2"><i
                                            class="isax isax-ticket-star me-1"></i>Verified</span></h4>
                                <div class="d-flex align-items-center flex-wrap">
                                    <p class="fs-14 mb-2 me-3 pe-3 border-end"><i
                                            class="isax isax-receipt text-primary me-2"></i>{{ $packageDetails->category->name }}</p>
                                    <p class="fs-14 mb-2 me-3 pe-3 border-end"><i
                                            class="isax isax-location5 me-2"></i>{{ $packageDetails->source_city }}, {{ $packageDetails->destination_city }}
                                        <a href="#location"
                                            class="link-primary text-decoration-underline fw-medium ms-2">View
                                            Location</a>
                                    </p>
                                    <div class="d-flex align-items-center mb-2">
                                        <span
                                            class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2"
                                            data-tour-review-rating>{{ $reviewRating }}</span>
                                        <p class="fs-14"><a href="#reviews" data-tour-review-count>{{ review_count_text($reviewCount) }}</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <a href="#"
                                    class="btn btn-outline-light btn-icon btn-sm d-flex align-items-center justify-content-center me-2"><i
                                        class="isax isax-share"></i></a>
                                <a href="#" class="btn btn-outline-light btn-sm d-inline-flex align-items-center"><i
                                        class="isax isax-heart5 text-danger me-1"></i>Save</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Slider -->
                        @php
                            $fullText = $packageDetails->description ?? '';
                            $plainText = trim(strip_tags($fullText));
                        @endphp
                        <!-- Description -->
                        <div class="bg-light-200 card-bg-light mb-4">
                            <h5 class="fs-18 mb-3">Description</h5>
                            <div class="read-more tour-description-read-more">
                                <div class="more-text tour-description-text" style="line-height: 1.5; max-height: 3em; overflow: hidden;">
                                    <p>{{ $plainText }}</p>
                                </div>
                                <a href="#" class="fs-14 fw-medium more-link text-decoration-underline mb-2">Show More</a>
                            </div>
                        </div>
                        <!-- /Description -->

                    <!-- Highlights -->
                    <div class="bg-light-200 card-bg-light mb-4">
                        <h5 class="fs-18 mb-3">Highlights</h5>
                        <div>
                        @if($packageDetails->highlights && $packageDetails->highlights->count() > 0)
                            @foreach($packageDetails->highlights as $highlight)
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-md bg-primary-transparent rounded-circle me-2">
                                        <i class="isax isax-send-sqaure-2 fs-16"></i>
                                    </span>
                                    <p>{{ $highlight->highlight }}</p>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <!-- /Highlights -->

                    <!-- Itinerary -->
                    <div class="bg-light-200 card-bg-light mb-4">
                        <h5 class="fs-18 mb-3">Itinerary</h5>
                        <div class="card shadow-none mb-0">
                            <div class="card-body p-3">
                                <div class="stage-flow">
                                    @php
                                        $startDate = \Carbon\Carbon::parse($packageDetails->start_date);
                                    @endphp
                                    @foreach($packageDetails->itinerary as $key => $item)
                                        @php
                                            $dayDate = $startDate->copy()->addDays($key);
                                        @endphp
                                        <div class="d-flex align-items-center flows-step">
                                            <span class="flow-step">
                                                {{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}
                                            </span>
                                            <div class="flow-content">
                                                <div class="d-flex align-items-center justify-content-between mb-2"> 
                                                    <div>
                                                        <h6 class="fw-medium mb-1">
                                                            Day {{ $key + 1 }}, {{ $item->title }}
                                                        </h6>
                                                        <p>
                                                            {{ $dayDate->format('d M Y') }}
                                                        </p>
                                                    </div>
                                                    {{-- <span class="avatar avatar-lg avatar-rounded flex-shrink-0">
                                                        <img src="{{ $item->image ? asset('storage/'.$item->image) : URL::asset('build/img/tours/tours-16.jpg') }}" alt="Img">
                                                    </span> --}}
                                                </div>
                                                <p>{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Itinerary -->

                    <!-- Includes & Excludes -->
                    <div class="bg-light-200 card-bg-light mb-4">
                        <h5 class="fs-18 mb-3">Includes & Excludes</h5>
                        <div class="row gy-2">
                            @php
                                preg_match_all('/<li>(.*?)<\/li>/', $packageDetails->inclusions, $matches);
                            @endphp
                            <div class="col-md-6">
                            @foreach($matches[1] as $include)
                                <p class="d-flex align-items-center mb-2">
                                    <i class="isax isax-tick-square5 text-success me-2"></i>
                                    {!! $include !!}
                                </p>
                            @endforeach
                            </div>
                            @php
                                preg_match_all('/<li>(.*?)<\/li>/', $packageDetails->exclusions, $matchesEx);
                            @endphp
                            <div class="col-md-6">
                                @foreach($matchesEx[1] as $exclude)
                                    <p class="d-flex align-items-center mb-2">
                                        <i class="isax isax-close-square5 text-danger me-2"></i>
                                        {!! $exclude !!}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Includes & Excludes -->

                    <!-- Gallery -->
                    <div class="bg-light-200 card-bg-light mb-4">
                        <h5 class="fs-18 mb-3">Gallery</h5>
                        @php
                            $galleryImages = $packageDetails->images->take(10);
                        @endphp
                        <div class="tour-gallery-slider owl-carousel">
                            @foreach($galleryImages as $image)
                                <a class="galley-wrap" data-fancybox="tour-gallery-grid"
                                href="{{ backend_image($image->image) }}">
                                    <img src="{{ backend_image($image->image) }}" alt="img">
                                </a>
                            @endforeach
                           
                        </div>
                    </div>
                    <!-- /Gallery -->

                    <div class="bg-light-200 card-bg-light mb-4" id="location">
                        <h5 class="fs-18 mb-3">Location</h5>
                        <!-- Map -->
                        <div>
                            @if($packageDetails->map_embed_url)
                                <iframe
                                    src="{{ $packageDetails->map_embed_url }}"
                                    title="{{ $packageDetails->map_location_query }} Map"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    class="tour-detail-map w-100"></iframe>
                            @else
                                <div class="border rounded p-3 bg-white">
                                    <p class="mb-0">Location map unavailable.</p>
                                </div>
                            @endif
                        </div>
                        <!-- /Map -->
                    </div>

                    <!-- FAQ -->
                    <div class="bg-light-200 card-bg-light mb-4">
                        <h5 class="fs-18 mb-3">Frequently Asked Questions</h5>
                        <div class="accordion faq-accordion" id="accordionFaq">
                            @foreach($packageDetails->faqs as $key => $faq)
                                <div class="accordion-item show mb-2">
                                    <div class="accordion-header">
                                        <button class="accordion-button fw-medium {{ $key != 0 ? 'collapsed' : '' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq-{{ $key }}"
                                            aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                            aria-controls="faq-{{ $key }}">

                                            {{ $faq->question }}
                                        </button>
                                    </div>
                                    <div id="faq-{{ $key }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        data-bs-parent="#accordionFaq">

                                        <div class="accordion-body">
                                            <p class="mb-0">
                                                {{ $faq->answer }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /FAQ -->

                    <!-- Reviews -->
                    @include('pages.toures.partials.reviews', [
                        'packageDetails' => $packageDetails,
                        'reviewCount' => $reviewCount,
                        'reviewRating' => $reviewRating,
                    ])
                    <!-- /Reviews -->
                </div>
                <!-- Tour Sidebar -->
                <div class="col-xl-4 theiaStickySidebar">
                    <div class="card bg-light-200">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center fs-18 mb-3">
                                <span class="avatar avatar-md rounded-circle bg-primary me-2"><i
                                        class="isax isax-signpost5"></i></span>
                                Tour Details
                            </h5>
                            <div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">Destination</h6>
                                    <p class="flex-fill">{{ $packageDetails->destination_city ?? '' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">Duration</h6>
                                    <p class="flex-fill">{{ $packageDetails->duration['text'] ?? '-' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">Total Peoples</h6>
                                    <p class="flex-fill">{{ $packageDetails->max_people }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none">
                        <div class="card-body">
                            @php
                                $bookingUser = auth()->user();
                                $bookingDate = now();
                            @endphp
                            <div class="mb-3">
                                <p class="fs-13 fw-medium mb-1">Starts From</p>
                                <h5 class="text-primary mb-1">
                                    {{ config('constants.currency_symbol') }}{{ $packageDetails->price }}
                                    <span class="fs-14 text-default fw-normal">/ Person</span>
                                </h5>
                            </div>
                            <div class="banner-form">
                                <form action="{{ route('tour-booking-requests.store') }}" method="POST" id="tour_booking_request_form">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $packageDetails->id }}">
                                    <div class="form-info border-0">
                                        <div class="form-item border rounded p-3 mb-3 w-100 js-tour-booking-date-field">
                                            <label class="form-label fs-14 text-default mb-0">From</label>
                                            <input type="text" name="travel_from_date"
                                                class="form-control datetoday js-tour-booking-date"
                                                value="{{ $bookingDate->format('d-m-Y') }}"
                                                autocomplete="off" readonly>
                                            <p class="fs-12 js-tour-booking-date-day">{{ $bookingDate->format('l') }}</p>
                                        </div>
                                        <div class="form-item border rounded p-3 mb-3 w-100 js-tour-booking-date-field">
                                            <label class="form-label fs-14 text-default mb-0">To</label>
                                            <input type="text" name="travel_to_date"
                                                class="form-control datetoday js-tour-booking-date"
                                                value="{{ $bookingDate->format('d-m-Y') }}"
                                                autocomplete="off" readonly>
                                            <p class="fs-12 js-tour-booking-date-day">{{ $bookingDate->format('l') }}</p>
                                        </div>
                                        <div class="card shadow-none mb-3">
                                            <div class="card-body p-3 pb-0">
                                                <div class="border-bottom pb-2 mb-2">
                                                    <h6>Customer Details</h6>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-gray-9 mb-1">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name', $bookingUser?->name) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-gray-9 mb-1">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email', $bookingUser?->email) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-gray-9 mb-1">Phone</label>
                                                    <input type="text" name="phone" class="form-control" maxlength="15"
                                                        value="{{ old('phone', $bookingUser?->phone) }}"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card shadow-none mb-3">
                                            <div class="card-body p-3 pb-0">
                                                <div class="border-bottom pb-2 mb-2">
                                                    <h6>Details</h6>
                                                </div>
                                                <div class="custom-increment">
                                                    <div class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label class="form-label text-gray-9 mb-0">Adults</label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus" data-field="adults">
                                                                        <span><i class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text" name="adults" class="input-number"
                                                                    value="1">
                                                                <span class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus" data-field="adults">
                                                                        <span><i class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label class="form-label text-gray-9 mb-0">Infants <span
                                                                class="text-default fw-normal">( 0-12 Yrs
                                                                )</span></label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus" data-field="infants">
                                                                        <span><i class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text" name="infants" class="input-number"
                                                                    value="0">
                                                                <span class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus" data-field="infants">
                                                                        <span><i class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 d-flex align-items-center justify-content-between">
                                                        <label class="form-label text-gray-9 mb-0">Children <span
                                                                class="text-default fw-normal">( 2-12 Yrs
                                                                )</span></label>
                                                        <div class="custom-increment">
                                                            <div class="input-group">
                                                                <span class="input-group-btn float-start">
                                                                    <button type="button"
                                                                        class="quantity-left-minus btn btn-light btn-number"
                                                                        data-type="minus" data-field="children">
                                                                        <span><i class="isax isax-minus"></i></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text" name="children" class="input-number"
                                                                    value="0">
                                                                <span class="input-group-btn float-end">
                                                                    <button type="button"
                                                                        class="quantity-right-plus btn btn-light btn-number"
                                                                        data-type="plus" data-field="children">
                                                                        <span><i class="isax isax-add"></i></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-item border rounded p-3 mb-3 w-100">
                                            <label class="form-label fs-14 text-default mb-1">Special Request</label>
                                            <textarea name="special_request" class="form-control" rows="3"
                                                placeholder="Tell us about preferred hotels, food, pickup, or custom plans"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary btn-lg search-btn ms-0 w-100 fs-14"
                                        data-loading-text="Submitting">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <h5 class="fs-18 mb-3">Why Book With Us</h5>
                            <div>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-medal-star text-primary me-2"></i>Expertise and Experience</p>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-menu text-primary me-2"></i>Tailored Services</p>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-message-minus text-primary me-2"></i>Comprehensive Planning</p>
                                <p class="d-flex align-items-center mb-3"><i
                                        class="isax isax-user-add text-primary me-2"></i>Client Satisfaction</p>
                                <p class="d-flex align-items-center"><i
                                        class="isax isax-grammerly text-primary me-2"></i>24/7 Support</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none">
                        <div class="card-body">
                            <h5 class="fs-18 mb-3">Enquire Us</h5>
                            <div class="banner-form">
                                <form action="{{ route('enquiry.store') }}" method="POST" id="toures_details_form">
                                @csrf
                                <input type="hidden" name="tour_details_id" value="{{ $packageDetails->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Message</label>
                                        <textarea name="message" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary btn-lg search-btn ms-0 w-100 fs-14">Submit
                                        Enquiry</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /Tour Sidebar -->

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- ========================
        End Page Content
    ========================= -->

    @include('pages.toures.partials.review-modal', ['packageDetails' => $packageDetails])

@endsection

@section('script')
    <script>
        (function () {
            var assets = {
                jquery: "{{ URL::asset('build/js/jquery-3.7.1.min.js') }}",
                moment: "{{ URL::asset('build/js/moment.js') }}",
                datetimepicker: "{{ URL::asset('build/js/bootstrap-datetimepicker.min.js') }}"
            };
            var formSelector = '#tour_booking_request_form';
            var dateSelector = '.js-tour-booking-date';
            var fieldSelector = '.js-tour-booking-date-field';
            var dateFormat = 'DD-MM-YYYY';

            function loadScript(src, isLoaded, done) {
                if (isLoaded()) {
                    done();
                    return;
                }

                var script = document.createElement('script');
                script.src = src;
                script.onload = done;
                document.body.appendChild(script);
            }

            function ready(done) {
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', done);
                    return;
                }

                done();
            }

            function updateDateDay($input) {
                if (!window.moment) {
                    return;
                }

                var selectedDate = window.moment($input.val(), dateFormat, true);
                $input.closest(fieldSelector)
                    .find('.js-tour-booking-date-day')
                    .text(selectedDate.isValid() ? selectedDate.format('dddd') : '');
            }

            function initTourBookingDatepicker() {
                var $ = window.jQuery;

                if (!$ || !$(formSelector).length || !window.moment || !$.fn.datetimepicker) {
                    return;
                }

                var today = window.moment().startOf('day');

                $(formSelector).find(dateSelector).each(function () {
                    var $input = $(this);
                    var picker = $input.data('DateTimePicker');

                    if (picker) {
                        picker.destroy();
                    }

                    $input.datetimepicker({
                        format: dateFormat,
                        minDate: today,
                        defaultDate: today,
                        useCurrent: false,
                        allowInputToggle: true,
                        ignoreReadonly: true,
                        icons: {
                            up: 'fas fa-angle-up',
                            down: 'fas fa-angle-down',
                            next: 'fas fa-angle-right',
                            previous: 'fas fa-angle-left'
                        }
                    });

                    $input.val(today.format(dateFormat));
                    updateDateDay($input);
                });
            }

            function bindTourBookingDatepicker() {
                var $ = window.jQuery;

                $(document).on('click mousedown', formSelector + ' ' + fieldSelector + ', ' + formSelector + ' ' + dateSelector, function (event) {
                    if ($(event.target).closest('.bootstrap-datetimepicker-widget').length) {
                        return;
                    }

                    var $input = $(this).is(dateSelector)
                        ? $(this)
                        : $(this).find(dateSelector).first();

                    if (!$input.length) {
                        return;
                    }

                    var picker = $input.data('DateTimePicker');
                    if (!picker) {
                        initTourBookingDatepicker();
                        picker = $input.data('DateTimePicker');
                    }

                    if (picker) {
                        event.preventDefault();
                        picker.show();
                    }
                });

                $(document).on('dp.change', formSelector + ' ' + dateSelector, function () {
                    updateDateDay($(this));
                });
            }

            function bootTourBookingDatepicker() {
                loadScript(assets.jquery, function () {
                    return !!window.jQuery;
                }, function () {
                    loadScript(assets.moment, function () {
                        return !!window.moment;
                    }, function () {
                        loadScript(assets.datetimepicker, function () {
                            return !!(window.jQuery && window.jQuery.fn && window.jQuery.fn.datetimepicker);
                        }, function () {
                            initTourBookingDatepicker();
                            bindTourBookingDatepicker();
                        });
                    });
                });
            }

            ready(bootTourBookingDatepicker);
        })();
    </script>
    @vite(['resources/js/enquiry/create.js', 'resources/js/tour/booking-request.js', 'resources/js/tour/review.js'])
@endsection
