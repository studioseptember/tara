$(function() {
    var $body = $('body');

    $body
    .on('touchstart', function(e) {
        var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];

        window.taraTouch = {
            x: touch.pageX,
            y: touch.pageY
        };
    })
    .on('tara.refreshed', function(e) {

        if($body.hasClass('transition-active')) {

            $body.addClass('transition-active--fade');

            setTimeout(() => {

                $body.removeClass('transition-active transition-active--fade');
            }, 500);
        }
    });
});