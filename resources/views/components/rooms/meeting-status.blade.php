@if($events->isNotEmpty())
    @if($now->between($events->first()->startDateTime, $events->first()->endDateTime))
        <h2>Bezet</h2>
    @else
        <h2>Vrij</h2>
    @endif
@else
    <h2>Vrij</h2>
@endif