(function($) {
    $.fn.my = function(options){
        var settings = $.extend({
            color: "red",
            backgroundColor: "pink"
        }, options );
        return this.css({
            color: settings.color,
            backgroundColor: settings.backgroundColor
        });

    }

})(jQuery);