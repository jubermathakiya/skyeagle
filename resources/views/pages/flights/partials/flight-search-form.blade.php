@php
    use Illuminate\Support\Carbon;

    $criteria = $criteria ?? [];
    $originAirport = $originAirport ?? null;
    $destinationAirport = $destinationAirport ?? null;
    $tripType = $criteria['trip_type'] ?? config('flights.search.default_trip_type', 'oneway');
    $originCode = $criteria['origin'] ?? optional($originAirport)->iata_code ?? 'DEL';
    $destinationCode = $criteria['destination'] ?? optional($destinationAirport)->iata_code ?? 'BOM';
    $originCity = $criteria['origin_city'] ?? optional($originAirport)->city ?? 'New Delhi';
    $destinationCity = $criteria['destination_city'] ?? optional($destinationAirport)->city ?? 'Mumbai';
    $originAirportName = optional($originAirport)->name ?? 'Indira Gandhi International Airport';
    $destinationAirportName = optional($destinationAirport)->name ?? 'Chhatrapati Shivaji Maharaj International Airport';
    $departureDate = !empty($criteria['departure_date'])
        ? Carbon::parse($criteria['departure_date'])->format('d-m-Y')
        : now()->addDays(3)->format('d-m-Y');
    $returnDate = !empty($criteria['return_date'])
        ? Carbon::parse($criteria['return_date'])->format('d-m-Y')
        : now()->addDays(6)->format('d-m-Y');
    $adults = (int) ($criteria['adults'] ?? 1);
    $children = (int) ($criteria['children'] ?? 0);
    $infants = (int) ($criteria['infants'] ?? 0);
    $cabinClass = $criteria['cabin_class'] ?? config('flights.search.default_cabin_class', 'Economy');
    $passengerTotal = max(1, $adults + $children + $infants);
    $formContext = $formContext ?? 'grid';
    $formId = $formContext === 'home' ? 'home-flight-search-form' : 'flight-search-form';
@endphp

<form
    id="{{ $formId }}"
    class="flight-search-form"
    method="GET"
    action="{{ route('flight-grid') }}"
    data-airport-search-url="{{ route('flights.airports.search') }}"
