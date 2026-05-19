/**
 * Tour destination search + Geoapify autocomplete + tour-list AJAX filters.
 * Plain jQuery (no ES modules) — load via build/js/tour/tour-page-search.js
 */
(function ($) {
    'use strict';

    function cityAutocomplete($input, searchUrl) {
        if (!$input.length || !searchUrl || $input.data('cityAutocompleteInit') === '1') {
            return;
        }
        $input.data('cityAutocompleteInit', '1');
        $input.attr('autocomplete', 'off');

        var $dropdown = $('<div>', {
            class: 'city-autocomplete-dropdown d-none',
            role: 'listbox',
        }).appendTo('body');

        var cache = {};
        var items = [];
        var activeIndex = -1;
        var debounceTimer = null;
        var requestId = 0;
        var isSelecting = false;
        var lastTerm = '';
        var xhr = null;

        function positionDropdown() {
            var el = $input[0];
            if (!el) {
                return;
            }
            var rect = el.getBoundingClientRect();
            $dropdown.css({
                position: 'fixed',
                top: rect.bottom + 4,
                left: rect.left,
                width: Math.max(rect.width, 280),
                zIndex: 99999,
            });
        }

        function hideDropdown() {
            $dropdown.addClass('d-none').empty();
            activeIndex = -1;
            items = [];
        }

        function showDropdown() {
            positionDropdown();
            $dropdown.removeClass('d-none');
        }

        function selectItem(index) {
            var item = items[index];
            if (!item || !item.value) {
                return;
            }
            isSelecting = true;
            requestId++;
            if (xhr && xhr.abort) {
                xhr.abort();
            }
            $input.val(item.value).trigger('change');
            hideDropdown();
            lastTerm = item.value;
            setTimeout(function () {
                isSelecting = false;
            }, 0);
        }

        function renderList(data) {
            $dropdown.empty();
            items = (data || []).filter(function (row) {
                return row && row.label && row.value;
            });
            if (!items.length) {
                hideDropdown();
                return;
            }
            items.forEach(function (item, index) {
                $('<button>', {
                    type: 'button',
                    class: 'city-autocomplete-option',
                    text: item.label,
                    'data-city-index': index,
                }).appendTo($dropdown);
            });
            showDropdown();
            activeIndex = -1;
        }

        function fetchCities(term) {
            var key = term.toLowerCase();
            var currentId = ++requestId;

            if (cache[key]) {
                if ($input.val().trim() === term) {
                    renderList(cache[key]);
                }
                return;
            }

            if (xhr && xhr.abort) {
                xhr.abort();
            }

            xhr = $.ajax({
                url: searchUrl,
                method: 'GET',
                dataType: 'json',
                data: { term: term },
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
            })
                .done(function (json) {
                    if (currentId !== requestId || isSelecting) {
                        return;
                    }
                    if ($input.val().trim() !== term) {
                        return;
                    }
                    if (!json || !json.status) {
                        hideDropdown();
                        if (json && json.message && typeof window.showToastmessage === 'function') {
                            window.showToastmessage(json.message, 'error');
                        }
                        return;
                    }
                    cache[key] = json.data || [];
                    lastTerm = term;
                    renderList(cache[key]);
                })
                .fail(function () {
                    if (currentId === requestId) {
                        hideDropdown();
                    }
                });
        }

        $input.on('input', function () {
            if (isSelecting) {
                return;
            }
            clearTimeout(debounceTimer);
            var term = $(this).val().trim();
            if (term.length < 2) {
                requestId++;
                hideDropdown();
                lastTerm = '';
                return;
            }
            if (term === lastTerm && items.length) {
                showDropdown();
                return;
            }
            debounceTimer = setTimeout(function () {
                fetchCities(term);
            }, 200);
        });

        $input.on('keydown', function (e) {
            if ($dropdown.hasClass('d-none') || !items.length) {
                return;
            }
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIndex = Math.min(activeIndex + 1, items.length - 1);
                highlight();
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIndex = Math.max(activeIndex - 1, 0);
                highlight();
            } else if (e.key === 'Enter' && activeIndex >= 0) {
                e.preventDefault();
                selectItem(activeIndex);
            } else if (e.key === 'Escape') {
                hideDropdown();
            }
        });

        $dropdown.on('mousedown', '.city-autocomplete-option', function (e) {
            e.preventDefault();
            selectItem(Number($(this).data('city-index')));
        });

        $input.on('blur', function () {
            setTimeout(function () {
                if (!isSelecting) {
                    hideDropdown();
                }
            }, 200);
        });

        $input.on('focus', function () {
            var term = $(this).val().trim();
            if (term.length >= 2 && items.length) {
                showDropdown();
            }
        });

        $(window).on('resize scroll', function () {
            if (!$dropdown.hasClass('d-none')) {
                positionDropdown();
            }
        });

        function highlight() {
            $dropdown.find('.city-autocomplete-option').each(function (i) {
                $(this).toggleClass('is-active', i === activeIndex);
            });
        }
    }

    function initDestinationForm(options) {
        var $form = $(options.formSelector);
        if (!$form.length) {
            return null;
        }

        var searchUrl =
            options.searchUrl ||
            $form.data('city-search-url') ||
            window.packageCitySearchUrl;

        var $searchInput = $(options.searchInput);
        var $displayInput = $(options.displayInput);
        var $subtitle = $(options.subtitle);
        var $cityHidden = $(options.hiddenInput);
        var $dropdown = $form.find('.booking-dropdown').first();

        if ($searchInput.length && searchUrl) {
            cityAutocomplete($searchInput, searchUrl);
        }

        function getDestination() {
            var typed = ($searchInput.val() || '').trim();
            if (typed) {
                return typed;
            }
            var display = ($displayInput.val() || '').trim();
            if (display) {
                return display;
            }
            return ($cityHidden.val() || '').trim();
        }

        function syncDestination(value) {
            var city = (value || '').trim();
            $cityHidden.val(city);
            $searchInput.val(city);
            if (city) {
                $displayInput.val(city);
                $subtitle.text(city);
            }
        }

        $searchInput.on('change input', function () {
            var v = $(this).val().trim();
            $cityHidden.val(v);
            if (v) {
                $displayInput.val(v);
                $subtitle.text(v);
            }
        });

        $displayInput.on('click focus', function () {
            var toggle = $dropdown.find('[data-bs-toggle="dropdown"]')[0];
            if (toggle && typeof bootstrap !== 'undefined') {
                bootstrap.Dropdown.getOrCreateInstance(toggle).show();
            }
            setTimeout(function () {
                $searchInput.trigger('focus');
            }, 80);
        });

        $dropdown.on('show.bs.dropdown', function () {
            setTimeout(function () {
                $searchInput.trigger('focus');
            }, 50);
        });

        $form.on('submit', function (e) {
            e.preventDefault();
            var city = getDestination();
            if (!city) {
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage('Please enter a destination to search.', 'error');
                } else {
                    alert('Please enter a destination to search.');
                }
                return;
            }
            syncDestination(city);
            if (typeof options.onSearch === 'function') {
                options.onSearch(city);
            } else {
                window.location.href =
                    $form.attr('action') + '?destination_city=' + encodeURIComponent(city);
            }
        });

        return { getDestination: getDestination, syncDestination: syncDestination };
    }

    function initTourListAjax() {
        var $filterForm = $('#tour-filter-form');
        if (!$filterForm.length) {
            return;
        }

        var $resultsCount = $('#tour-results-count');
        var searchTimer = null;

        function updateResults(response, url) {
            if (!response || typeof response.html === 'undefined') {
                return;
            }
            $('#tour-results-wrapper').replaceWith(response.html);
            $resultsCount.text((response.total || 0) + ' Tours Found on Your Search');
            if (url) {
                window.history.replaceState({}, '', url);
            }
        }

        function setDestinationFilter(city) {
            $filterForm.find('input[name="destination_city"]').remove();
            if (city) {
                $filterForm.append(
                    $('<input>', {
                        type: 'hidden',
                        name: 'destination_city',
                        value: city,
                    })
                );
            }
        }

        function applyFilters(customUrl) {
            if (customUrl) {
                $filterForm.attr('action', customUrl);
            }
            $.ajax({
                url: $filterForm.attr('action'),
                type: 'GET',
                data: $filterForm.serialize(),
                dataType: 'json',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                success: function (response) {
                    updateResults(response, $filterForm.attr('action') + '?' + $filterForm.serialize());
                },
                error: function (xhr) {
                    var msg =
                        (xhr.responseJSON && xhr.responseJSON.message) ||
                        'Something went wrong!';
                    if (typeof window.showToastmessage === 'function') {
                        window.showToastmessage(msg, 'error');
                    }
                },
            });
        }

        window.applyTourFilters = applyFilters;

        $(document).on('change', '[data-category-filter="1"]', function () {
            applyFilters();
        });

        $filterForm.on('submit', function (e) {
            e.preventDefault();
            applyFilters();
        });

        $(document).on('click', '#tour-results-wrapper .pagination a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            if (url && url !== '#') {
                applyFilters(url);
            }
        });

        $(document).on('keyup', '#tour-type-search', function () {
            var keyword = ($(this).val() || '').toLowerCase();
            $('#accordion-hotel .form-check').each(function () {
                var labelText = ($(this).find('label').text() || '').toLowerCase();
                $(this).toggle(labelText.indexOf(keyword) !== -1);
            });
            clearTimeout(searchTimer);
            searchTimer = setTimeout(applyFilters, 350);
        });

        initDestinationForm({
            formSelector: '#tour-list-banner-search-form',
            searchInput: '#tour-list-destination-search',
            displayInput: '#tour-list-destination-display',
            subtitle: '#tour-list-destination-subtitle',
            hiddenInput: '#tour-list-destination-city',
            onSearch: function (city) {
                setDestinationFilter(city);
                applyFilters();
            },
        });
    }

    function initHomeTourSearch() {
        initDestinationForm({
            formSelector: '#home-tour-search-form',
            searchInput: '#tour-destination-search',
            displayInput: '#tour-destination-display',
            subtitle: '#tour-destination-subtitle',
            hiddenInput: '#tour-destination-city',
        });
    }

    $(function () {
        if ($('#tour-list-banner-search-form').length) {
            initTourListAjax();
        }
        if ($('#home-tour-search-form').length) {
            initHomeTourSearch();
        }
    });
})(jQuery);
