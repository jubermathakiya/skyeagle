(function ($) {
    'use strict';

    function loadBlogs(url) {
        if (!url || url === '#') {
            return;
        }

        var $wrapper = $('#blog-results-wrapper');
        $wrapper.css('opacity', '0.55');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                if (response && response.html) {
                    $('#blog-results-wrapper').replaceWith(response.html);
                    window.history.replaceState({}, '', url);
                    $('html, body').animate({ scrollTop: $('.blog-grid-page').offset().top - 90 }, 250);
                }
            },
            error: function (xhr) {
                var msg = (xhr.responseJSON && xhr.responseJSON.message) || 'Something went wrong!';
                if (typeof window.showToastmessage === 'function') {
                    window.showToastmessage(msg, 'error');
                }
            },
            complete: function () {
                $('#blog-results-wrapper').css('opacity', '1');
            },
        });
    }

    $(document).on('click', '#blog-results-wrapper .pagination a', function (e) {
        e.preventDefault();
        loadBlogs($(this).attr('href'));
    });
})(jQuery);
