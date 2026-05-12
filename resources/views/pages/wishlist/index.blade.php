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
                <div class="col-xl-3 col-lg-4 theiaStickySidebar">
                    <div class="card user-sidebar mb-4 mb-lg-0">
                        <div class="card-header user-sidebar-header">
                            <div class="profile-content rounded-pill">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="{{ URL::asset('build/img/users/user-lg-26.jpg') }}" alt="image" class="img-fluid avatar avatar-lg rounded-circle flex-shrink-0 me-1">
                                        <div>
                                            <h6 class="fs-16">{{ $user->name }}</h6>
                                            <span class="fs-14 text-gray-6">Since {{ $user->created_at?->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ url('profile-settings') }}" class="p-1 rounded-circle btn btn-light d-flex align-items-center justify-content-center">
                                            <i class="isax isax-edit-2 fs-14"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body user-sidebar-body">
                            <ul>
                                <li><span class="fs-14 text-gray-3 fw-medium mb-2">Main</span></li>
                                <li><a href="{{ route('dashboard') }}" class="d-flex align-items-center"><i class="isax isax-grid-55"></i> Dashboard</a></li>
                                <li class="mb-2"><a href="{{ route('wishlist') }}" class="d-flex align-items-center active"><i class="isax isax-heart5"></i> Wishlist</a></li>
                                <li><a href="{{ route('auth.logout') }}" class="d-flex align-items-center pb-0" onclick="event.preventDefault(); document.getElementById('wishlist-logout-form').submit();"><i class="isax isax-logout-15"></i> Logout</a></li>
                            </ul>
                            <form id="wishlist-logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">@csrf</form>
                        </div>
                    </div>
                </div>

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
