import $ from 'jquery';

const pageJQuery = window.jQuery || $;

(function ($) {
    'use strict';

    var DEFAULTS = {
        adults: 1,
        children: 0,
        infants: 0,
    };

    function parseCount(value) {
        var count = parseInt(value, 10);
        return isNaN(count) || count < 0 ? 0 : count;
    }

    function formatLabel(count, singular, plural) {
        return count + ' ' + (count === 1 ? singular : plural);
    }

    function getDraftCounts($dropdown) {
        return {
            adults: parseCount($dropdown.find('.js-draft-adults').val()),
            children: parseCount($dropdown.find('.js-draft-children').val()),
            infants: parseCount($dropdown.find('.js-draft-infants').val()),
        };
    }

    function getAppliedCounts($dropdown) {
        return {
            adults: parseCount($dropdown.find('.js-applied-adults').val()),
            children: parseCount($dropdown.find('.js-applied-children').val()),
            infants: parseCount($dropdown.find('.js-applied-infants').val()),
        };
    }

    function normalizeCountInput($input, min) {
        var count = parseCount($input.val());
        if (count < min) {
            count = min;
        }
        $input.val(count);
        return count;
    }

    function setDraftCounts($dropdown, counts) {
        $dropdown.find('.js-draft-adults').val(Math.max(counts.adults, 0));
        $dropdown.find('.js-draft-children').val(Math.max(counts.children, 0));
        $dropdown.find('.js-draft-infants').val(Math.max(counts.infants, 0));
    }

    function bindTravelerCounters($dropdown) {
        $dropdown
            .find('.quantity-right-plus, .quantity-left-minus')
            .off('click.tourTravelers')
            .on('click.tourTravelers', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                var $input = $(this).closest('.input-group').find('.input-number').first();
                if (!$input.length) {
                    return;
                }

                var min = 0;
                var count = normalizeCountInput($input, min);

                if ($(this).hasClass('quantity-right-plus')) {
                    $input.val(count + 1);
                } else if (count > min) {
                    $input.val(count - 1);
                }
            });

        $dropdown
            .find('.input-number')
            .off('keydown.tourTravelers paste.tourTravelers drop.tourTravelers')
            .on('keydown.tourTravelers paste.tourTravelers drop.tourTravelers', function (e) {
                e.preventDefault();
            });
    }

    function setAppliedCounts($dropdown, counts) {
        $dropdown.find('.js-applied-adults').val(counts.adults);
        $dropdown.find('.js-applied-children').val(counts.children);
        $dropdown.find('.js-applied-infants').val(counts.infants);
    }

    function buildSummary(counts) {
        var total = counts.adults + counts.children + counts.infants;
        var parts = [];

        if (counts.adults > 0) {
            parts.push(formatLabel(counts.adults, 'adult', 'adults'));
        }
        if (counts.children > 0) {
            parts.push(formatLabel(counts.children, 'child', 'children'));
        }
        if (counts.infants > 0) {
            parts.push(formatLabel(counts.infants, 'infant', 'infants'));
        }

        return {
            total: total,
            text: parts.length ? parts.join(', ') : 'Select travelers',
            personLabel: total === 1 ? 'Person' : 'Persons',
        };
    }

    function updateTravelerDisplay($dropdown, counts) {
        var $toggle = $dropdown.children('[data-bs-toggle="dropdown"]').first();
        var summary = buildSummary(counts);

        $toggle.find('.member-count').html(
            summary.total +
                ' <span class="fw-normal fs-14">' +
                summary.personLabel +
                '</span>'
        );
        $toggle.find('.traveler-summary').text(summary.text);
    }

    function closeTravelerDropdown($dropdown) {
        var toggle = $dropdown.children('[data-bs-toggle="dropdown"]')[0];
        if (!toggle) {
            return;
        }

        if (typeof bootstrap !== 'undefined') {
            bootstrap.Dropdown.getOrCreateInstance(toggle).hide();
            return;
        }

        $dropdown.removeClass('show');
        $dropdown.find('.dropdown-menu').removeClass('show');
        $(toggle).attr('aria-expanded', 'false');
    }

    function applyTravelerSelection($dropdown, counts) {
        setAppliedCounts($dropdown, counts);
        setDraftCounts($dropdown, counts);
        updateTravelerDisplay($dropdown, counts);
        closeTravelerDropdown($dropdown);
    }

    function resetTravelerSelection($dropdown) {
        setDraftCounts($dropdown, DEFAULTS);
        setAppliedCounts($dropdown, DEFAULTS);
        updateTravelerDisplay($dropdown, DEFAULTS);
    }

    function parseTourDate(value) {
        var trimmed = (value || '').trim();
        if (!trimmed) {
            return null;
        }

        var formats = ['DD-MM-YYYY', 'D-M-YYYY', 'DD/MM/YYYY', 'YYYY-MM-DD'];
        for (var i = 0; i < formats.length; i++) {
            var parsed = moment(trimmed, formats[i], true);
            if (parsed.isValid()) {
                return parsed.startOf('day');
            }
        }

        return null;
    }

    function initTourSearchDates($form) {
        if (typeof moment === 'undefined' || !$.fn.daterangepicker) {
            return;
        }

        var $formInfo = $form.find('.form-info').first();
        var $checkIn = $formInfo.find('.check-in');
        var $checkOut = $formInfo.find('.check-out');

        if (!$checkIn.length) {
            return;
        }

        var today = moment().startOf('day');
        var tomorrow = today.clone().add(1, 'days');
        var startDate =
            parseTourDate($checkIn.attr('data-initial-date')) ||
            parseTourDate($checkIn.val()) ||
            today;
        var endDate =
            parseTourDate($checkOut.attr('data-initial-date')) ||
            parseTourDate($checkOut.val()) ||
            startDate.clone().add(1, 'days');

        if (endDate.isBefore(startDate)) {
            endDate = startDate.clone().add(1, 'days');
        }

        if ($checkIn.data('daterangepicker')) {
            $checkIn.data('daterangepicker').remove();
        }

        function syncDateInputs(start, end) {
            $checkIn.val(start.format('DD-MM-YYYY'));
            if ($checkOut.length) {
                $checkOut.val(end.format('DD-MM-YYYY'));
            }
        }

        syncDateInputs(startDate, endDate);

        $checkIn.daterangepicker(
            {
                autoApply: true,
                autoUpdateInput: false,
                minDate: today,
                startDate: startDate,
                endDate: endDate,
                opens: 'center',
                locale: { format: 'DD-MM-YYYY' },
            },
            function (start, end) {
                syncDateInputs(start, end);
            }
        );

        if ($checkOut.length) {
            $checkOut.off('click.tourSearchDates').on('click.tourSearchDates', function () {
                $checkIn.data('daterangepicker').show();
            });
        }
    }

    function buildSearchParams($form, $travelerDropdown, city) {
        var params = new URLSearchParams();
        params.set('destination_city', city);

        var checkIn = ($form.find('[name="check_in"]').val() || '').trim();
        var checkOut = ($form.find('[name="check_out"]').val() || '').trim();
        var applied = getAppliedCounts($travelerDropdown);
        var isTrending = ($form.find('[name="is_trending"]').val() || '').trim();

        if (checkIn) {
            params.set('check_in', checkIn);
        }
        if (checkOut) {
            params.set('check_out', checkOut);
        }
        if (applied.adults > 0) {
            params.set('adults', applied.adults);
        }
        if (applied.children > 0) {
            params.set('children', applied.children);
        }
        if (applied.infants > 0) {
            params.set('infants', applied.infants);
        }
        if (isTrending) {
            params.set('is_trending', isTrending);
        }

        return params;
    }

    function initTourSearchForm($form) {
        initTourSearchDates($form);

        var $travelerDropdown = $form.find('.js-tour-traveler-dropdown');
        if (!$travelerDropdown.length) {
            return;
        }

        var $destinationInput = $form.find('[name="destination_city"]');
        var $destinationField = $form.find('.js-destination-field');
        var searchMode = $form.data('search-mode') || 'redirect';

        function setDestinationError(hasError) {
            $destinationInput.toggleClass('is-invalid', hasError);
            $destinationField.toggleClass('has-validation-error', hasError);
        }

        $destinationInput.on('input change', function () {
            if (($(this).val() || '').trim()) {
                setDestinationError(false);
            }
        });

        bindTravelerCounters($travelerDropdown);
        updateTravelerDisplay($travelerDropdown, getAppliedCounts($travelerDropdown));

        $travelerDropdown.on('show.bs.dropdown', function () {
            setDraftCounts($travelerDropdown, getAppliedCounts($travelerDropdown));
        });

        $travelerDropdown.find('.js-traveler-apply').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var counts = getDraftCounts($travelerDropdown);

            if (counts.adults < 1) {
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage('At least 1 adult is required.', 'error');
                }
                return;
            }

            applyTravelerSelection($travelerDropdown, counts);
        });

        $travelerDropdown.find('.js-traveler-clear').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            resetTravelerSelection($travelerDropdown);
        });

        if (searchMode === 'filter') {
            return;
        }

        $form.on('submit', function (e) {
            e.preventDefault();

            var city = ($destinationInput.val() || '').trim();
            if (!city) {
                setDestinationError(true);
                $destinationInput.trigger('focus');
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage('Please enter a destination to search.', 'error');
                }
                return;
            }

            setDestinationError(false);

            var params = buildSearchParams($form, $travelerDropdown, city);
            window.location.href = $form.attr('action') + '?' + params.toString();
        });
    }

    $(function () {
        $('.js-tour-search-form').each(function () {
            initTourSearchForm($(this));
        });
    });
})(pageJQuery);
