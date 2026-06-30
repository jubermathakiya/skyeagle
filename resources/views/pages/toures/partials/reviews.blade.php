@php
    $reviews = $packageDetails->reviews ?? collect();
    $reviewCount = $reviewCount ?? package_review_count($packageDetails);
    $reviewRating = $reviewRating ?? package_review_rating($packageDetails);
    $ratingAverage = (float) $reviewRating;
    $filledStars = (int) round($ratingAverage);
    $ratingCounts = collect(range(1, 5))->mapWithKeys(fn ($star) => [$star => 0]);

    foreach ($reviews as $review) {
        $star = max(1, min(5, (int) round((float) $review->rating)));
        $ratingCounts[$star] = ($ratingCounts[$star] ?? 0) + 1;
    }
@endphp

<div id="tour-reviews-section">
    <div class="d-flex align-items-center justify-content-between flex-wrap mb-2" id="reviews">
        <h6 class="mb-3">Reviews ({{ $reviewCount }})</h6>
        <a href="#" data-bs-toggle="modal" data-bs-target="#add_review"
            class="btn btn-primary btn-md mb-3"><i class="isax isax-edit-2 me-1"></i>Write a Review</a>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="rating-item bg-light-200 text-center flex-fill mb-3">
                <h6 class="fw-medium mb-3">Customer Reviews & Ratings</h6>
                <h5 class="display-6">{{ $reviewRating }} / 5.0</h5>
                <div class="d-inline-flex align-items-center justify-content-center mb-3">
                    @for($star = 1; $star <= 5; $star++)
                        <i class="ti ti-star-filled {{ $star <= $filledStars ? 'text-primary' : 'text-light' }} me-1"></i>
                    @endfor
                </div>
                <p>Based On {{ number_format($reviewCount) }} {{ $reviewCount === 1 ? 'Review' : 'Reviews' }}</p>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card rating-progress shadow-none flex-fill mb-3">
                <div class="card-body">
                    @foreach([5, 4, 3, 2, 1] as $star)
                        @php
                            $count = (int) ($ratingCounts[$star] ?? 0);
                            $percentage = $reviewCount > 0 ? round(($count / $reviewCount) * 100) : 0;
                        @endphp
                        <div class="d-flex align-items-center {{ $loop->last ? '' : 'mb-2' }}">
                            <p class="me-2 text-nowrap mb-0">{{ $star }} Star Ratings</p>
                            <div class="progress w-100" role="progressbar" aria-valuenow="{{ $percentage }}"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-primary" style="width: {{ $percentage }}%"></div>
                            </div>
                            <p class="progress-count ms-2">{{ $count }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @forelse($reviews as $review)
        @php
            $rating = number_format((float) ($review->rating ?? 0), 1);
            $reviewDate = $review->created_at ? $review->created_at->diffForHumans() : '';
        @endphp
        <div class="card review-item shadow-none mb-3">
            <div class="card-body p-3">
                <div class="review-info">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="d-flex align-items-center mb-2">
                            <span class="avatar avatar-lg me-2 flex-shrink-0">
                                @if($review->reviewer_image)
                                    <img src="{{ backend_image($review->reviewer_image) }}" class="rounded-circle" alt="{{ $review->reviewer_name }}">
                                @else
                                    <span
                                        class="testimonial-card__avatar-initials rounded-circle d-flex align-items-center justify-content-center w-100 h-100 text-white"
                                        style="background-color: {{ reviewer_avatar_color($review->reviewer_name) }};"
                                        aria-hidden="true"
                                    >{{ reviewer_initials($review->reviewer_name) }}</span>
                                @endif
                            </span>
                            <div>
                                <h6 class="fs-16 fw-medium mb-1">{{ $review->reviewer_name }}</h6>
                                <div class="d-flex align-items-center flex-wrap date-info">
                                    @if($reviewDate)
                                        <p class="fs-14 mb-0">{{ $reviewDate }}</p>
                                    @endif
                                    <p class="fs-14 d-inline-flex align-items-center mb-0">
                                        <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium me-2">{{ $rating }}</span>
                                        {{ $review->review_title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-0">{!! nl2br(e($review->review_description)) !!}</div>
                </div>
            </div>
        </div>
    @empty
        <div class="border rounded p-3 bg-white mb-4">
            <p class="mb-0">No reviews available for this package yet.</p>
        </div>
    @endforelse
</div>
