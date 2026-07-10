@php
    $page = $contentPage->slug;
    $contentPageBannerImage = ($contentPageMedia ?? null)?->images?->first()?->image_url;
@endphp
@extends('layout.mainlayout')
@section('title', $contentPage->title)
@section('content')

    <div class="breadcrumb-bar breadcrumb-bg-02 text-center" @if($contentPageBannerImage) style="background-image: url('{{ $contentPageBannerImage }}');" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">{{ $contentPage->title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $contentPage->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="policy-content">
                @if($contentPage->is_active && filled($content))
                    {!! $content !!}
                @else
                    <p class="mb-0">Content will be updated soon.</p>
                @endif
            </div>
        </div>
    </div>

    <style>
        .policy-content h1,
        .policy-content h2,
        .policy-content h3,
        .policy-content h4,
        .policy-content h5,
        .policy-content h6 {
            margin-bottom: 0.5rem;
        }

        .policy-content p,
        .policy-content ul,
        .policy-content ol {
            margin-bottom: 1rem;
        }

        .policy-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
