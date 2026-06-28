<?php $page = "customer-tour-booking"; ?>
@extends('layout.mainlayout')
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-01 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">My Tour Bookings</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Tour Bookings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="content">
        <div class="container">
            <div class="row">
                @include('pages.partials.customer-sidebar', ['user' => $user, 'active' => 'tour-bookings'])

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h6>Tour Booking Requests</h6>
                            <p class="fs-14 mb-0">Requests submitted from tour packages : {{ $bookingRequests->total() }}</p>
                        </div>
                    </div>

                    @forelse($bookingRequests as $bookingRequest)
                        @php
                            $package = $bookingRequest->package;
                            $image = $package?->images?->first();
                            $imageUrl = $image ? backend_image($image->image) : URL::asset('build/img/tours/tours-07.jpg');
                            $packageName = $package?->package_name ?: $bookingRequest->package_name;
                            $packageSlug = $package?->slug ?: $bookingRequest->package_slug;
                            $detailUrl = $packageSlug ? route('tour-details', $packageSlug) : route('tour-list');
                            $bookingDetailUrl = route('customer-tour-booking.show', $bookingRequest->id);
                        @endphp

                        <div class="card booking-list shadow-none">
                            <div class="card-body d-lg-flex align-items-center">
                                <a href="{{ $detailUrl }}" class="avatar avatar-xxxl flex-shrink-0 me-lg-3 mb-3 mb-lg-0">
                                    <img src="{{ $imageUrl }}" alt="{{ $packageName }}" class="img-fluid rounded">
                                </a>
                                <div class="flex-fill">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                        <div>
                                            <span class="badge badge-soft-primary badge-xs rounded-pill mb-1">
                                                <i class="isax isax-signpost me-1"></i>Tour
                                            </span>
                                            <h5 class="mb-1"><a href="{{ $detailUrl }}">{{ $packageName }}</a></h5>
                                            <p class="fs-14 mb-0">
                                                <i class="isax isax-location5 me-1"></i>
                                                {{ $bookingRequest->source_city ?: '-' }}
                                                @if($bookingRequest->destination_city)
                                                    , {{ $bookingRequest->destination_city }}
                                                @endif
                                            </p>
                                        </div>
                                        <span class="badge {{ $bookingRequest->status_badge_class }} rounded-pill">
                                            {{ $bookingRequest->status_label }}
                                        </span>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <p class="fs-13 text-gray-6 mb-1">Travel Date</p>
                                            <h6 class="fs-14 fw-medium">
                                                {{ $bookingRequest->travel_from_date?->format('d M Y') }}
                                                -
                                                {{ $bookingRequest->travel_to_date?->format('d M Y') }}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="fs-13 text-gray-6 mb-1">Travellers</p>
                                            <h6 class="fs-14 fw-medium">
                                                {{ $bookingRequest->total_travellers }} Total
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="fs-13 text-gray-6 mb-1">Estimated Price</p>
                                            <h6 class="fs-14 fw-medium">
                                                {{ $bookingRequest->currency }}{{ number_format((float) ($bookingRequest->estimated_price ?: 0), 2) }}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="fs-13 text-gray-6 mb-1">Requested Date</p>
                                            <h6 class="fs-14 fw-medium">
                                                {{ $bookingRequest->created_at?->format('d M Y') }}
                                            </h6>
                                        </div>
                                    </div>

                                    @if($bookingRequest->special_request)
                                        <div class="bg-light-200 rounded p-2 mt-3">
                                            <p class="fs-14 mb-0">{{ $bookingRequest->special_request }}</p>
                                        </div>
                                    @endif

                                    <div class="d-flex justify-content-end mt-3">
                                        <a href="{{ $bookingDetailUrl }}" class="btn btn-primary btn-sm">
                                            <i class="isax isax-eye me-1"></i>View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body text-center py-5">
                                <span class="avatar avatar-xl bg-primary-transparent rounded-circle mx-auto mb-3">
                                    <i class="isax isax-calendar-add fs-24"></i>
                                </span>
                                <h6 class="mb-2">No tour booking requests yet</h6>
                                <p class="fs-14 mb-3">Submit a booking request from any tour details page.</p>
                                <a href="{{ route('tour-list') }}" class="btn btn-primary">Explore Tours</a>
                            </div>
                        </div>
                    @endforelse

                    @if($bookingRequests->hasPages())
                        <div class="d-flex justify-content-center">
                            {{ $bookingRequests->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
