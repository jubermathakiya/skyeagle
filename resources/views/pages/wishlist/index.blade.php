<?php $page="wishlist";?>
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bg-01 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Wishlist</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{url('index')}}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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
            <div class="row">
                @include('pages.partials.customer-sidebar', ['user' => $user, 'active' => 'wishlist'])

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h6>My Wishlist</h6>
                            <p class="fs-14" id="wishlist-page-count">Items in Wishlist : {{ $packages->count() }}</p>
                        </div>
                    </div>

                    <div id="wishlist-items-wrapper">
                        @include('pages.wishlist.partials.wishlist-items', ['packages' => $packages])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
