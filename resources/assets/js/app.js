require('./bootstrap');
require('./components/next-events');
require('./components/add-subtract-input');
require('./components/modal');
require('./components/ajax-form');
require('./components/button-animation');
require('./components/line-animation');

var clock = require('./components/clock');

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').trigger('bless'); // Register event listeners

    clock.startTime(); // Start the timer!
});