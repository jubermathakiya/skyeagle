<?php $page = "customer-tour-booking"; ?>
@extends('layout.mainlayout')
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-01 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Booking Detail</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('customer-tour-booking') }}">My Tour Bookings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Request #{{ $bookingRequest->id }}</li>
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
                    @php
                        $package = $bookingRequest->package;
                        $image = $package?->images?->first();
                        $imageUrl = $image ? backend_image($image->image) : URL::asset('build/img/tours/tours-07.jpg');
                        $packageName = $package?->package_name ?: $bookingRequest->package_name;
                        $packageSlug = $package?->slug ?: $bookingRequest->package_slug;
                        $tourUrl = $packageSlug ? route('tour-details', $packageSlug) : route('tour-list');
                        $price = $bookingRequest->estimated_price ?? $bookingRequest->package_price_snapshot ?? 0;
                    @endphp

                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between flex-wrap row-gap-3">
                                <div class="d-flex align-items-center">
                                    <a href="{{ $tourUrl }}" class="avatar avatar-xxxl flex-shrink-0 me-3">
                                        <img src="{{ $imageUrl }}" alt="{{ $packageName }}" class="img-fluid rounded">
                                    </a>
                                    <div>
                                        <span class="badge badge-soft-primary badge-xs rounded-pill mb-2">
                                            <i class="isax isax-signpost me-1"></i>Tour Request
                                        </span>
                                        <h5 class="mb-1"><a href="{{ $tourUrl }}">{{ $packageName }}</a></h5>
                                        <p class="fs-14 mb-0">
                                            Request #{{ $bookingRequest->id }} submitted on
                                            {{ $bookingRequest->created_at?->format('d M Y, h:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <span class="badge {{ $bookingRequest->status_badge_class }} rounded-pill">
                                    {{ $bookingRequest->status_label }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <p class="fs-13 text-gray-6 mb-1">Travel Date</p>
                                    <h6 class="mb-0">
                                        {{ $bookingRequest->travel_from_date?->format('d M Y') }}
                                        -
                                        {{ $bookingRequest->travel_to_date?->format('d M Y') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <p class="fs-13 text-gray-6 mb-1">Travellers</p>
                                    <h6 class="mb-0">
                                        {{ $bookingRequest->adults }} Adults,
                                        {{ $bookingRequest->children }} Children,
                                        {{ $bookingRequest->infants }} Infants
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <p class="fs-13 text-gray-6 mb-1">Estimated Price</p>
                                    <h6 class="mb-0">{{ $bookingRequest->currency }}{{ number_format((float) $price, 2) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <h6 class="mb-3">Customer Details</h6>
                                    <div class="border-bottom pb-2 mb-2 d-flex justify-content-between">
                                        <span class="text-gray-6">Name</span>
                                        <span class="fw-medium text-end">{{ $bookingRequest->name }}</span>
                                    </div>
                                    <div class="border-bottom pb-2 mb-2 d-flex justify-content-between">
                                        <span class="text-gray-6">Email</span>
                                        <span class="fw-medium text-end">{{ $bookingRequest->email }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-gray-6">Phone</span>
                                        <span class="fw-medium text-end">{{ $bookingRequest->phone ?: '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <h6 class="mb-3">Package Details</h6>
                                    <div class="border-bottom pb-2 mb-2 d-flex justify-content-between">
                                        <span class="text-gray-6">Package Code</span>
                                        <span class="fw-medium text-end">{{ $package?->package_code ?: $bookingRequest->package_code_snapshot ?: '-' }}</span>
                                    </div>
                                    <div class="border-bottom pb-2 mb-2 d-flex justify-content-between">
                                        <span class="text-gray-6">From</span>
                                        <span class="fw-medium text-end">{{ $bookingRequest->source_city ?: '-' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-gray-6">Destination</span>
                                        <span class="fw-medium text-end">{{ $bookingRequest->destination_city ?: '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($bookingRequest->special_request || $bookingRequest->admin_note)
                        <div class="card shadow-none">
                            <div class="card-body">
                                <h6 class="mb-3">Request Notes</h6>
                                @if($bookingRequest->special_request)
                                    <div class="bg-light-200 rounded p-3 mb-3">
                                        <p class="fs-13 text-gray-6 mb-1">Your Request</p>
                                        <p class="mb-0">{{ $bookingRequest->special_request }}</p>
                                    </div>
                                @endif
                                @if($bookingRequest->admin_note)
                                    <div class="bg-light-200 rounded p-3">
                                        <p class="fs-13 text-gray-6 mb-1">Admin Update</p>
                                        <p class="mb-0">{{ $bookingRequest->admin_note }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer-tour-booking') }}" class="btn btn-light">
                            <i class="isax isax-arrow-left me-1"></i>Back to Bookings
                        </a>
                        <a href="{{ $tourUrl }}" class="btn btn-primary">
                            <i class="isax isax-signpost me-1"></i>View Package
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
