import { submitAjaxForm } from '../common/form-handler.js';

(function ($) {

    var $form = $('#tour-filter-form');
    var $bannerForm = $('#tour-banner-search-form');
    var $resultsCount = $('#tour-results-count');
    var searchTimer = null;

    function setHiddenFilterField(name, value) {
        $form.find('input[name="' + name + '"]').remove();
        if (value !== '' && value !== null && typeof value !== 'undefined') {
            $form.append(
                $('<input>', {
                    type: 'hidden',
                    name: name,
                    value: value,
                })
            );
        }
    }

    function syncBannerToFilter($banner) {
        var fields = [
            'destination_city',
            'check_in',
            'check_out',
            'adults',
            'children',
            'infants',
            'is_trending',
        ];

        fields.forEach(function (name) {
            var value = ($banner.find('[name="' + name + '"]').val() || '').trim();
            setHiddenFilterField(name, value);
        });
    }

    function setDestinationError($banner, hasError) {
        var $destinationInput = $banner.find('[name="destination_city"]');
        $destinationInput.toggleClass('is-invalid', hasError);
        $banner.find('.js-destination-field').toggleClass('has-validation-error', hasError);
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

    function applyFilters(customUrl = null, historyUrl = null) {
        if (!$form.length) {
            return;
        }
        var listAction = $form.attr('action');
        if (customUrl) {
            $form.attr('action', customUrl);
        }
        submitAjaxForm($form, {
            onSuccess: function (response) {
                updateResults(
                    response,
                    historyUrl || customUrl || (listAction + '?' + $form.serialize())
                );
                if (customUrl) {
                    $form.attr('action', listAction);
                }
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

            var city = ($bannerForm.find('[name="destination_city"]').val() || '').trim();
            if (!city) {
                setDestinationError($bannerForm, true);
                $bannerForm.find('[name="destination_city"]').trigger('focus');
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage('Please enter a destination to search.', 'error');
                }
                return;
            }

            setDestinationError($bannerForm, false);
            syncBannerToFilter($bannerForm);
            applyFilters(
                null,
                $bannerForm.attr('action') + '?' + $bannerForm.serialize()
            );
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
