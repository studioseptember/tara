$(function() {
    $('body')
    .on('click', 'button[data-modal]', function(e) {
        var $el = $(this),
            eventId = $el.attr('data-event-id'),
            $modal = $($el.attr('data-modal'));

        if(eventId) {
            $modal.find('[name="event_id"]').val(eventId);
        }

        $(e.delegateTarget).addClass('dimmer-active');
        $modal.addClass('active');

        e.preventDefault();
    })
    .on('click', '.close-modal, .cancel', function(e) {
        $(e.delegateTarget).removeClass('dimmer-active');
        $(this).parents('.tara-modal').removeClass('active');

        e.preventDefault();
    })
    .on('click', '.dimmer', function(e) {
        $(e.delegateTarget).removeClass('dimmer-active');
        $('.tara-modal').removeClass('active');

        e.preventDefault();
    });
});