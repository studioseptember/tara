@if($events->isNotEmpty())
    <ul>
        @foreach($events as $event)
            <li class="event">
                <div class="event__timing">
                    @if($now->between($event->startDateTime, $event->endDateTime))
                        Nu
                    @else
                        Later vandaag
                    @endif
                </div>
                <ul>
                    <li class="event__date">{{ $event->startDateTime->format('H:i') }}<svg class="icon icon-pijltje"><use xlink:href="#icon-pijltje"></use></svg>{{ $event->endDateTime->format('H:i') }}</li>
                    <li class="event__summary">{{ $event->summary }}</li>
                </ul>
            </li>
        @endforeach
    </ul>
@endif