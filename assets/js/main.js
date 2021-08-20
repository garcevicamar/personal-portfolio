!(function($) {
    "use strict";

    if ($('.countdown').length) {
        var count = $('.countdown').data('count');
        var template = $('.countdown').data('template');
        $('.countdown').countdown(count, function(event) {
            $(this).html(event.strftime(template));
        });
    }

    $(document).on('click', '.scrollto', function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            e.preventDefault();
            var target = $(this.hash);
            if (target.length) {
                var scrollto = target.offset().top;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
                return false;
            }
        }
    });

})(jQuery);