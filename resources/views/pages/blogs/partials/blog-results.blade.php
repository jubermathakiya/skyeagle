<div id="blog-results-wrapper">
    <div class="row justify-content-center">
        @forelse($blogs as $blog)
            <!-- Blog Item-->
            <div class="col-xl-4 col-md-6">
                <div class="blog-item mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <a href="{{ route('blog-details', $blog->slug) }}" class="blog-img">
                        <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}">
                    </a>
                    <span class="badge bg-primary fs-13 fw-medium">{{ $blog->category_name }}</span>
                    <div class="blog-info text-center">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <div class="d-inline-flex align-items-center border-end pe-3 me-3 mb-2">
                                <a href="{{ route('blog-details', $blog->slug) }}" class="d-flex align-items-center">
                                    <span class="avatar avatar-sm me-2">
                                        <img src="{{ $blog->author_image_url }}"
                                            class="rounded-circle border border-white" alt="{{ $blog->author_display_name }}">
                                    </span>
                                    <p>{{ $blog->author_display_name }}</p>
                                </a>
                            </div>
                            <p class="text-white mb-2"><i class="isax isax-calendar-2 me-2"></i>{{ $blog->published_date }}</p>
                        </div>
                        <h5><a href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a></h5>
                    </div>
                </div>
            </div>
            <!-- /Blog Item-->
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2">No Blogs Found</h5>
                        <p class="mb-0">Please check back soon for new travel stories.</p>
                    </div>
                </div>
            </div>
        @endforelse

        @if($blogs->hasPages())
            @php
                $currentPage = $blogs->currentPage();
                $lastPage = $blogs->lastPage();
                $paginationPages = collect(range(1, $lastPage))
                    ->filter(fn ($pageNumber) => $pageNumber === 1
                        || $pageNumber === $lastPage
                        || abs($pageNumber - $currentPage) <= 2)
                    ->values();
            @endphp
            <!-- Pagination -->
            <nav class="pagination-nav">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $blogs->previousPageUrl() ?: '#' }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                        </a>
                    </li>
                    @foreach($paginationPages as $index => $pageNumber)
                        @if($index > 0 && $pageNumber - $paginationPages[$index - 1] > 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item {{ $blogs->currentPage() === $pageNumber ? 'active' : '' }}">
                            <a class="page-link" href="{{ $blogs->url($pageNumber) }}">{{ $pageNumber }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $blogs->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $blogs->nextPageUrl() ?: '#' }}" aria-label="Next">
                            <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /Pagination -->
        @endif
    </div>
</div>
