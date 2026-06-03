import { initCityAutocomplete } from '../common/city-autocomplete.js';

/**
 * Shared destination search UI (home + tour-list banner).
 */
export function initTourDestinationSearch(options = {}) {
    const {
        formSelector,
        searchInputSelector = '.tour-destination-search-input',
        displayInputSelector = '#tour-destination-display',
        subtitleSelector = '#tour-destination-subtitle',
        hiddenInputSelector = '#tour-destination-city',
        citySearchUrl = null,
        onSearch = null,
    } = options;

    const $form = $(formSelector);
    if (!$form.length) {
        return null;
    }

    const url = citySearchUrl || $form.data('city-search-url') || window.packageCitySearchUrl;
    if (url) {
        window.packageCitySearchUrl = url;
    }

    const $searchInput = $form.find(searchInputSelector);
    const $displayInput = $(displayInputSelector);
    const $subtitle = $(subtitleSelector);
    const $cityHidden = $(hiddenInputSelector);
    const $dropdown = $form.find('.booking-dropdown').first();

    if ($searchInput.length && url) {
        initCityAutocomplete({
            searchUrl: url,
            selector: searchInputSelector,
        });
    }

    function getDestination() {
        return (
            $cityHidden.val() ||
            $searchInput.val() ||
            $displayInput.val() ||
            ''
        ).trim();
    }

    function syncDestination(value) {
        const city = (value || '').trim();
        $cityHidden.val(city);
        if (city) {
            $displayInput.val(city);
            $subtitle.text(city);
        }
    }

    $searchInput.on('change input', function () {
        syncDestination($(this).val());
    });

    $displayInput.on('click focus', function () {
        const toggle = $dropdown.find('[data-bs-toggle="dropdown"]')[0];
        if (toggle && typeof bootstrap !== 'undefined') {
            bootstrap.Dropdown.getOrCreateInstance(toggle).show();
        }
        setTimeout(function () {
            $searchInput.trigger('focus');
        }, 100);
    });

    $dropdown.on('show.bs.dropdown', function () {
        setTimeout(function () {
            $searchInput.trigger('focus');
        }, 50);
    });

    $form.on('submit', function (e) {
        e.preventDefault();

        const city = getDestination();
        if (!city) {
            if (typeof window.showToastmessage === 'function') {
                window.showToastmessage('Please enter a destination to search.', 'error');
            } else {
                alert('Please enter a destination to search.');
            }
            return;
        }

        syncDestination(city);

        if (typeof onSearch === 'function') {
            onSearch(city);
            return;
        }

        const params = new URLSearchParams();
        params.set('destination_city', city);
        window.location.href = $form.attr('action') + '?' + params.toString();
    });

    return {
        getDestination,
        syncDestination,
    };
}
