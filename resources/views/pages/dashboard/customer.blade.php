<?php $page = "dashboard"; ?>
@extends('layout.mainlayout')
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-04 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Dashboard</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="content content-two">
        <div class="container">
            <div class="row">
                @include('pages.partials.customer-sidebar', ['user' => $user, 'active' => 'dashboard'])

                <div class="col-xl-9 col-lg-8">
                    @php
                        $stats = $bookingStats ?? ['total' => 0, 'pending' => 0, 'confirmed' => 0, 'cancelled' => 0];
                    @endphp

                    @if(($recentBookingRequests ?? collect())->isNotEmpty())
                        @php($latestBooking = $recentBookingRequests->first())
                        <div class="alert alert-teal alert-dismissible d-flex align-items-center border-0 mb-4 fade show">
                            <i class="isax isax-info-circle5 me-2"></i>
                            Your latest tour request "{{ $latestBooking->package_name }}" is currently {{ $latestBooking->status_label }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-xmark"></i></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-xl-3 col-sm-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xl rounded-circle bg-primary me-3">
                                            <i class="isax isax-calendar-15 fs-36"></i>
                                        </span>
                                        <div>
                                            <h3>{{ $stats['total'] }}</h3>
                                            <p>Total Bookings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xl rounded-circle bg-warning me-3">
                                            <i class="isax isax-timer5 fs-36"></i>
                                        </span>
                                        <div>
                                            <h3>{{ $stats['pending'] }}</h3>
                                            <p>Pending</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xl rounded-circle bg-success me-3">
                                            <i class="isax isax-tick-circle5 fs-36"></i>
                                        </span>
                                        <div>
                                            <h3>{{ $stats['confirmed'] }}</h3>
                                            <p>Confirmed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 d-flex">
                            <div class="card shadow-none flex-fill">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xl rounded-circle bg-danger me-3">
                                            <i class="isax isax-close-circle5 fs-36"></i>
                                        </span>
                                        <div>
                                            <h3>{{ $stats['cancelled'] }}</h3>
                                            <p>Cancelled</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 mb-4">
                                <h6 class="mb-0">Recent Tour Bookings</h6>
                                <a href="{{ route('customer-tour-booking') }}" class="btn btn-primary btn-sm">
                                    <i class="isax isax-calendar-tick5 me-1"></i>My Bookings
                                </a>
                            </div>

                            @forelse($recentBookingRequests as $bookingRequest)
                                @php
                                    $package = $bookingRequest->package;
                                    $image = $package?->images?->first();
                                    $imageUrl = $image ? backend_image($image->image) : URL::asset('build/img/tours/tours-07.jpg');
                                @endphp
                                <div class="card shadow-none {{ $loop->last ? 'mb-0' : 'mb-2' }}">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-wrap row-gap-2">
                                            <a href="{{ route('customer-tour-booking.show', $bookingRequest->id) }}" class="avatar avatar-xl flex-shrink-0 me-2">
                                                <img src="{{ $imageUrl }}" class="img-fluid rounded-circle" alt="{{ $bookingRequest->package_name }}">
                                            </a>
                                            <div class="flex-fill">
                                                <span class="badge badge-soft-pink badge-xs rounded-pill mb-1">
                                                    <i class="isax isax-signpost me-1"></i>Tour
                                                </span>
                                                <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 mb-1">
                                                    <h6 class="fs-16 text-truncate mb-0">
                                                        <a href="{{ route('customer-tour-booking.show', $bookingRequest->id) }}">{{ $bookingRequest->package_name }}</a>
                                                    </h6>
                                                    <span class="badge {{ $bookingRequest->status_badge_class }} badge-sm rounded-pill">
                                                        {{ $bookingRequest->status_label }}
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <p class="fs-14 d-flex align-items-center border-end pe-2 me-2 mb-0">
                                                        <i class="isax isax-calendar-25 me-2"></i>
                                                        Date: {{ $bookingRequest->travel_from_date?->format('d M Y') ?: '-' }}
                                                    </p>
                                                    <p class="fs-14 d-flex align-items-center mb-0">
                                                        <i class="isax isax-people5 me-2"></i>
                                                        Travellers: {{ $bookingRequest->total_travellers }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <span class="avatar avatar-xl bg-primary-transparent rounded-circle mx-auto mb-3">
                                        <i class="isax isax-calendar-add fs-24"></i>
                                    </span>
                                    <h6 class="mb-2">No tour bookings yet</h6>
                                    <p class="fs-14 mb-3">Submit a booking request from any tour details page.</p>
                                    <a href="{{ route('tour-list') }}" class="btn btn-primary">Explore Tours</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
