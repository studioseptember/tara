$(function() {
    $('.inputfield').on('click', '.modifier', function(e) {
        var $el = $(this),
            $input = $(e.delegateTarget).find('input'),
            modifier = parseInt($el.data('value')),
            value = parseInt($input.val()),
            newValue = 0;

        if($el.hasClass('subtract')) {
            newValue = value - modifier;
        }

        if($el.hasClass('add')) {
            newValue = value + modifier;
        }

        if (newValue > 0 && newValue <= 240) {
            $input.val(newValue);
        }
    });
});