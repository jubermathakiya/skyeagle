import { submitAjaxForm } from '../common/form-handler.js';

(function ($) {

    var $form = $('#tour-filter-form');
    var $bannerForm = $('#tour-banner-search-form');
    var $resultsCount = $('#tour-results-count');
    var searchTimer = null;
    var isLoadingMore = false;
    var imgSliderOptions = {
        loop: true,
        margin: 20,
        nav: true,
        dots: true,
        smartSpeed: 2000,
        autoplay: false,
        navText: [
            '<i class="fa-solid fa-chevron-left"></i>',
            '<i class="fa-solid fa-chevron-right"></i>',
        ],
        responsive: {
            0: { items: 1 },
            550: { items: 1 },
            768: { items: 1 },
            1000: { items: 1 },
        },
    };

    function initTourResultSliders($wrapper) {
        if (!$.fn.owlCarousel) {
            return;
        }

        $wrapper.find('.img-slider').each(function () {
            var $slider = $(this);

            if ($slider.hasClass('owl-loaded')) {
                $slider.trigger('refresh.owl.carousel');
                return;
            }

            $slider.owlCarousel(imgSliderOptions);
        });
    }

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
        if (typeof response.topCategoriesHtml !== 'undefined') {
            $('#top-tour-categories-wrapper').replaceWith(response.topCategoriesHtml);
        }
        initTourResultSliders($('#tour-results-wrapper'));
        $resultsCount.text(
            (response.total || 0) + ' Tours Found on Your Search'
        );
        window.history.replaceState({}, '', url);
        checkInfiniteScroll();
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

    function getResultsWrapper() {
        return $('#tour-results-wrapper');
    }

    function getNextPageUrl() {
        var $wrapper = getResultsWrapper();
        return $wrapper.data('next-page-url') || $wrapper.attr('data-next-page-url') || '';
    }

    function setInfiniteLoading(isLoading) {
        var $status = $('[data-tour-infinite-status]');
        var $spinner = $status.find('.spinner-border');
        var $text = $status.find('[data-tour-infinite-text]');

        isLoadingMore = isLoading;

        if (!$status.length) {
            return;
        }

        if (isLoading) {
            $status.removeClass('d-none');
            $spinner.removeClass('d-none');
            $text.text('Loading more tours...');
            return;
        }

        $spinner.addClass('d-none');
        $text.text('');

        if (!getNextPageUrl()) {
            $status.addClass('d-none');
        }
    }

    function appendResults(response) {
        if (!response || typeof response.html === 'undefined') {
            return;
        }

        var $currentWrapper = getResultsWrapper();
        var $currentList = $('#tour-results-list');
        var $incomingWrapper = $('<div>').html(response.html).find('#tour-results-wrapper');
        var $incomingItems = $incomingWrapper.find('[data-tour-result-item="1"]');

        if (!$incomingItems.length) {
            $currentWrapper.attr('data-next-page-url', '').data('next-page-url', '');
            return;
        }

        $currentList.append($incomingItems);
        $currentWrapper
            .attr('data-next-page-url', response.nextPageUrl || $incomingWrapper.attr('data-next-page-url') || '')
            .data('next-page-url', response.nextPageUrl || $incomingWrapper.attr('data-next-page-url') || '');
        $currentWrapper
            .attr('data-has-more-pages', response.hasMorePages ? '1' : '0')
            .data('has-more-pages', response.hasMorePages ? '1' : '0');
        initTourResultSliders($incomingItems);
        $resultsCount.text(
            (response.total || 0) + ' Tours Found on Your Search'
        );
    }

    function loadNextPage() {
        var nextPageUrl = getNextPageUrl();

        if (isLoadingMore || !nextPageUrl) {
            return;
        }

        setInfiniteLoading(true);

        $.ajax({
            url: nextPageUrl,
            type: 'GET',
            dataType: 'json',
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            success: function (response) {
                appendResults(response);
            },
            error: function (xhr) {
                var response = xhr.responseJSON || {};
                if (typeof window.showToastmessage === "function") {
                    window.showToastmessage(
                        response.message || "Something went wrong!",
                        "error"
                    );
                }
            },
            complete: function () {
                setInfiniteLoading(false);
                checkInfiniteScroll();
            },
        });
    }

    function checkInfiniteScroll() {
        var $wrapper = getResultsWrapper();

        if (!$wrapper.length || isLoadingMore || !getNextPageUrl()) {
            return;
        }

        var scrollBottom = $(window).scrollTop() + $(window).height();
        var triggerPoint = $wrapper.offset().top + $wrapper.outerHeight() - 450;

        if (scrollBottom >= triggerPoint) {
            loadNextPage();
        }
    }

    $(document).on('change', '[data-category-filter="1"], [data-attribute-filter="1"]', function () {
        applyFilters();
    });

    $(document).on('click', '[data-top-tour-category]', function (e) {
        e.preventDefault();

        var categoryId = String($(this).data('top-tour-category') || '');
        if (!categoryId) {
            return;
        }

        $form.find('[data-category-filter="1"]').prop('checked', false);
        $form.find('[data-top-category-hidden="1"]').remove();

        var $categoryInput = $form.find('input[name="categories[]"][value="' + categoryId + '"]');
        if ($categoryInput.length) {
            $categoryInput.prop('checked', true);
        } else {
            $form.append(
                $('<input>', {
                    type: 'hidden',
                    name: 'categories[]',
                    value: categoryId,
                    'data-top-category-hidden': '1',
                })
            );
        }

        applyFilters();
    });

    $(document).on('click', '#tour-filter-reset', function (e) {
        e.preventDefault();

        var resetUrl = $(this).attr('href');
        if (!resetUrl) {
            return;
        }

        $form.find('input[type="checkbox"]').prop('checked', false);
        $form.find('input[type="text"]').val('');
        $form.find('input[type="hidden"]').remove();

        if ($bannerForm.length) {
            $bannerForm[0].reset();
            setDestinationError($bannerForm, false);
        }

        applyFilters(resetUrl, resetUrl);
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

    $(function () {
        initTourResultSliders($('#tour-results-wrapper'));
        $(window).on('scroll.tourInfinite resize.tourInfinite', checkInfiniteScroll);
        checkInfiniteScroll();
    });

})(jQuery);
