$(function() {
    var $body = $('body');

    $body.on('bless', function(e) {
        var $target = $(e.target),
            $nextEvents = $target.is('[data-next-events]') ? $target : $target.find('[data-next-events]');

        $nextEvents.each(function() {
            var $el = $(this),
                url = $el.attr('data-next-events');

            $body.on('tara.next-events', function(e) {
                $.ajax({
                    method: 'GET',
                    url: url,
                    dataType: 'json'
                })
                .always(function(){
                    $body.trigger('tara.refreshed');
                })
                .done(function(data) {
                    if(data.success) {
                        if(data.replacements) {
                            if (data.replacements[0].selector == '#events' && data.replacements[0].html){
                                $('body').removeClass('no-events');
                            } else {
                                $('body').addClass('no-events');
                            }
                            $.each(data.replacements, function(index, value) {
                                $(value.selector).html(value.html);
                            });
                        }

                        if(data.occupied) {
                            $('#room-occupied').addClass('active');
                            $('#room-free').removeClass('active');
                        } else {
                            $('#room-occupied').removeClass('active');
                            $('#room-free').addClass('active');
                        }
                    }
                });
            });
        });
    });
});