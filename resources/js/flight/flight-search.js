import $ from 'jquery';

const pageJQuery = window.jQuery || $;

(function ($) {
    'use strict';

    var placeSliderOptions = {
        loop: false,
        margin: 24,
        nav: true,
        dots: false,
        smartSpeed: 2000,
        autoplay: false,
        navText: [
            "<i class='isax isax-arrow-left-2'></i>",
            "<i class='isax isax-arrow-right-3'></i>",
        ],
        responsive: {
            0: { items: 1 },
            550: { items: 1 },
            768: { items: 2 },
            992: { items: 3 },
            1200: { items: 3 },
            1400: { items: 4 },
        },
    };

    function parseCount(value, fallback) {
        var count = parseInt(value, 10);
        return isNaN(count) || count < 0 ? fallback : count;
    }

    function syncTravelerFields($form) {
        var adults = parseCount($form.find('[data-type="adult"]').first().val(), 1);
        var children = parseCount($form.find('[data-type="children"]').first().val(), 0);
        var infants = parseCount($form.find('[data-type="infant"]').first().val(), 0);
        var cabin = $form.find('[name="cabin_class"]:checked, [name="cabin-class"]:checked').first().val() || 'Economy';
        var total = adults + children + infants;

        $form.find('.js-flight-adults').val(Math.max(adults, 1));
        $form.find('.js-flight-children').val(children);
        $form.find('.js-flight-infants').val(infants);
        $form.find('.js-flight-cabin-class').val(cabin);
        $form.find('.member-count').html(total + ' <span class="fw-normal fs-14">' + (total === 1 ? 'Person' : 'Persons') + '</span>');
        $form.find('.adult').text(Math.max(adults, 1));
        $form.find('.class-name').text(cabin);
    }

    function formatAirportLabel(airport) {
        return airport.city + ' (' + airport.code + ')';
    }

    function getAirports($form) {
        var airports = $form.data('airports');

        return Array.isArray(airports) ? airports : [];
    }

    function setAirport($dropdown, airport) {
        setAirportDisplay($dropdown, airport);

        var toggle = $dropdown.children('[data-bs-toggle="dropdown"]')[0];
        if (toggle && typeof bootstrap !== 'undefined') {
            bootstrap.Dropdown.getOrCreateInstance(toggle).hide();
        }
    }

    function setAirportDisplay($dropdown, airport) {
        $dropdown.find('.js-flight-airport-input').val(airport.city);
        $dropdown.find('.js-flight-airport-name').text(airport.airport + ' (' + airport.code + ')');
    }

    function findAirportByValue(airports, value) {
        var normalizedValue = (value || '').toLowerCase().trim();

        if (!normalizedValue) {
            return null;
        }

        return airports.find(function (airport) {
            return [
                airport.code,
                airport.city,
                airport.airport,
            ].some(function (candidate) {
                return (candidate || '').toLowerCase() === normalizedValue;
            });
        }) || null;
    }

    function renderAirportOptions($dropdown, airports, query) {
        var normalizedQuery = (query || '').toLowerCase().trim();
        var filteredAirports = airports.filter(function (airport) {
            var haystack = [
                airport.code,
                airport.city,
                airport.airport,
                (airport.aliases || []).join(' '),
            ].join(' ').toLowerCase();

            return !normalizedQuery || haystack.indexOf(normalizedQuery) !== -1;
        });
        var $list = $dropdown.find('.dropdown-menu ul').first();

        $list.empty();

        filteredAirports.slice(0, 12).forEach(function (airport) {
            var $item = $(
                '<li class="border-bottom">' +
                    '<a class="dropdown-item js-flight-airport-option" href="#">' +
                        '<span class="fs-16 fw-medium text-dark dropdown-name"></span>' +
                        '<p></p>' +
                    '</a>' +
                '</li>'
            );

            $item.find('.dropdown-name').text(formatAirportLabel(airport));
            $item.find('p').text(airport.airport);
            $item.find('.js-flight-airport-option').on('click', function (e) {
                e.preventDefault();
                setAirport($dropdown, airport);
            });
            $list.append($item);
        });

        if (!filteredAirports.length) {
            $list.append('<li class="p-3 fs-14 text-muted">No airports found. Try an airport code like DEL or NYC.</li>');
        }
    }

    function initAirportDropdowns($form) {
        var airports = getAirports($form);

        if (!airports.length) {
            return;
        }

        $form.find('.js-flight-airport-dropdown').each(function () {
            var $dropdown = $(this);
            var $search = $dropdown.find('.input-search input').first();
            var currentAirport = findAirportByValue(airports, $dropdown.find('.js-flight-airport-input').val());

            if (currentAirport) {
                setAirportDisplay($dropdown, currentAirport);
            }

            renderAirportOptions($dropdown, airports, '');

            $search.off('input.flightAirports').on('input.flightAirports', function () {
                renderAirportOptions($dropdown, airports, $(this).val());
            });
        });
    }

    function parseDate(value, fallback) {
        if (typeof moment === 'undefined') {
            return fallback;
        }

        var parsed = moment((value || '').trim(), ['DD-MM-YYYY', 'D-M-YYYY', 'YYYY-MM-DD'], true);
        return parsed.isValid() ? parsed : fallback;
    }

    function syncDateLabels($form) {
        if (typeof moment === 'undefined') {
            return;
        }

        var departure = parseDate($form.find('[name="departure_at"]').val(), moment());
        var returning = parseDate($form.find('[name="return_at"]').val(), departure.clone().add(2, 'days'));

        $form.find('.js-flight-departure-day').text(departure.format('dddd'));
        $form.find('.js-flight-return-day').text(returning.format('dddd'));
    }

    function initFlightDates($form) {
        if (typeof moment === 'undefined' || !$.fn.daterangepicker) {
            syncDateLabels($form);
            return;
        }

        var $departure = $form.find('.js-flight-departure');
        var $return = $form.find('.js-flight-return');

        if (!$departure.length) {
            return;
        }

        if ($departure.data('daterangepicker')) {
            $departure.data('daterangepicker').remove();
        }

        var today = moment().startOf('day');
        var start = parseDate($departure.val(), today.clone().add(1, 'month'));
        var end = parseDate($return.val(), start.clone().add(2, 'days'));
        var isRoundTrip = ($form.find('[name="trip_type"]:checked').val() || 'oneway') === 'roundtrip';

        if (end.isBefore(start)) {
            end = start.clone().add(2, 'days');
        }

        $departure.daterangepicker(
            {
                autoApply: true,
                autoUpdateInput: false,
                minDate: today,
                startDate: start,
                endDate: end,
                singleDatePicker: !isRoundTrip,
                opens: 'center',
                locale: { format: 'DD-MM-YYYY' },
            },
            function (selectedStart, selectedEnd) {
                $departure.val(selectedStart.format('DD-MM-YYYY'));
                if (isRoundTrip && $return.length) {
                    $return.val(selectedEnd.format('DD-MM-YYYY'));
                }
                syncDateLabels($form);
            }
        );

        if ($return.length) {
            $return.off('click.flightDates').on('click.flightDates', function () {
                $departure.data('daterangepicker').show();
            });
        }

        syncDateLabels($form);
    }

    function syncTripType($form) {
        var tripType = $form.find('[name="trip_type"]:checked').val() || $form.find('[name="trip_type"]').val() || 'oneway';
        var $return = $form.find('[name="return_at"]');
        var $returnItem = $return.closest('.round-drip');

        if (tripType === 'roundtrip') {
            $return.prop('disabled', false);
            $returnItem.removeClass('d-none');
        } else {
            $return.prop('disabled', true);
            $returnItem.addClass('d-none');
        }
    }

    function initFlightForm($form) {
        initAirportDropdowns($form);
        initFlightDates($form);
        syncTravelerFields($form);
        syncTripType($form);

        $form.on('click.flightTravelers', '.quantity-right-plus, .quantity-left-minus', function () {
            setTimeout(function () {
                syncTravelerFields($form);
            }, 0);
        });

        $form.on('change.flightSearch', '[name="trip_type"], [name="cabin_class"], [name="cabin-class"], [data-type]', function () {
            syncTravelerFields($form);
            syncTripType($form);
            initFlightDates($form);
        });

        $form.on('submit.flightSearch', function (e) {
            syncTravelerFields($form);
            syncTripType($form);

            var origin = ($form.find('[name="origin"]').val() || '').trim();
            var destination = ($form.find('[name="destination"]').val() || '').trim();

            if (!origin || !destination) {
                e.preventDefault();
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage('Please select From and To airports.', 'error');
                }
                return false;
            }
        });
    }

    function initFlightTrendingSliders($wrapper) {
        $wrapper.find('.place-slider').each(function () {
            var $slider = $(this);
            if (!$slider.hasClass('owl-loaded')) {
                $slider.owlCarousel(placeSliderOptions);
            }
        });
    }

    function loadTrendingFlights() {
        var $wrapper = $('#trending-flights-wrapper');

        if (!$wrapper.length || $wrapper.data('loaded') === '1') {
            return;
        }

        $.ajax({
            url: $wrapper.data('url'),
            type: 'GET',
            dataType: 'json',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                if (!response || typeof response.html === 'undefined') {
                    return;
                }

                $wrapper.html(response.html);
                $wrapper.data('loaded', '1');
                initFlightTrendingSliders($wrapper);
            },
        });
    }

    $(function () {
        $('.js-flight-search-form').each(function () {
            initFlightForm($(this));
        });

        $(document).on('shown.bs.tab', 'a[data-bs-target="#flight-list"]', function () {
            loadTrendingFlights();
        });

        if ($('#flight-list').hasClass('active')) {
            loadTrendingFlights();
        }
    });
})(pageJQuery);
