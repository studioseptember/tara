$(function() {
    $('[data-ajax-form]').on('submit', function(e) {
        var $form = $(this),
            $body = $('body'),
            $submitButton = $form.find('button[type="submit"]').prop('disabled', true),
            submitButtonBgColor = $submitButton.css('background-color');

        if(window.taraTouch) {
            $('.transition svg circle').css('fill', submitButtonBgColor);
            $('.transition').css({'top': window.taraTouch.y, 'left': window.taraTouch.x});
            $body.addClass('transition-active');
        }

        $.ajax({
            method: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            dataType: 'json'
        })
        .done(function(data) {

        })
        .fail(function(jqXHR, textStatus, errorThrown) {

        })
        .always(function(data) {
            if($form.parents('.tara-modal')) {
                $('.tara-modal').removeClass('active');
            }

            $submitButton.prop('disabled', false);

            $body
            .removeClass('dimmer-active')
            .trigger('tara.next-events');
        });

        e.preventDefault();
    });
});