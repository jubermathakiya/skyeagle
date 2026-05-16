@php
    use Illuminate\Support\Carbon;
@endphp

<div id="flight-results-wrapper">
    @if ($flights->count() > 0)
        <div class="row justify-content-center">
            @foreach ($flights as $flight)
                @php
                    $departureLabel = !empty($flight['departure_date'])
                        ? Carbon::parse($flight['departure_date'])->format('M d, Y')
                        : '-';
                    $returnLabel = !empty($flight['return_date'])
                        ? Carbon::parse($flight['return_date'])->format('M d, Y')
                        : null;
                    $dateLabel = $returnLabel
                        ? $departureLabel . ' - ' . $returnLabel
                        : $departureLabel;
                    $images = $flight['images'] ?? ['build/img/flight/flight-09.jpg'];
                    $detailsUrl = route('flight-details', array_filter([
                        'slug' => $flight['slug'] ?? null,
                        'origin' => $flight['origin_code'] ?? null,
                        'destination' => $flight['destination_code'] ?? null,
                        'departure_date' => $flight['departure_date'] ?? null,
                    ]));
                @endphp
                <div class="col-xxl-4 col-md-6 d-flex">
                    <div class="place-item mb-4 flex-fill">
                        <div class="place-img">
                            @if (count($images) > 1)
                                <div class="img-slider image-slide owl-carousel nav-center">
                                    @foreach ($images as $image)
                                        <div class="slide-images">
                                            <a href="{{ $detailsUrl }}">
                                                <img src="{{ URL::asset($image) }}" class="img-fluid" alt="img">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <a href="{{ $detailsUrl }}">
                                    <img src="{{ URL::asset($images[0]) }}" class="img-fluid" alt="img">
                                </a>
                            @endif
                            <div class="fav-item">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="fav-icon me-2">
                                        <i class="isax isax-heart5"></i>
                                    </a>
                                    @if (!empty($flight['badge']))
                                        <span class="badge bg-indigo">{{ $flight['badge'] }}</span>
                                    @endif
                                </div>
                                <span class="badge badge-warning badge-xs text-gray-9 fs-13 fw-medium rounded">{{ number_format((float) ($flight['rating'] ?? 0), 1) }}</span>
                            </div>
                        </div>
                        <div class="place-content">
                            <div class="flight-loc d-flex align-items-center justify-content-between mb-2">
                                <span class="loc-name d-inline-flex align-items-center"><i class="isax isax-airplane rotate-45 me-2"></i>{{ $flight['origin_city'] ?? '-' }}</span>
                                <a href="#" class="arrow-icon flex-shrink-0"><i class="isax isax-arrow-2"></i></a>
                                <span class="loc-name d-inline-flex align-items-center"><i class="isax isax-airplane rotate-135 me-2"></i>{{ $flight['destination_city'] ?? '-' }}</span>
                            </div>
                            <h5 class="text-truncate mb-1"><a href="{{ $detailsUrl }}">{{ $flight['flight_name'] ?? 'Flight' }}</a></h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="avatar avatar-sm me-2">
                                    <img src="{{ URL::asset($flight['airline_logo'] ?? 'build/img/icons/airindia.svg') }}" class="rounded-circle" alt="icon">
                                </span>
                                <p class="fs-14 mb-0 me-2">{{ $flight['airline_name'] ?? '-' }}</p>
                                <p class="fs-14 mb-0"><i class="ti ti-point-filled text-primary me-2"></i>{{ $flight['stops_label'] ?? 'Non-stop' }}</p>
                            </div>
                            <div class="date-info p-2 mb-3">
                                <p class="d-flex align-items-center"><i class="isax isax-calendar-2 me-2"></i>{{ $dateLabel }}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                <h6 class="text-primary"><span class="fs-14 fw-normal text-default">From </span>{{ config('constants.currency_symbol') }}{{ number_format((float) ($flight['price'] ?? 0), 0) }}</h6>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-outline-success fs-10 fw-medium me-2">{{ (int) ($flight['seats_left'] ?? 0) }} Seats Left</span>
                                    <a href="#" class="avatar avatar-sm">
                                        <img src="{{ URL::asset('build/img/users/user-08.jpg') }}" class="rounded-circle" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($flights->lastPage() > 1)
            <nav class="pagination-nav">
                <ul class="pagination justify-content-center">
                    @if ($flights->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $flights->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @foreach ($flights->getUrlRange(1, $flights->lastPage()) as $page => $url)
                        <li class="page-item {{ $page === $flights->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($flights->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $flights->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>
        @endif
    @else
        <div class="alert alert-warning mb-0">No flights found for your search. Try another route or date.</div>
    @endif
</div>
