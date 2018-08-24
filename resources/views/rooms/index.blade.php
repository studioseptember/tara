@extends('base')

@section('body-class')roomselector @endsection

@section('content')
    <svg class="roomselector__shape-topleft" width="663" height="418" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient x1="87.667%" y1="44.135%" x2="16.721%" y2="107.69%" id="a">
            <stop stop-color="#1900FF" offset="0%"/>
            <stop stop-color="#009CFF" offset="100%"/>
            </linearGradient>
        </defs>
        <path d="M626.49 358.233L561.11-54.553C498.08 13.245 532.97 60.143 437.517 108.62 331.487 162.467 67.563 324.315-28.207 461.927L626.49 358.233z" transform="rotate(-171 299.142 203.687)" fill="url(#a)" fill-rule="nonzero"/>
    </svg>

    <div class="roomselection">
        @if(count($rooms))
            <h3>Kies je kamer om te beginnen</h3>
            <ul>
                @foreach($rooms as $key => $room)
                    <li><a class="btn btn--white" href="{{ action('RoomController@show', ['room' => $key]) }}">{{ $room['label'] }}<svg class="icon icon-pijltje"><use xlink:href="#icon-pijltje"></use></svg></a></li>
                @endforeach
            </ul>
        @else
            <h3>Configureer minimaal 1 kamer</h3>
        @endif
    </div>

    <svg class="roomselector__shape-bottomright" width="442" height="339" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient x1="35.116%" y1="44.092%" x2="80.854%" y2="123.37%" id="a">
            <stop stop-color="#1900FF" offset="0%"/>
            <stop stop-color="#009CFF" offset="100%"/>
            </linearGradient>
        </defs>
        <path d="M1023.247 768V429.453c-66.351 8.812-123.436 23.472-142.044 32.922C750.533 528.737 582 567.312 582 714.22c0 17.955 3.494 36.824 6.885 53.781h434.362z" transform="translate(-582 -429)" fill="url(#a)" fill-rule="nonzero"/>
    </svg>
@endsection