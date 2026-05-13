(function ($) {
    var searchTimers = {};

    function getSearchUrl($form) {
        return $form.data('airport-search-url') || '';
    }

    function getField($form, key) {
        return $form.find('[data-flight-field="' + key + '"]');
    }

    function renderAirportOptions($dropdown, airports) {
        var $list = $dropdown.find('.airport-options');
        $list.empty();

        if (!airports || !airports.length) {
            $list.append('<li class="border-bottom px-3 py-2 text-muted">No airport found</li>');
            return;
        }

        airports.forEach(function (airport) {
            var $item = $('<li class="border-bottom"></li>');
            var $link = $('<a class="dropdown-item airport-option" href="#"></a>');
            $link.append('<span class="fs-16 fw-medium text-dark dropdown-name"></span>');
            $link.find('.dropdown-name').text(airport.city + ' (' + airport.code + ')');
            $link.append($('<p></p>').text(airport.name));
            $link.data('airport', airport);
            $item.append($link);
            $list.append($item);
        });
    }

    function fetchAirports($form, $dropdown, keyword) {
        var role = $dropdown.data('airport-role');
        var timerKey = $form.attr('id') + '-' + role;

        clearTimeout(searchTimers[timerKey]);
        searchTimers[timerKey] = setTimeout(function () {
            $.get(getSearchUrl($form), { q: keyword })
                .done(function (response) {
                    renderAirportOptions($dropdown, response.data || []);
                })
                .fail(function () {
                    renderAirportOptions($dropdown, []);
                });
        }, 250);
    }

    function closeAirportDropdown($dropdown) {
        var toggle = $dropdown.find('[data-bs-toggle="dropdown"]').get(0);

        if (!toggle) {
            return;
        }

        if (window.bootstrap && window.bootstrap.Dropdown) {
            window.bootstrap.Dropdown.getOrCreateInstance(toggle).hide();
            return;
        }

        $(toggle).dropdown('hide');
    }

    function selectAirport($form, $dropdown, airport) {
        var role = $dropdown.data('airport-role');
        var codeField = role === 'origin' ? 'origin-code' : 'destination-code';
        var cityField = role === 'origin' ? 'origin-city' : 'destination-city';

        getField($form, codeField).val(airport.code);
        getField($form, cityField).val(airport.city);
        $dropdown.find('[data-airport-display="city"]').val(airport.city);
        $dropdown.find('[data-airport-display="name"]').text(airport.name);
        $dropdown.find('.airport-search-input').val('');
        closeAirportDropdown($dropdown);
    }

    function syncTravellerFields($form) {
        var $dropdown = $form.find('.form-item.dropdown').has('.apply-btn').first();
        var adults = Number($dropdown.find('.input-number[data-type="adult"]').val() || 1);
        var children = Number($dropdown.find('.input-number[data-type="children"]').val() || 0);
        var infants = Number($dropdown.find('.input-number[data-type="infant"]').val() || 0);

        getField($form, 'adults').val(adults);
        getField($form, 'children').val(children);
        getField($form, 'infants').val(infants);
    }

    function initFlightSearchForm($form) {
        if (!$form.length || $form.data('flight-search-initialized')) {
            return;
        }

        $form.data('flight-search-initialized', true);

        $form.find('[data-airport-role]').each(function () {
            fetchAirports($form, $(this), '');
        });

        $form.on('input', '.airport-search-input', function () {
            var $dropdown = $(this).closest('[data-airport-role]');
            fetchAirports($form, $dropdown, $(this).val() || '');
        });

        $form.on('click', '.airport-option', function (event) {
            event.preventDefault();
            event.stopPropagation();
            var $dropdown = $(this).closest('[data-airport-role]');
            selectAirport($form, $dropdown, $(this).data('airport'));
        });

        $form.on('click', '.apply-btn', function () {
            syncTravellerFields($form);
        });

        $form.on('submit', function () {
            syncTravellerFields($form);
        });
    }

    $(function () {
        $('.flight-search-form').each(function () {
            initFlightSearchForm($(this));
        });
    });
})(jQuery);
