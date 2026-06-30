<div
    id="tour-results-wrapper"
    data-next-page-url="{{ $packages->nextPageUrl() }}"
    data-has-more-pages="{{ $packages->hasMorePages() ? '1' : '0' }}"
>
    @if($packages->count() > 0)
        <div class="tour-grid-results">
            <div class="row justify-content-center" id="tour-results-list">
                @foreach($packages as $package)
                    @php
                        $isWishlisted = isset($wishlistPackageIds) && $wishlistPackageIds->contains($package->id);
                        $images = $package->images->take(3);
                        $reviewCount = package_review_count($package);
                        $reviewRating = package_review_rating($package);
                    @endphp
                    <div class="col-xxl-4 col-md-6 d-flex" data-tour-result-item="1">
                        <div class="place-item mb-4 flex-fill">
                            <div class="place-img">
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    @forelse($images as $image)
                                        <div class="slide-images">
                                            <a href="{{ route('tour-details', $package->slug) }}" class="ratio d-block" style="--bs-aspect-ratio: 66.6667%;">
                                                <img src="{{ backend_image($image->image) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="img">
                                            </a>
                                        </div>
                                    @empty
                                        <div class="slide-images">
                                            <a href="{{ route('tour-details', $package->slug) }}" class="ratio d-block" style="--bs-aspect-ratio: 66.6667%;">
                                                <img src="{{ URL::asset('build/img/tours/tours-07.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="img">
                                            </a>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="fav-item">
                                    <a
                                        href="#"
                                        class="fav-icon wishlist-toggle {{ $isWishlisted ? 'selected' : '' }}"
                                        data-package-id="{{ $package->id }}"
                                        data-toggle-url="{{ route('wishlist.toggle') }}"
                                        aria-label="Toggle wishlist"
                                    >
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    @if(!empty($package->is_trending))
                                        <span class="badge bg-info d-inline-flex align-items-center"><i class="isax isax-ranking me-1"></i>Trending</span>
                                    @endif
                                </div>
                            </div>
                            <div class="place-content">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex align-items-center flex-fill overflow-hidden">
                                        <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                        <p class="fs-14 text-gray-9 text-truncate mb-0">{{ $package->category->name ?? '-' }}</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits mx-3 flex-shrink-0">
                                        <span class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="d-flex align-items-center flex-shrink-0">
                                        <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-1">{{ $reviewRating }}</span>
                                        <p class="fs-14 mb-0">{{ review_count_text($reviewCount) }}</p>
                                    </div>
                                </div>
                                <h5 class="mb-1 text-truncate"><a href="{{ route('tour-details', $package->slug) }}">{{ $package->package_name }}</a></h5>
                                <p class="d-flex align-items-center mb-3 text-truncate"><i class="isax isax-location5 me-2 flex-shrink-0"></i><span class="text-truncate">{{ $package->source_city }}, {{ $package->destination_city }}</span></p>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">Starts From
                                        <span class="ms-1 fs-18 fw-semibold text-primary">{{ config('constants.currency_symbol') }}{{ $package->price }}</span>
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                    <div class="d-flex align-items-center me-2 overflow-hidden">
                                        <span class="me-1"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate">{{ $package->duration['text'] ?? '-' }}</p>
                                    </div>
                                    <span class="d-inline-block border vertical-splits flex-shrink-0">
                                        <span class="bg-light text-light d-flex align-items-center justify-content-center"></span>
                                    </span>
                                    <div class="ms-2 d-flex align-items-center flex-shrink-0">
                                        <p class="fs-14 text-gray-9 mb-0 text-truncate d-flex align-items-center">
                                            <i class="isax isax-profile-2user me-1"></i>{{ $package->max_people ?? 0 }} Guests
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tour-infinite-status text-center py-3 {{ $packages->hasMorePages() ? '' : 'd-none' }}" data-tour-infinite-status>
            <span class="spinner-border spinner-border-sm text-primary d-none me-2" role="status" aria-hidden="true"></span>
            <span class="fs-14 text-gray-6" data-tour-infinite-text></span>
        </div>
    @else
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body text-center py-5">
                <h6 class="mb-2">No tours found</h6>
                <p class="fs-14 mb-0">Please change filters or search keyword.</p>
            </div>
        </div>
    @endif
</div>
