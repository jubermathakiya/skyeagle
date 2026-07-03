<?php $page = "destination-details"; ?>
@php
    $displayName = $destination->city ?: $destination->name;
@endphp
@extends('layout.mainlayout')

@section('content')
    <div class="breadcrumb-bar breadcrumb-bg-04 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">{{ $displayName }} Tours</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('destinations.index') }}">Destinations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $displayName }} Tours</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row" id="destination-packages">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                        <h5 class="mb-2">Tours in this destination</h5>
                        <a href="{{ route('tour-list', ['destination_city' => $displayName]) }}"
                            class="btn btn-dark d-inline-flex align-items-center mb-2">
                            View All Tours<i class="isax isax-arrow-right-3 ms-2"></i>
                        </a>
                    </div>
                    @include('pages.toures.partials.tour-results', [
                        'packages' => $packages,
                        'wishlistPackageIds' => $wishlistPackageIds,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/package/index.js'])
@endsection
