@php
    $wrap = $wrap ?? true;
    $criteria = $criteria ?? [];
    $detailUrl = route('flight-details', array_merge(['flight' => $flight['id']], $criteria));
    $imageUrl = str_starts_with($flight['image'], 'http') ? $flight['image'] : URL::asset($flight['image']);
    $fallbackImageUrl = URL::asset('build/img/flight/flight-01.jpg');
    $dateText = \Carbon\Carbon::parse($flight['departure_at'])->format('M d, Y');
    if (!empty($flight['return_at'])) {
        $dateText .= ' - ' . \Carbon\Carbon::parse($flight['return_at'])->format('M d, Y');
    }
@endphp

@if($wrap)
    <div class="col-xxl-4 col-md-6 d-flex">
@endif
    <div class="place-item mb-4 flex-fill">
        <div class="place-img">
            <a href="{{ $detailUrl }}">
                <img src="{{ $imageUrl }}" class="img-fluid flight-card-img" alt="Flight" onerror="this.onerror=null;this.src='{{ $fallbackImageUrl }}';">
            </a>
            <div class="fav-item">
                <div class="d-flex align-items-center">
                    <a href="#" class="fav-icon me-2">
                        <i class="isax isax-heart5"></i>
                    </a>
                    <span class="badge bg-indigo">Cheapest</span>
                </div>
                <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">{{ $flight['rating'] }}</span>
            </div>
        </div>
        <div class="place-content">
            <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                <span class="loc-name d-inline-flex align-items-center">
                    <i class="isax isax-airplane rotate-45 me-2"></i>{{ $flight['origin_name'] }}
                </span>
                <a href="{{ $detailUrl }}" class="arrow-icon flex-shrink-0">
                    <i class="isax isax-arrow-2"></i>
                </a>
                <span class="loc-name d-inline-flex align-items-center">
                    <i class="isax isax-airplane rotate-135 me-2"></i>{{ $flight['destination_name'] }}
                </span>
            </div>
            <h5 class="text-truncate mb-1">
                <a href="{{ $detailUrl }}">{{ $flight['title'] }}</a>
            </h5>
            <div class="d-flex align-items-center mb-2">
                <span class="avatar avatar-sm me-2">
                    <img src="{{ URL::asset('build/img/icons/airindia.svg') }}" class="rounded-circle" alt="Airline">
                </span>
                <p class="fs-14 mb-0 me-2">{{ $flight['airline'] }}</p>
                <p class="fs-14 mb-0">
                    <i class="ti ti-point-filled text-primary me-2"></i>{{ $flight['stop_text'] }}
                </p>
            </div>
            <div class="date-info p-2 mb-3">
                <p class="d-flex align-items-center">
                    <i class="isax isax-calendar-2 me-2"></i>{{ $dateText }}
                </p>
            </div>
            <div class="d-flex align-items-center justify-content-between border-top pt-3">
                <h6 class="text-primary">
                    <span class="fs-14 fw-normal text-default">From </span>{{ strtoupper($flight['currency']) }} {{ number_format($flight['price']) }}
                </h6>
                <div class="d-flex align-items-center">
                    <span class="badge bg-outline-success fs-10 fw-medium me-2">{{ $flight['seats_left'] }} Seats Left</span>
                    <a href="{{ $detailUrl }}" class="avatar avatar-sm">
                        <img src="{{ URL::asset('build/img/users/user-08.jpg') }}" class="rounded-circle" alt="Agent">
                    </a>
                </div>
            </div>
        </div>
    </div>
@if($wrap)
    </div>
@endif
