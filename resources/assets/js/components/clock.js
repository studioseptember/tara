var exports = module.exports = {},
    moment = require('moment'),
    now = null,
    minutes = null,
    $time = $('.time'),
    $date = $('#date'),
    $body = $('body');

moment.locale('nl');

function setClock(time) {
    $time.html(time);
}

function setDate(date) {
    $date.html(date);
}

function doEveryMinute(moment) {
    minutes = moment.minutes();
    setClock(now.format('H:mm'));
    setDate(now.format('D/M'));
    $body.trigger('tara.next-events');
}

exports.startTime = function() {
    now = moment();

    if(!minutes) { // Initialize
        doEveryMinute(now);
    }

    if(now.minutes() !== minutes) {
        doEveryMinute(now);
    }

    var timeOut = setTimeout(exports.startTime, 1000);
}