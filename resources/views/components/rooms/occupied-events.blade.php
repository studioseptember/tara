@if($events->isNotEmpty())
    <ul class="events events--occupied">
        @foreach($events as $event)
            @if($now->between($event->startDateTime, $event->endDateTime))
                <li class="event event--occupied">
                    <span>Nu <svg class="icon icon-pijltje"><use xlink:href="#icon-pijltje"></use></svg> {{ $event->endDateTime->format('H:i') }}</span>
                    {{ $event->summary }}
                </li>
            @endif
        @endforeach
    </ul>

    <button class="button button--open-modal" type="button" data-modal="#end-event-modal" data-event-id="{{ $events->first()->id }}">
        <svg class="icon icon-icoon-meetingeindigen"><use xlink:href="#icon-icoon-meetingeindigen"></use></svg>Meeting beëindigen
    </button>
@endif