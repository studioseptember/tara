<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function getRoom($room) {
        $rooms = config('google-calendar-rooms.rooms', []);

        if(array_key_exists($room, $rooms)) {
            return $rooms[$room];
        }

        abort(404);
    }

    public function index() {
        $rooms = config('google-calendar-rooms.rooms', []);

        return view('rooms.index', ['rooms' => $rooms]);
    }

    public function show($room) {
        $room = $this->getRoom($room);

        return view('rooms.show', ['room' => $room]);
    }

    public function nextEvents(Request $request, $room) {
        $events = Event::get(Carbon::now(), Carbon::now()->endOfDay(), [], $room);
        $events = $events->take(1);
        $now = Carbon::now();
        $occupied = false;

        if($events->isNotEmpty() && $now->between($events->first()->startDateTime, $events->first()->endDateTime)) {
            $occupied = true;
        }

        if($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'occupied' => $occupied,
                'replacements' => [
                    [
                        'selector' => '#events',
                        'html' => view('components.rooms.next-events', ['events' => $events, 'now' => $now])->render()
                    ],
                    [
                        'selector' => '#events-occupied',
                        'html' => view('components.rooms.occupied-events', ['events' => $events, 'now' => $now])->render()
                    ],
                    [
                        'selector' => '#meeting-status',
                        'html' => view('components.rooms.meeting-status', ['events' => $events, 'now' => $now])->render()
                    ],
                ]
            ]);
        }
    }

    public function createEvent(Request $request, $room) {
        Event::create([
            'name' => 'Een Tara Meeting',
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->addMinutes($request->get('end_date')),
        ], $room);

        if($request->wantsJson()) {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function endEvent(Request $request, $room) {
        $event = Event::find($request->get('event_id'), $room);

        $event->endDateTime = Carbon::now();

        $event->save();

        if($request->wantsJson()) {
            return response()->json([
                'success' => true
            ]);
        }
    }
}
