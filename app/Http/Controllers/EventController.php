<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index () {
        $events = Event::all();

        return $events;
    }
    public function show (Request $request) {
        $pagination_num = $request->query('limit') ?? 10;

        $events = Event::with('eventType', 'leaders', 'organizes')
                    ->paginate($pagination_num);

        return $events;
    }

    public function getEventById ($id) {
        $event = Event::with('eventType', 'leaders', 'organizes')
                    ->whereIn('id', [$id])
                    ->get();

        if ($event->count() === 0) {
            return response()->json([
                'message' => 'Event not found.'
            ], 404);
        }

        return $event;
    }

}