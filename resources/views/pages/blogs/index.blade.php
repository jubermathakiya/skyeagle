<?php $page = 'blog-grid'; ?>
@extends('layout.mainlayout')

@section('title', 'Blogs')

@section('content')
    <style>
        .blog-grid-page .blog-item .blog-img img {
            width: 100%;
            height: 390px;
            object-fit: cover;
            display: block;
        }

        @media (max-width: 1199.98px) {
            .blog-grid-page .blog-item .blog-img img {
                height: 360px;
            }
        }

        @media (max-width: 767.98px) {
            .blog-grid-page .blog-item .blog-img img {
                height: 320px;
            }
        }
    </style>

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-02 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Blog Grid</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Grid</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Wrapper -->
    <div class="content blog-grid-page">
        <div class="container">
            @include('pages.blogs.partials.blog-results', ['blogs' => $blogs])
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@section('script')
    @vite(['resources/js/blog/blog-list.js'])
@endsection
