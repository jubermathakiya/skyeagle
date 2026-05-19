/**
 * City suggestions (Geoapify via Laravel). Does not block normal form GET submit.
 */
(function ($) {
    'use strict';

    function initCitySuggestions($input) {
        if (!$input.length || $input.data('citySuggestInit') === '1') {
            return;
        }

        var searchUrl = $input.data('cityUrl') || window.cityAutocompleteUrl;
        if (!searchUrl) {
            return;
        }

        $input.data('citySuggestInit', '1');
        $input.attr('autocomplete', 'off');

        var $syncTarget = $($input.data('syncTo'));
        var $subtitleTarget = $($input.data('subtitleTo'));
        var $staticList = $input.closest('.dropdown-menu').find('.js-city-static-list');

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

        function syncValue(value) {
            var city = (value || '').trim();
            if ($syncTarget.length) {
                $syncTarget.val(city);
            }
            if ($subtitleTarget.length && city) {
                $subtitleTarget.text(city);
            }
        }

        function positionDropdown() {
            var rect = $input[0].getBoundingClientRect();
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
            if ($staticList.length) {
                $staticList.show();
            }
        }

        function showDropdown() {
            positionDropdown();
            $dropdown.removeClass('d-none');
            if ($staticList.length) {
                $staticList.hide();
            }
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
            $input.val(item.value);
            syncValue(item.value);
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
            var term = $(this).val().trim();
            syncValue(term);

            clearTimeout(debounceTimer);
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
            syncValue(term);
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

    $(function () {
        $('.js-city-suggest-input').each(function () {
            initCitySuggestions($(this));
        });
    });
})(jQuery);
