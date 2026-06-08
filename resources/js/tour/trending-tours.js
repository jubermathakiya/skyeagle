import $ from 'jquery';

(function ($) {
    'use strict';

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

    $(function () {
        $(document).on('shown.bs.tab', 'a[data-bs-target="#Tour-list"]', function () {
            refreshTrendingSliders();
        });
    });
})(jQuery);
