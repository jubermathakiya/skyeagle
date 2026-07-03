@php
    $destinationImage = $destination->banner_image_url ?: URL::asset('build/img/destination/destination-01.jpg');
    $packageCount = (int) ($destination->packages_count ?? 0);
    $displayName = $destination->city ?: $destination->name;
    $tourCountText = $packageCount . ' ' . \Illuminate\Support\Str::plural('Tour', $packageCount);
@endphp

<div class="destination-item {{ $class ?? '' }} wow fadeInUp" data-wow-delay="0.2s">
    <img src="{{ $destinationImage }}" alt="{{ $displayName }}">
    <div class="destination-info text-center">
        <div class="destination-content">
            <h5 class="mb-1 text-white">{{ $displayName }}</h5>
            <div class="d-flex align-items-center justify-content-center">
                <div class="rating d-flex align-items-center me-2">
                    <i class="fa-solid fa-star filled me-1"></i>
                    <i class="fa-solid fa-star filled me-1"></i>
                    <i class="fa-solid fa-star filled me-1"></i>
                    <i class="fa-solid fa-star filled me-1"></i>
                    <i class="fa-solid fa-star filled"></i>
                </div>
                <p class="fs-14 text-white">{{ $tourCountText }}</p>
            </div>
        </div>
        <div class="destination-overlay bg-white mt-2">
            <div class="d-flex">
                <div class="col border-end">
                    <div class="count-info text-center">
                        <span class="d-block mb-1 text-indigo">
                            <i class="isax isax-location"></i>
                        </span>
                        <h6 class="fs-13 fw-medium">{{ $destination->city ?: 'City' }}</h6>
                    </div>
                </div>
                <div class="col border-end">
                    <div class="count-info text-center">
                        <span class="d-block mb-1 text-cyan">
                            <i class="isax isax-global"></i>
                        </span>
                        <h6 class="fs-13 fw-medium">{{ $destination->country ?: 'Country' }}</h6>
                    </div>
                </div>
                <div class="col">
                    <div class="count-info text-center">
                        <span class="d-block mb-1 text-success">
                            <i class="isax isax-briefcase"></i>
                        </span>
                        <h6 class="fs-13 fw-medium">{{ $tourCountText }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('destinations.show', $destination->slug) }}" class="overlay-circle-link">
        <i class="isax isax-arrow-right-1"></i>
    </a>
</div>
