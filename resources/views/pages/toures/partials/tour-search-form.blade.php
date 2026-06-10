@php
    $formId = $formId ?? 'home-tour-search-form';
    $searchMode = $searchMode ?? 'redirect';
    $showTitle = $showTitle ?? true;
    $selectedDestination = $selectedDestination ?? request('destination_city', '');

    $normalizeTourDate = static function ($value) {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        foreach (['d-m-Y', 'j-n-Y', 'Y-m-d', 'd/m/Y'] as $format) {
            try {
                return \Carbon\Carbon::createFromFormat($format, $value)->format('d-m-Y');
            } catch (\Exception $e) {
            }
        }

        try {
            return \Carbon\Carbon::parse($value)->format('d-m-Y');
        } catch (\Exception $e) {
            return $value;
        }
    };

    $checkInRaw = $checkIn ?? request('check_in', '');
    $checkOutRaw = $checkOut ?? request('check_out', '');
    $checkIn = $normalizeTourDate($checkInRaw) ?: \Carbon\Carbon::today()->format('d-m-Y');
    $checkOut = $normalizeTourDate($checkOutRaw) ?: \Carbon\Carbon::tomorrow()->format('d-m-Y');
    $adults = max(0, (int) ($adults ?? request('adults', 1)));
    $children = max(0, (int) ($children ?? request('children', 0)));
    $infants = max(0, (int) ($infants ?? request('infants', 0)));
    $isTrending = !empty($isTrending ?? request()->boolean('is_trending'));
    $destinationInputId = $destinationInputId ?? $formId . '-destination';
    $totalTravelers = $adults + $children + $infants;
    $travelerParts = collect([
        $adults > 0 ? $adults . ' ' . ($adults === 1 ? 'adult' : 'adults') : null,
        $children > 0 ? $children . ' ' . ($children === 1 ? 'child' : 'children') : null,
        $infants > 0 ? $infants . ' ' . ($infants === 1 ? 'infant' : 'infants') : null,
    ])->filter()->implode(', ');
    $travelerSummary = $travelerParts ?: '1 adult';
    $personLabel = $totalTravelers === 1 ? 'Person' : 'Persons';
    $displayTotal = $totalTravelers > 0 ? $totalTravelers : 1;
@endphp
<form action="{{ route('tour-list') }}" method="GET" id="{{ $formId }}"
    class="js-tour-search-form" data-search-mode="{{ $searchMode }}">
    @if($isTrending)
        <input type="hidden" name="is_trending" value="1">
    @endif
    @if($showTitle)
        <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
            <div class="fw-medium fs-16 mb-2 text-dark">Search Tours & Attractions</div>
        </div>
    @endif
    <div class="d-lg-flex">
        <div class="d-flex form-info">
            <div class="form-item js-destination-field">
                <label class="form-label fs-14 text-default mb-1">Destination</label>
                <input type="text" class="form-control value-input js-city-suggest-input" name="destination_city"
                    id="{{ $destinationInputId }}" value="{{ $selectedDestination }}"
                    placeholder="Search destination city" autocomplete="off"
                    data-city-url="{{ route('cities.autocomplete') }}"
                    data-sync-to="#{{ $destinationInputId }}">
            </div>
            <div class="form-item">
                <label class="form-label fs-14 text-default mb-1">Dates</label>
                <input type="text" class="form-control check-in" name="check_in"
                    value="{{ $checkIn }}" data-initial-date="{{ $checkIn }}">
            </div>
            <div class="form-item">
                <label class="form-label fs-14 text-default mb-1">Check Out</label>
                <input type="text" class="form-control check-out" name="check_out"
                    value="{{ $checkOut }}" data-initial-date="{{ $checkOut }}">
            </div>
            <div class="form-item dropdown js-tour-traveler-dropdown">
                <div data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="menu">
                    <label class="form-label fs-14 text-default mb-1">Travellers</label>
                    <div class="home-eight-title text-dark member-count">{{ $displayTotal }} <span
                            class="fw-normal fs-14">{{ $personLabel }}</span></div>
                    <p class="fs-12 mb-0 traveler-summary">{{ $travelerSummary }}</p>
                </div>
                <div class="dropdown-menu dropdown-menu-end dropdown-xl">
                    <input type="hidden" name="adults" value="{{ $adults }}" class="js-applied-adults">
                    <input type="hidden" name="children" value="{{ $children }}" class="js-applied-children">
                    <input type="hidden" name="infants" value="{{ $infants }}" class="js-applied-infants">
                    <div class="mb-3 home-eight-title text-dark">Select Travelers</div>
                    <div class="mb-3 border br-10 info-item pb-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 d-flex align-items-center justify-content-between">
                                    <label class="form-label text-gray-9 mb-2">Adult</label>
                                    <div class="custom-increment">
                                        <div class="input-group">
                                            <span class="input-group-btn float-start">
                                                <button type="button"
                                                    class="quantity-left-minus btn btn-light btn-number"
                                                    data-type="minus" data-field="">
                                                    <span><i class="isax isax-minus"></i></span>
                                                </button>
                                            </span>
                                            <input type="text" class="input-number js-draft-adults"
                                                value="{{ $adults }}" data-type="adult" readonly
                                                inputmode="numeric" autocomplete="off" tabindex="-1">
                                            <span class="input-group-btn float-end">
                                                <button type="button"
                                                    class="quantity-right-plus btn btn-light btn-number"
                                                    data-type="plus" data-field="">
                                                    <span><i class="isax isax-add"></i></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex align-items-center justify-content-between">
                                    <label class="form-label text-gray-9 mb-2">Childrens
                                        <span class="text-default fw-normal">( 12+ Yrs )</span></label>
                                    <div class="custom-increment">
                                        <div class="input-group">
                                            <span class="input-group-btn float-start">
                                                <button type="button"
                                                    class="quantity-left-minus btn btn-light btn-number"
                                                    data-type="minus" data-field="">
                                                    <span><i class="isax isax-minus"></i></span>
                                                </button>
                                            </span>
                                            <input type="text" class="input-number js-draft-children"
                                                value="{{ $children }}" data-type="children" readonly
                                                inputmode="numeric" autocomplete="off" tabindex="-1">
                                            <span class="input-group-btn float-end">
                                                <button type="button"
                                                    class="quantity-right-plus btn btn-light btn-number"
                                                    data-type="plus" data-field="">
                                                    <span><i class="isax isax-add"></i></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex align-items-center justify-content-between">
                                    <label class="form-label text-gray-9 mb-2">Infants
                                        <span class="text-default fw-normal">( 12+ Yrs )</span></label>
                                    <div class="custom-increment">
                                        <div class="input-group">
                                            <span class="input-group-btn float-start">
                                                <button type="button"
                                                    class="quantity-left-minus btn btn-light btn-number"
                                                    data-type="minus" data-field="">
                                                    <span><i class="isax isax-minus"></i></span>
                                                </button>
                                            </span>
                                            <input type="text" class="input-number js-draft-infants"
                                                value="{{ $infants }}" data-type="infant" readonly
                                                inputmode="numeric" autocomplete="off" tabindex="-1">
                                            <span class="input-group-btn float-end">
                                                <button type="button"
                                                    class="quantity-right-plus btn btn-light btn-number"
                                                    data-type="plus" data-field="">
                                                    <span><i class="isax isax-add"></i></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end tour-traveler-actions">
                        <button type="button" class="btn btn-light btn-sm me-2 js-traveler-clear">Reset</button>
                        <button type="button" class="btn btn-primary btn-sm js-traveler-apply">Apply</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary search-btn rounded">Search</button>
    </div>
</form>
