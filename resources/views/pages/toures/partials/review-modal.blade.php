<div class="modal fade" id="add_review" tabindex="-1" aria-labelledby="add-review-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-between">
                <h5 id="add-review-title">Write a Review</h5>
                <a href="#" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x fs-16"></i>
                </a>
            </div>
            <form action="{{ route('tour-reviews.store', $packageDetails->id) }}" method="POST" id="tour_review_form">
                @csrf
                <div class="modal-body pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Your Rating <span class="text-danger">*</span></label>
                                <div class="selection-wrap">
                                    <div class="d-inline-block">
                                        <div class="rating-selction">
                                            @foreach([5, 4, 3, 2, 1] as $star)
                                                <input type="radio" name="rating" value="{{ $star }}" id="tour-rating-{{ $star }}">
                                                <label for="tour-rating-{{ $star }}"><i class="fa-solid fa-star"></i></label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()?->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ auth()->user()?->email }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Write Your Review <span class="text-danger">*</span></label>
                                <textarea name="review" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex align-items-center justify-content-end m-0">
                        <button type="submit" class="btn btn-primary btn-md" data-loading-text="Submitting">
                            <i class="isax isax-edit-2 me-1"></i>Submit Review
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
