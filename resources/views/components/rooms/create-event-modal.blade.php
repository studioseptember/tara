<div id="create-event-modal" class="tara-modal">
    <button class="close-modal" type="button">
        <svg class="icon icon-modalsluiten"><use xlink:href="#icon-modalsluiten"></use></svg>
    </button>
    <h1>Hoe lang wil je overleggen?</h1>
    <form id="store-event" action="{{ action('RoomController@createEvent', ['room' => $room['id']]) }}" method="POST" data-ajax-form="true">
        {{ csrf_field() }}
        <div class="inputfield">
            <input type="number" name="end_date" value="30" class="" readonly>
            <span>minuten</span>
            <div class="modifier subtract" data-value="15"><svg class="icon icon-min"><use xlink:href="#icon-min"></use></svg></div>
            <div class="modifier add" data-value="15"><svg class="icon icon-plus"><use xlink:href="#icon-plus"></use></svg></div>
        </div>
        <button type="submit" class="btn">OK, go!</button>
    </form>
</div>