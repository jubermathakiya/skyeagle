<?php $page = "destination-details"; ?>
@php
    $bannerImage = $destination->banner_image_url;
    $attractions = collect($destination->popular_attractions ?? [])->filter();
    $faqs = collect($destination->faqs ?? [])->filter(fn ($faq) => filled($faq['question'] ?? null) || filled($faq['answer'] ?? null));
@endphp
@extends('layout.mainlayout')

@section('content')
    <div class="breadcrumb-bar breadcrumb-bg-04 text-center" @if($bannerImage) style="background-image: url('{{ $bannerImage }}');" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">{{ $destination->name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('destinations.index') }}">Destinations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $destination->name }}</li>
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
                    <div class="row row-gap-4 mb-4">
                        <div class="col-12 d-flex">
                            <div class="destination-details-img w-100">
                                <img src="{{ $bannerImage ?: URL::asset('build/img/destination/destination-details-img-01.jpg') }}"
                                    alt="{{ $destination->name }}" class="img-fluid w-100 h-100">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="mb-2">
                            <h4 class="mb-1 d-flex align-items-center flex-wrap mb-2">{{ $destination->name }}</h4>
                            <div class="d-flex align-items-center flex-wrap">
                                @if($destination->location_name)
                                    <p class="fs-14 mb-2 me-3 pe-3 border-end">
                                        <i class="isax isax-location5 me-2"></i>{{ $destination->location_name }}
                                    </p>
                                @endif
                                <span class="badge badge-xs bg-info rounded-pill">
                                    <i class="isax isax-briefcase me-1"></i>{{ $destination->packages_count }} Packages
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="accordion custom-accordion">
                        <div class="accordion-item mb-4" id="destination_description">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#destination_description_body" aria-expanded="true">
                                    Description
                                </button>
                            </div>
                            <div id="destination_description_body" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="mb-0">{!! $destination->description ?: '<p>No description available.</p>' !!}</div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-4" id="destination_basic">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#destination_basic_body" aria-expanded="true">
                                    Basic Information
                                </button>
                            </div>
                            <div id="destination_basic_body" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="row gy-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-md bg-primary-transparent rounded-circle me-2">
                                                    <i class="isax isax-timer fs-16"></i>
                                                </span>
                                                <div>
                                                    <div class="fs-14 fw-medium text-dark mb-1">Best Time</div>
                                                    <span>{{ $destination->best_time_to_visit ?: '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-md bg-primary-transparent rounded-circle me-2">
                                                    <i class="isax isax-map fs-16"></i>
                                                </span>
                                                <div>
                                                    <div class="fs-14 fw-medium text-dark mb-1">City</div>
                                                    <span>{{ $destination->city ?: '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-md bg-primary-transparent rounded-circle me-2">
                                                    <i class="isax isax-global fs-16"></i>
                                                </span>
                                                <div>
                                                    <div class="fs-14 fw-medium text-dark mb-1">Country</div>
                                                    <span>{{ $destination->country ?: '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($attractions->isNotEmpty())
                            <div class="accordion-item mb-4" id="destination_attractions">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#destination_attractions_body" aria-expanded="true">
                                        Popular Attractions
                                    </button>
                                </div>
                                <div id="destination_attractions_body" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        @foreach($attractions as $attraction)
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="avatar avatar-md bg-primary-transparent rounded-circle me-2">
                                                    <i class="isax isax-verify fs-16"></i>
                                                </span>
                                                <p>{{ is_array($attraction) ? ($attraction['name'] ?? '') : $attraction }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($faqs->isNotEmpty())
                            <div class="accordion-item mb-4" id="destination_faqs">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#destination_faqs_body" aria-expanded="true">
                                        Frequently Asked Questions
                                    </button>
                                </div>
                                <div id="destination_faqs_body" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="accordion faq-accordion" id="accordionDestinationFaq">
                                            @foreach($faqs as $key => $faq)
                                                <div class="accordion-item {{ $key === 0 ? 'show' : '' }} mb-2">
                                                    <div class="accordion-header">
                                                        <button class="accordion-button fw-medium {{ $key !== 0 ? 'collapsed' : '' }}"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#destination-faq-{{ $key }}"
                                                            aria-expanded="{{ $key === 0 ? 'true' : 'false' }}">
                                                            {{ $faq['question'] ?? '-' }}
                                                        </button>
                                                    </div>
                                                    <div id="destination-faq-{{ $key }}"
                                                        class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                                        data-bs-parent="#accordionDestinationFaq">
                                                        <div class="accordion-body">
                                                            <p class="mb-0">{{ $faq['answer'] ?? '-' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="accordion-item mb-4" id="destination_location">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#destination_location_body" aria-expanded="true">
                                    Location
                                </button>
                            </div>
                            <div id="destination_location_body" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    @if($destination->map_embed_url)
                                        <iframe src="{{ $destination->map_embed_url }}" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"
                                            class="tour-detail-map w-100"></iframe>
                                    @else
                                        <div class="border rounded p-3 bg-white">
                                            <p class="mb-0">Location map unavailable.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 theiaStickySidebar">
                    <div class="card bg-light-200">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center fs-18 mb-3">
                                <span class="avatar avatar-md rounded-circle bg-primary me-2"><i class="isax isax-signpost5"></i></span>
                                Destination Details
                            </h5>
                            <div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">Destination</h6>
                                    <p class="flex-fill">{{ $destination->name }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">Country</h6>
                                    <p class="flex-fill">{{ $destination->country ?: '-' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">City</h6>
                                    <p class="flex-fill">{{ $destination->city ?: '-' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between details-info">
                                    <h6 class="fw-medium">Packages</h6>
                                    <p class="flex-fill">{{ $destination->packages_count }}</p>
                                </div>
                            </div>
                            <a href="#destination-packages" class="btn btn-primary btn-lg search-btn ms-0 w-100 fs-14">View Packages</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4" id="destination-packages">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                        <h5 class="mb-2">Packages in this destination</h5>
                        <a href="{{ route('tour-list', ['destination_city' => $destination->city ?: $destination->name]) }}"
                            class="btn btn-dark d-inline-flex align-items-center mb-2">
                            View All Tours<i class="isax isax-arrow-right-3 ms-2"></i>
                        </a>
                    </div>
                    @include('pages.toures.partials.tour-results', [
                        'packages' => $packages,
                        'wishlistPackageIds' => $wishlistPackageIds,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/package/index.js'])
@endsection
