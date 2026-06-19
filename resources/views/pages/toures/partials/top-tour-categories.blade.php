<div class="mb-2" id="top-tour-categories-wrapper">
    <div class="mb-3">
        <h5 class="mb-2">Choose type of Tours you are interested</h5>
    </div>
    <div class="row">
        @forelse($topTourCategories as $topCategory)
            <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="d-flex align-items-center hotel-type-item mb-3">
                    <a
                        href="{{ route('tour-list', ['categories' => [$topCategory->id]]) }}"
                        class="avatar avatar-lg"
                        data-top-tour-category="{{ $topCategory->id }}"
                    >
                        <img
                            src="{{ $topCategory->image_url ?: URL::asset('build/img/tours/tours-01.jpg') }}"
                            class="rounded-circle"
                            alt="{{ $topCategory->name }}"
                        >
                    </a>
                    <div class="ms-2">
                        <h6 class="fs-16 fw-medium">
                            <a
                                href="{{ route('tour-list', ['categories' => [$topCategory->id]]) }}"
                                data-top-tour-category="{{ $topCategory->id }}"
                            >
                                {{ $topCategory->name }}
                            </a>
                        </h6>
                        <p class="fs-14">
                            {{ $topCategory->tours_count }} {{ $topCategory->tours_count === 1 ? 'tour' : 'tours' }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="fs-14 mb-3">No tour types found.</p>
            </div>
        @endforelse
    </div>
</div>
