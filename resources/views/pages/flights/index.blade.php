<?php $page = 'flight-grid'; ?>
@extends('layout.mainlayout')
@section('content')

    <div class="breadcrumb-bar breadcrumb-bg-05 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Flight</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item">Flight</li>
                            <li class="breadcrumb-item active" aria-current="page">Flight Grid</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="banner-form">
                        @include('pages.flights.partials.flight-search-form', [
                            'formContext' => 'grid',
                            'criteria' => $criteria,
                            'originAirport' => $originAirport,
                            'destinationAirport' => $destinationAirport,
                        ])
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <h6 class="mb-3" id="flight-results-count">{{ $flights->total() }} Flights Found on Your Search</h6>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="list-item d-flex align-items-center mb-3">
                                <a href="{{ route('flight-grid', request()->query()) }}" class="list-icon active me-2"><i class="isax isax-grid-1"></i></a>
                                <a href="{{ url('flight-list') }}" class="list-icon me-2"><i class="isax isax-firstline"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-info br-10 p-3 pb-2 mb-4">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <p class="fs-14 fw-medium mb-2 d-inline-flex align-items-center"><i class="isax isax-info-circle me-2"></i>Save an average of 15% on thousands of flights when you're signed in</p>
                            <a href="{{ url('login') }}" class="btn btn-white btn-sm mb-2">Sign In</a>
                        </div>
                    </div>

                    @include('pages.flights.partials.flight-results', compact('flights'))
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @vite(['resources/js/flight/search-form.js', 'resources/js/flight/index.js'])
@endsection
