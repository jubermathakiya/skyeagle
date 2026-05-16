import { submitAjaxForm } from '../common/form-handler.js';

(function ($) {
    var $form = $('#flight-search-form');
    var $resultsCount = $('#flight-results-count');

    function updateResults(response, url) {
        if (!response || typeof response.html === 'undefined') {
            return;
        }

        $('#flight-results-wrapper').replaceWith(response.html);
        $resultsCount.text((response.total || 0) + ' Flights Found on Your Search');
        window.history.replaceState({}, '', url);
    }

    function applyFilters(customUrl) {
        if (!$form.length) {
            return;
        }

        if (customUrl) {
            $form.attr('action', customUrl);
        }

        submitAjaxForm($form, {
            onSuccess: function (response) {
                updateResults(response, $form.attr('action') + '?' + $form.serialize());
            },
            onError: function (response) {
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage(response.message || 'Something went wrong!', 'error');
                }
            }
        });
    }

    $form.on('submit', function (event) {
        if (!$form.length) {
            return;
        }

        event.preventDefault();
        applyFilters();
    });

    $(document).on('click', '#flight-results-wrapper .pagination a', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');

        if (!url || url === '#') {
            return;
        }

        applyFilters(url);
    });
})(jQuery);
