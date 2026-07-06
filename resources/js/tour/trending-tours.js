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

    function initTrendingSliders($wrapper) {
        $wrapper.find('.place-slider').each(function () {
            var $slider = $(this);
            if (!$slider.hasClass('owl-loaded')) {
                $slider.owlCarousel(placeSliderOptions);
            }
        });

        $wrapper.find('.img-slider').each(function () {
            var $slider = $(this);
            if (!$slider.hasClass('owl-loaded')) {
                $slider.owlCarousel(imgSliderOptions);
            }
        });
    }

    function refreshTrendingSliders() {
        var $wrapper = $('#trending-tours-wrapper');
        if (!$wrapper.length) {
            return;
        }

        $wrapper.find('.place-slider.owl-loaded').each(function () {
            $(this).trigger('refresh.owl.carousel');
        });
        $wrapper.find('.img-slider.owl-loaded').each(function () {
            $(this).trigger('refresh.owl.carousel');
        });
    }

    function loadTrendingTours() {
        var $wrapper = $('#trending-tours-wrapper');
        if (!$wrapper.length || $wrapper.data('loaded') === '1') {
            refreshTrendingSliders();
            return;
        }

        var url = $wrapper.data('url');
        if (!url) {
            return;
        }

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                if (!response || typeof response.html === 'undefined') {
                    return;
                }

                $wrapper.html(response.html);
                $wrapper.data('loaded', '1');
                initTrendingSliders($wrapper);
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

    $(function () {
        function syncViewAllPlacesLink($tab) {
            var url = $tab.data('list-url');
            if (url) {
                $('#view-all-places-link').attr('href', url);
            }
        }

        var $activePlacesTab = $('.place-nav .nav-link.active[data-list-url]').first();
        if ($activePlacesTab.length) {
            syncViewAllPlacesLink($activePlacesTab);
        }

        $(document).on('shown.bs.tab', '.place-nav .nav-link[data-list-url]', function () {
            syncViewAllPlacesLink($(this));
        });

        $(document).on('shown.bs.tab', 'a[data-bs-target="#Tour-list"]', function () {
            loadTrendingTours();
        });
    });
})(pageJQuery);
