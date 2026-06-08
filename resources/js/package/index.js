import { submitAjaxForm } from '../common/form-handler.js';

(function ($) {

    var $form = $('#tour-filter-form');
    var $bannerForm = $('#tour-banner-search-form');
    var $resultsCount = $('#tour-results-count');
    var searchTimer = null;

    function setDestinationFilter(city) {
        $form.find('input[name="destination_city"]').remove();
        if (city) {
            $form.append(
                $('<input>', {
                    type: 'hidden',
                    name: 'destination_city',
                    value: city,
                })
            );
        }
    }

    function updateResults(response, url) {
        if (!response || typeof response.html === 'undefined') {
            return;
        }
        $('#tour-results-wrapper').replaceWith(response.html);
        $resultsCount.text(
            (response.total || 0) + ' Tours Found on Your Search'
        );
        window.history.replaceState({}, '', url);
    }

    function applyFilters(customUrl = null) {
        if (!$form.length) {
            return;
        }
        if (customUrl) {
            $form.attr('action', customUrl);
        }
        submitAjaxForm($form, {
            onSuccess: function (response) {
                updateResults(
                    response,
                    $form.attr('action') + '?' + $form.serialize()
                );
            },
            onError: function (response) {

                if (typeof window.showToastmessage === "function") {
                    window.showToastmessage(
                        response.message || "Something went wrong!",
                        "error"
                    );
                }
            }
        });
    }

    $(document).on('change', '[data-category-filter="1"]', function () {
        applyFilters();
    });
    $form.on('submit', function (e) {
        e.preventDefault();
        applyFilters();
    });

    if ($bannerForm.length) {
        $bannerForm.on('submit', function (e) {
            e.preventDefault();
            var city = ($('#tour-list-destination').val() || '').trim();
            setDestinationFilter(city);
            applyFilters();
        });
    }
    $(document).on(
        'click',
        '#tour-results-wrapper .pagination a',
        function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            if (!url || url === '#') {
                return;
            }
            applyFilters(url);
        }
    );

    $(document).on('keyup', '#tour-type-search', function () {
        let keyword = ($(this).val() || '').toLowerCase();
        $('#accordion-hotel .form-check').each(function () {
            let labelText = (
                $(this).find('label').text() || ''
            ).toLowerCase();
            $(this).toggle(labelText.indexOf(keyword) !== -1);
        });
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function () {
            applyFilters();
        }, 350);
    });

})(jQuery);