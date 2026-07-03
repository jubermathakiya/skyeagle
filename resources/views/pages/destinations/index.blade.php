<?php $page = "destinations"; ?>
@extends('layout.mainlayout')

@section('content')
    <div class="breadcrumb-bar breadcrumb-bg-01 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Destinations</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home5"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Destinations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row g-4 destination-page-grid">
                @forelse($destinations as $destination)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        @include('pages.destinations.partials.destination-card', [
                            'destination' => $destination,
                        ])
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <h6 class="mb-2">No destinations found</h6>
                                <p class="fs-14 mb-0">Please check again later for destination guides.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($destinations->hasPages())
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-wrap mt-4">
                            {{ $destinations->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
