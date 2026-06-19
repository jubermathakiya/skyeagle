<?php $page="tour-list";?>
@php
    $tourPackageBannerImage = $tourPackageMedia?->images?->first()?->image_url;
@endphp
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-02 text-center" @if($tourPackageBannerImage) style="background-image: url('{{ $tourPackageBannerImage }}');" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Tours</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tours</li>
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

            <!-- Tour Search -->
            <div class="card">
                <div class="card-body">
                    <div class="banner-form">
                        @include('pages.toures.partials.tour-search-form', [
                            'formId' => 'tour-banner-search-form',
                            'searchMode' => 'filter',
                            'selectedDestination' => $selectedDestination ?? '',
                            'showTitle' => false,
                            'isTrending' => !empty($isTrending),
                        ])
                    </div>
                </div>
            </div>
            <!-- /Tour Search -->

            <!-- Tour Types -->
            @include('pages.toures.partials.top-tour-categories', [
                'topTourCategories' => $topTourCategories,
            ])
            <!-- /Tour Types -->

            <div class="row">

                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-3 theiaStickySidebar">
                    <div class="card filter-sidebar mb-4 mb-lg-0">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5>Filters</h5>
                            <a href="{{ route('tour-list') }}" class="fs-14 link-primary" id="tour-filter-reset">Reset</a>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('tour-list') }}" method="GET" id="tour-filter-form">
                                @if(!empty($selectedType))
                                    <input type="hidden" name="type" value="{{ $selectedType }}">
                                @endif
                                @if(!empty($selectedDestination))
                                    <input type="hidden" name="destination_city" value="{{ $selectedDestination }}">
                                @endif
                                @if(!empty($isTrending))
                                    <input type="hidden" name="is_trending" value="1">
                                @endif
                                <div class="p-3 border-bottom">
                                    <label class="form-label fs-16">Search by Tour Type</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-search-normal"></i>
                                        </span>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Search by Tour Type"
                                            name="tour_type_search"
                                            id="tour-type-search"
                                            value="{{ $tourTypeSearch ?? '' }}"
                                        >
                                    </div>
                                </div>
                                <div class="accordion accordion-list">
                                    @php
                                        $attributeSectionMeta = [
                                            'popular' => ['label' => 'Popular', 'icon' => 'isax isax-ranking', 'inline' => true],
                                            'accommodation' => ['label' => 'Accommodation Type', 'icon' => 'isax isax-candle', 'inline' => false],
                                            'activity' => ['label' => 'Activities', 'icon' => 'isax isax-activity', 'inline' => false],
                                            'meal_plan' => ['label' => 'Meal plans available', 'icon' => 'isax isax-reserve', 'inline' => true],
                                        ];
                                        $orderedAttributeTypes = collect(['popular', 'accommodation', 'activity', 'meal_plan'])
                                            ->merge(($packageAttributeGroups ?? collect())->keys())
                                            ->unique()
                                            ->values();
                                    @endphp
                                    @foreach($orderedAttributeTypes as $attributeType)
                                        @php
                                            $attributes = ($packageAttributeGroups ?? collect())->get($attributeType, collect());
                                            $meta = $attributeSectionMeta[$attributeType] ?? [
                                                'label' => \Illuminate\Support\Str::headline($attributeType),
                                                'icon' => 'isax isax-tag',
                                                'inline' => false,
                                            ];
                                            $collapseId = 'accordion-attribute-' . \Illuminate\Support\Str::slug($attributeType);
                                        @endphp
                                        @if($attributes->isNotEmpty())
                                            <div class="accordion-item border-bottom p-3">
                                                <div class="accordion-header">
                                                    <div class="accordion-button p-0" data-bs-toggle="collapse"
                                                        data-bs-target="#{{ $collapseId }}" aria-expanded="true"
                                                        aria-controls="{{ $collapseId }}" role="button">
                                                        <i class="{{ $meta['icon'] }} me-2 text-primary"></i>{{ $meta['label'] }}
                                                    </div>
                                                </div>
                                                <div id="{{ $collapseId }}" class="accordion-collapse collapse show">
                                                    <div class="accordion-body {{ $meta['inline'] ? 'pt-2' : '' }}">
                                                        <div>
                                                            @foreach($attributes as $attribute)
                                                                @php $isChecked = in_array($attribute->id, $selectedAttributeIds ?? [], true); @endphp
                                                                <div class="{{ $meta['inline'] ? 'form-checkbox form-check form-check-inline d-inline-flex align-items-center mt-2 me-2' : 'form-check d-flex align-items-center ps-0 mb-2' }}">
                                                                    <input
                                                                        class="form-check-input ms-0 mt-0"
                                                                        name="attributes[]"
                                                                        type="checkbox"
                                                                        id="package-attribute-{{ $attribute->id }}"
                                                                        value="{{ $attribute->id }}"
                                                                        {{ $isChecked ? 'checked' : '' }}
                                                                        data-attribute-filter="1"
                                                                    >
                                                                    <label class="form-check-label ms-2" for="package-attribute-{{ $attribute->id }}">
                                                                        {{ $attribute->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse"
                                                data-bs-target="#accordion-popular" aria-expanded="true"
                                                aria-controls="accordion-popular" role="button">
                                                <i class="isax isax-coin me-2 text-primary"></i>Price Per Night
                                            </div>
                                        </div>
                                        <div id="accordion-popular" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="filter-range">
                                                    <input type="text" id="range_03">
                                                </div>
                                                <div class="filter-range-amount">
                                                    <p class="fs-14">Range : <span class="text-gray-9 fw-medium">$200 -
                                                            $800</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom p-3">
                                        <div class="accordion-header">
                                            <div class="accordion-button p-0" data-bs-toggle="collapse"
                                                data-bs-target="#accordion-hotel" aria-expanded="true"
                                                aria-controls="accordion-hotel" role="button">
                                                <i class="isax isax-buildings me-2 text-primary"></i>Tour Types
                                            </div>
                                        </div>
                                        <div id="accordion-hotel" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="more-content">
                                                    @forelse($categories as $category)
                                                        @php $isChecked = in_array($category->id, $selectedCategoryIds ?? [], true); @endphp
                                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                                            <input
                                                                class="form-check-input ms-0 mt-0"
                                                                name="categories[]"
                                                                type="checkbox"
                                                                id="category-{{ $category->id }}"
                                                                value="{{ $category->id }}"
                                                                {{ $isChecked ? 'checked' : '' }}
                                                                data-category-filter="1"
                                                            >
                                                            <label class="form-check-label ms-2" for="category-{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </label>
                                                        </div>
                                                    @empty
                                                        <p class="fs-14 mb-0">No tour types found.</p>
                                                    @endforelse
                                                </div>
                                                <a href="#" class="more-view text-primary fw-medium fs-14">See Less</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar -->

                <div class="col-xl-9 col-lg-9">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <h6 class="mb-3" id="tour-results-count">{{ $packages->total() }} Tours Found on Your Search</h6>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="list-item d-flex align-items-center mb-3">
                                <a href="{{url('tour-grid')}}" class="list-icon me-2"><i class="isax isax-grid-1"></i></a>
                                <a href="{{url('tour-list')}}" class="list-icon active me-2"><i
                                        class="isax isax-firstline"></i></a>
                                <a href="{{url('tour-map')}}" class="list-icon me-2"><i class="isax isax-map-1"></i></a>
                            </div>
                            <div class="dropdown mb-3">
                                <a href="#" class="dropdown-toggle py-2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="fw-medium text-gray-9">Sort By : </span>Recommended
                                </a>
                                <div class="dropdown-menu dropdown-sm">
                                    <form action="{{url('tour-list')}}">
                                        <h6 class="fw-medium fs-16 mb-3">Sort By</h6>
                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                            <input class="form-check-input ms-0 mt-0" name="recommend" type="checkbox"
                                                id="recommend1" checked>
                                            <label class="form-check-label ms-2" for="recommend1">Recommended</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                            <input class="form-check-input ms-0 mt-0" name="recommend" type="checkbox"
                                                id="recommend2">
                                            <label class="form-check-label ms-2" for="recommend2">Price: low to
                                                high</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                            <input class="form-check-input ms-0 mt-0" name="recommend" type="checkbox"
                                                id="recommend3">
                                            <label class="form-check-label ms-2" for="recommend3">Price: high to
                                                low</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                            <input class="form-check-input ms-0 mt-0" name="recommend" type="checkbox"
                                                id="recommend4">
                                            <label class="form-check-label ms-2" for="recommend4">Newest</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center ps-0 mb-2">
                                            <input class="form-check-input ms-0 mt-0" name="recommend" type="checkbox"
                                                id="recommend5">
                                            <label class="form-check-label ms-2" for="recommend5">Ratings</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center ps-0 mb-0">
                                            <input class="form-check-input ms-0 mt-0" name="recommend" type="checkbox"
                                                id="recommend6">
                                            <label class="form-check-label ms-2" for="recommend6">Reviews</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end border-top pt-3 mt-3">
                                            <a href="#" class="btn btn-light btn-sm me-2">Reset</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-info br-10 p-3 pb-2 mb-4">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p class="fs-14 fw-medium mb-2 d-inline-flex align-items-center"><i
                                    class="isax isax-info-circle me-2"></i>Save an average of 15% on thousands of hotels
                                when you're signed in</p>
                            <a href="{{url('login')}}" class="btn btn-white btn-sm mb-2">Sign In</a>
                        </div>
                    </div>
                    @include('pages.toures.partials.tour-results', [
                        'packages' => $packages,
                        'wishlistPackageIds' => $wishlistPackageIds ?? collect(),
                    ])

                </div>

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- ========================
        End Page Content
    ========================= -->

@endsection

@section('script')
    @vite(['resources/js/package/index.js', 'resources/js/tour/city-suggestions.js', 'resources/js/tour/tour-search-form.js'])
@endsection
