<div id="end-event-modal" class="tara-modal">
    <button class="close-modal" type="button">
        <svg class="icon icon-modalsluiten"><use xlink:href="#icon-modalsluiten"></use></svg>
    </button>
    <h1>Weet je zeker dat je de meeting wilt beëindigen?</h1>
    <form id="end-event" action="{{ action('RoomController@endEvent', ['room' => $room['id']]) }}" method="POST" data-ajax-form="true">
        {{ csrf_field() }}
        <input type="hidden" name="event_id" value="">
        <button type="button" class="cancel">Annuleren</button>
        <button type="submit" class="btn btn--red">Ja, beëindig meeting</button>
    </form>
</div>