@if($packages->count() > 0)
    <div class="hotel-list">
        @foreach($packages as $package)
            <div class="place-item mb-4">
                <div class="place-img">
                    <div class="img-slider image-slide owl-carousel nav-center">
                        @forelse($package->images as $image)
                            <div class="slide-images">
                                <a href="{{ route('tour-details', $package->slug) }}">
                                    <img src="{{ backend_image($image->image) }}" style="width:100%; height:250px; object-fit:cover;" class="img-fluid" alt="img">
                                </a>
                            </div>
                        @empty
                            <div class="slide-images">
                                <a href="{{ route('tour-details', $package->slug) }}">
                                    <img src="{{ URL::asset('build/img/tours/tours-07.jpg') }}" class="img-fluid" alt="img">
                                </a>
                            </div>
                        @endforelse
                    </div>
                    <div class="fav-item">
                        <button
                            type="button"
                            class="fav-icon wishlist-toggle selected"
                            data-package-id="{{ $package->id }}"
                            data-toggle-url="{{ route('wishlist.toggle') }}"
                            aria-label="Remove from wishlist"
                        >
                            <i class="isax isax-heart5"></i>
                        </button>
                    </div>
                </div>
                <div class="place-content">
                    <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                        <div>
                            <h5 class="mb-1 text-truncate"><a href="{{ route('tour-details', $package->slug) }}">{{ $package->package_name }}</a></h5>
                            <p class="fs-14 d-flex align-items-center"><i class="isax isax-location5 me-2"></i>{{ $package->source_city }}, {{ $package->destination_city }}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="fs-14 text-gray-9 border-end pe-2 me-2 mb-0">
                                <span class="me-1"><i class="ti ti-receipt text-primary"></i></span>
                                {{ $package->category->name ?? '-' }}
                            </p>
                        </div>
                    </div>
                    <p class="fs-14 border-bottom pb-3 mb-3">{{ $package->short_title ?? '' }}</p>
                    <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                        <div class="d-flex align-items-center">
                            <span class="me-2"><i class="isax isax-calendar-tick text-gray-6"></i></span>
                            <p class="fs-14 text-gray-9 border-end pe-2 me-2 mb-0">
                                {{ $package->duration['text'] ?? '-' }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="d-flex align-items-center text-gray-6 fs-14 fw-normal">
                                Starts From
                                <span class="ms-1 fs-18 fw-semibold text-primary">{{ config('constants.currency_symbol') }}{{ $package->price }}</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body text-center py-5">
            <h6 class="mb-2">Your wishlist is empty</h6>
            <p class="fs-14 mb-0">Save tours from the listing page to see them here.</p>
        </div>
    </div>
@endif
