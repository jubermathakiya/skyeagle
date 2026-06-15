@php
    $page = 'blog-details';
    $blogBannerImage = $blogMedia?->images?->first()?->image_url;
@endphp
@extends('layout.mainlayout')

@section('title', $blog->title)

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-02 text-center" @if($blogBannerImage) style="background-image: url('{{ $blogBannerImage }}');" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Blog Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog-grid') }}">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
            @php
                $secondaryImages = $blog->images->skip(1)->take(2);
            @endphp

            <!-- Blog Details -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card blog-details mb-4 mb-lg-0">
                        <div class="card-body">
                            <div class="blog-content">
                                <div class="blog-image mb-3">
                                    <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                                </div>
                                <div class="d-flex align-items-center flex-wrap row-gap-2 mb-3">
                                    <a href="#"
                                        class="d-flex align-items-center fs-16 text-gray-9 pe-3 border-end me-3">
                                        <img src="{{ $blog->author_image_url }}" alt="{{ $blog->author_display_name }}"
                                            class="img-fluid avatar avatar-sm rounded-circle me-2"> {{ $blog->author_display_name }}
                                    </a>
                                    <div class="pe-3 border-end me-3">
                                        <span class="d-flex align-items-center fs-16 text-gray-9"><i
                                                class="isax isax-calendar-2 me-1"></i>{{ $blog->published_date }}</span>
                                    </div>
                                    <div class="pe-3 border-end me-3">
                                        <span class="d-flex align-items-center fs-16 text-gray-9"><i
                                                class="isax isax-eye me-1"></i>{{ number_format($blog->views_count) }} Views</span>
                                    </div>
                                    <div>
                                        <span class="badge badge-sm badge-primary">{{ $blog->category_name }}</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h2>{{ $blog->title }}</h2>
                                </div>
                                <div class="mb-3 text-gray-6">
                                    {!! $blog->content !!}
                                </div>
                                @if($secondaryImages->isNotEmpty())
                                    <div class="row">
                                        @foreach($secondaryImages as $image)
                                            <div class="col-md-6">
                                                <div class="blog-image mb-3">
                                                    <img src="{{ $image->image_url }}" alt="{{ $blog->title }}"
                                                        class="img-fluid rounded">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="pb-3 border-bottom">
                                    <p class="fs-14 text-gray-6 mb-0">{!! nl2br(e($blog->excerpt_text)) !!}</p>
                                </div>
                                <div
                                    class="mt-3 pb-3 border-bottom d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <p class="fs-16 text-gray-9 mb-0 me-2">Tags :</p>
                                        @forelse($blog->tags as $tag)
                                            <a href="{{ route('blog-grid') }}" class="badge badge-sm badge-secondary me-2">{{ $tag->name }}</a>
                                        @empty
                                            <span class="badge badge-sm badge-secondary">Travel</span>
                                        @endforelse
                                    </div>
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        <p class="fs-16 text-gray-9 mb-0 me-2">Share On :</p>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer" class="me-2"><img src="{{ asset('build/img/icons/facebook.svg') }}" alt="Facebook"
                                                class="img-fluid"></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" rel="noopener noreferrer" class="me-2"><img src="{{ asset('build/img/icons/twitter.svg') }}" alt="Twitter"
                                                class="img-fluid"></a>
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('build/img/icons/whatsapp.svg') }}" alt="Whatsapp"
                                                class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <div class="border border-light br-10 p-3 d-md-flex align-items-center">
                                        <div class="blog-user-image me-md-3 mb-3 mb-md-0 flex-shrink-0">
                                            <img src="{{ $blog->author_image_url }}" alt="{{ $blog->author_display_name }}"
                                                class="img-fluid rounded">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fs-14 text-primary mb-1">About Author</h6>
                                            <p class="fs-16 text-gray-6">{{ $blog->author_about ?: 'Our travel team shares practical destination guides, planning tips, and helpful ideas for memorable journeys.' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <h6>Comments ({{ $blog->comments->count() }})</h6>
                                <div id="blog-comments-list">
                                    @forelse($blog->comments as $comment)
                                        @include('pages.blogs.partials.comment-item', ['comment' => $comment])
                                    @empty
                                        <div class="my-3">
                                            <div class="border border-light rounded p-3">
                                                <p class="fs-14 text-gray-6 mb-0">No comments yet. Be the first to share your thoughts.</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <h6 class="mb-3">Write A Comment</h6>
                                <div>
                                    <form id="blog_comment_form" action="{{ route('blog-comments.store', $blog->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="commentName" class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="commentName">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="commentEmail" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="commentEmail">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Message</label>
                                                    <textarea name="message" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-primary">Post Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 theiaStickySidebar">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pb-3 border-bottom mb-3">
                                <h5 class="d-flex align-items-center"><span class="me-1 fs-16"><i
                                            class="isax isax-search-normal text-primary"></i></span> Search</h5>
                            </div>
                            <div class="blog-search">
                                <form action="{{ route('blog-grid') }}" method="GET" class="search-content">
                                    <div class="search-feild position-relative">
                                        <span><i class="isax isax-search-normal"></i></span>
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header border-0 pb-0">
                            <div class="pb-3 border-bottom">
                                <h5><i class="isax isax-candle text-primary fs-16 me-2"></i>Categories</h5>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-medium mb-0"><a href="#">Travel</a></h6>
                                <p>(12)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-medium mb-0"><a href="#">Guide</a></h6>
                                <p>(10)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-medium mb-0"><a href="#">Rental</a></h6>
                                <p>(14)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-dark fw-medium mb-0"><a href="#">Adventure</a></h6>
                                <p>(16)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-medium mb-0"><a href="#">Vacation</a></h6>
                                <p>(20)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="fw-medium mb-0"><a href="#">Tips</a></h6>
                                <p>(15)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <div class="card mb-3">
                        <div class="card-header border-0 pb-0">
                            <div class="pb-3 border-bottom">
                                <h5><i class="ti ti-brand-blogger text-primary fs-16 me-2"></i>Related Posts</h5>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            @forelse($relatedPosts as $relatedPost)
                                <div class="blog-post {{ $loop->last ? '' : 'mb-3' }}">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex">
                                            <a href="{{ route('blog-details', $relatedPost->slug) }}" class="avatar avatar-xxl me-2">
                                                <img src="{{ $relatedPost->featured_image_url }}" class="rounded" alt="{{ $relatedPost->title }}">
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('blog-details', $relatedPost->slug) }}" class="two-line-ellipsis fs-14 fw-medium">{{ $relatedPost->title }}</a>
                                            <div class="d-flex align-items-center mt-2">
                                                <a href="{{ route('blog-details', $relatedPost->slug) }}" class="d-flex align-items-center border-end pe-2 me-2">
                                                    <span class="avatar avatar-xs me-1">
                                                        <img src="{{ $relatedPost->author_image_url }}"
                                                            class="blog-user-img rounded-circle border border-light"
                                                            alt="{{ $relatedPost->author_display_name }}">
                                                    </span>
                                                    <p class="fs-14 text-truncate">{{ $relatedPost->author_display_name }}</p>
                                                </a>
                                                <p class="fs-14 text-truncate"><i class="isax isax-calendar-2 me-2"></i>{{ $relatedPost->published_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="fs-14 mb-0">No related posts found.</p>
                            @endforelse
                        </div>
                    </div>
                    <!-- /Related Posts -->

                    <div class="card mb-0">
                        <div class="card-header border-0 pb-0">
                            <div class="pb-3 border-bottom">
                                <h5><i class="isax isax-tag text-primary fs-16 me-2"></i>Popular Tags</h5>
                            </div>
                        </div>
                        <div class="card-body pt-3 pb-2">
                            <div class="d-flex align-items-center flex-wrap category-tag">
                                @forelse($popularTags as $tag)
                                    <a href="{{ route('blog-grid') }}" class="badge badge-md fw-normal me-2 mb-2">{{ $tag->name }}</a>
                                @empty
                                    <a href="{{ route('blog-grid') }}" class="badge badge-md fw-normal me-2 mb-2">Travel</a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Blog Details -->

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@section('script')
    @vite(['resources/js/blog/comments.js'])
@endsection