>
    <input type="hidden" name="origin" value="{{ $originCode }}" data-flight-field="origin-code">
    <input type="hidden" name="destination" value="{{ $destinationCode }}" data-flight-field="destination-code">
    <input type="hidden" name="origin_city" value="{{ $originCity }}" data-flight-field="origin-city">
    <input type="hidden" name="destination_city" value="{{ $destinationCity }}" data-flight-field="destination-city">
    <input type="hidden" name="adults" value="{{ $adults }}" data-flight-field="adults">
    <input type="hidden" name="children" value="{{ $children }}" data-flight-field="children">
    <input type="hidden" name="infants" value="{{ $infants }}" data-flight-field="infants">

    <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
        <div class="d-flex align-items-center">
            <div class="form-check d-flex align-items-center me-3 mb-2">
                <input class="form-check-input mt-0" type="radio" name="trip_type" id="{{ $formId }}-oneway" value="oneway" @checked($tripType === 'oneway')>
                <label class="form-check-label fs-14 ms-2" for="{{ $formId }}-oneway">Oneway</label>
            </div>
            <div class="form-check d-flex align-items-center me-3 mb-2">
                <input class="form-check-input mt-0" type="radio" name="trip_type" id="{{ $formId }}-roundtrip" value="roundtrip" @checked($tripType === 'roundtrip')>
                <label class="form-check-label fs-14 ms-2" for="{{ $formId }}-roundtrip">Round Trip</label>
            </div>
            <div class="form-check d-flex align-items-center me-3 mb-2">
                <input class="form-check-input mt-0" type="radio" name="trip_type" id="{{ $formId }}-multiway" value="multiway" @checked($tripType === 'multiway')>
                <label class="form-check-label fs-14 ms-2" for="{{ $formId }}-multiway">Multi Trip</label>
            </div>
        </div>
        @if ($formContext === 'home')
            <span class="fw-medium fs-16 mb-2 text-dark">Millions of cheap flights. One simple search</span>
        @else
            <h6 class="fw-medium fs-16 mb-2">Millions of cheap flights. One simple search</h6>
        @endif
    </div>

    <div class="normal-trip">
        <div class="d-lg-flex">
            <div class="d-flex form-info">
                <div class="form-item change-drop booking-dropdown dropdown" data-airport-role="origin">
                    <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                        <label class="form-label fs-14 text-default mb-1">From</label>
                        <input type="text" class="form-control value-input" value="{{ $originCity }}" data-airport-display="city" readonly>
                        <p class="fs-12 mb-0" data-airport-display="name">{{ $originAirportName }}</p>
                    </div>
                    <div class="dropdown-menu dropdown-md p-0">
                        <div class="input-search p-3 border-bottom">
                            <div class="input-group">
                                <input type="text" class="form-control airport-search-input" placeholder="Search city or airport">
                                <span class="input-group-text px-2 border-start-0"><i class="isax isax-search-normal"></i></span>
                            </div>
                        </div>
                        <ul class="airport-options mb-0 list-unstyled"></ul>
                    </div>
                </div>

                <div class="form-item change-drop booking-dropdown dropdown ps-2 ps-sm-3" data-airport-role="destination">
                    <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                        <label class="form-label fs-14 text-default mb-1">To</label>
                        <input type="text" class="form-control value-input" value="{{ $destinationCity }}" data-airport-display="city" readonly>
                        <p class="fs-12 mb-0" data-airport-display="name">{{ $destinationAirportName }}</p>
                        <span class="way-icon badge badge-primary rounded-pill translate-middle">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-md p-0">
                        <div class="input-search p-3 border-bottom">
                            <div class="input-group">
                                <input type="text" class="form-control airport-search-input" placeholder="Search city or airport">
                                <span class="input-group-text px-2 border-start-0"><i class="isax isax-search-normal"></i></span>
                            </div>
                        </div>
                        <ul class="airport-options mb-0 list-unstyled"></ul>
                    </div>
                </div>

                <div class="form-item">
                    <label class="form-label fs-14 text-default mb-1">Departure</label>
                    <input type="text" class="form-control datetimepicker" name="departure_date" value="{{ $departureDate }}" autocomplete="off">
                    <p class="fs-12 mb-0 flight-date-label" data-date-for="departure"></p>
                </div>

                <div class="form-item round-drip">
                    <label class="form-label fs-14 text-default mb-1">Return</label>
                    <input type="text" class="form-control datetimepicker" name="return_date" value="{{ $returnDate }}" autocomplete="off">
                    <p class="fs-12 mb-0 flight-date-label" data-date-for="return"></p>
                </div>

                <div class="form-item dropdown">
                    <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                        <label class="form-label fs-14 text-default mb-1">Travellers and cabin class</label>
                        <div class="home-eight-title text-dark member-count">{{ $passengerTotal }} <span class="fw-normal fs-14">Persons</span></div>
                        <p class="fs-12 mb-0">
                            <span class="adult">{{ $adults }}</span> Adult,
                            <span class="children">{{ $children }}</span> Child,
                            <span class="infant">{{ $infants }}</span> Infant,
                            <span class="class-name">{{ $cabinClass }}</span>
                        </p>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end dropdown-xl">
                        <div class="mb-3 home-eight-title text-dark">Select Travelers & Class</div>
                        <div class="mb-3 border br-10 info-item pb-1">
                            <div class="fs-16 fw-medium mb-2 text-dark">Travellers</div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label text-gray-9 mb-2">Adults <span class="text-default fw-normal">( 12+ Yrs )</span></label>
                                        <div class="custom-increment">
                                            <div class="input-group">
                                                <span class="input-group-btn float-start">
                                                    <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-field=""><span><i class="isax isax-minus"></i></span></button>
                                                </span>
                                                <input type="text" class="input-number" value="{{ $adults }}" data-type="adult" readonly>
                                                <span class="input-group-btn float-end">
                                                    <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field=""><span><i class="isax isax-add"></i></span></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label text-gray-9 mb-2">Childrens <span class="text-default fw-normal">( 2-12 Yrs )</span></label>
                                        <div class="custom-increment">
                                            <div class="input-group">
                                                <span class="input-group-btn float-start">
                                                    <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-field=""><span><i class="isax isax-minus"></i></span></button>
                                                </span>
                                                <input type="text" class="input-number" value="{{ $children }}" data-type="children" readonly>
                                                <span class="input-group-btn float-end">
                                                    <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field=""><span><i class="isax isax-add"></i></span></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label text-gray-9 mb-2">Infants <span class="text-default fw-normal">( 0-2 Yrs )</span></label>
                                        <div class="custom-increment">
                                            <div class="input-group">
                                                <span class="input-group-btn float-start">
                                                    <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-field=""><span><i class="isax isax-minus"></i></span></button>
                                                </span>
                                                <input type="text" class="input-number" value="{{ $infants }}" data-type="infant" readonly>
                                                <span class="input-group-btn float-end">
                                                    <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field=""><span><i class="isax isax-add"></i></span></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 border br-10 info-item pb-1">
                            <span class="fs-16 fw-medium mb-2 text-dark d-block">Cabin Class</span>
                            <div class="d-flex align-items-center flex-wrap">
                                @foreach (['Economy', 'Premium Economy', 'Business', 'First Class'] as $cabinOption)
                                    <div class="form-check me-3 mb-3">
                                        <input class="form-check-input" type="radio" value="{{ $cabinOption }}" name="cabin_class" id="{{ $formId }}-cabin-{{ $loop->index }}" @checked($cabinClass === $cabinOption)>
                                        <label class="form-check-label" for="{{ $formId }}-cabin-{{ $loop->index }}">{{ $cabinOption }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-light btn-sm me-2">Cancel</a>
                            <button type="button" class="btn btn-primary btn-sm apply-btn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary search-btn rounded">Search</button>
        </div>
    </div>
</form>
