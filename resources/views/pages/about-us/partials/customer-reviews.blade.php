@foreach($customerReviews as $review)
    @php
        $rating = number_format((float) ($review->rating ?? 0), 1);
    @endphp
    <!-- Testimonial Item-->
    <div class="card border-white testimonial-card wow fadeInUp" data-wow-delay="0.2s">
        <div class="card-body">
            <div class="testimonial-card__quote">
                <div class="testimonial-card__text">{!! strip_tags($review->review_description, '<strong><b><em><i><br>') !!}</div>
            </div>
            <button type="button" class="testimonial-card__toggle btn btn-link d-none" aria-expanded="false">
                <span class="testimonial-card__toggle-more">Read more</span>
                <span class="testimonial-card__toggle-less d-none">Read less</span>
            </button>
            <div class="testimonial-card__footer border-top pt-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="avatar avatar-md flex-shrink-0">
                        @if($review->reviewer_image)
                            <img src="{{ backend_image($review->reviewer_image) }}" class="rounded-circle" alt="{{ $review->reviewer_name }}">
                        @else
                            <span
                                class="testimonial-card__avatar-initials rounded-circle"
                                style="background-color: {{ reviewer_avatar_color($review->reviewer_name) }};"
                                aria-hidden="true"
                            >{{ reviewer_initials($review->reviewer_name) }}</span>
                        @endif
                    </span>
                    <div class="ms-2">
                        <h6 class="fs-16 fw-medium mb-0">{{ $review->reviewer_name }}</h6>
                        <p>{{ $review->reviewer_location }}</p>
                    </div>
                </div>
                <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium">{{ $rating }}</span>
            </div>
        </div>
    </div>
    <!-- /Testimonial Item-->
@endforeach
