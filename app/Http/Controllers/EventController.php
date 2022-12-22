<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public $cacheTime = 60; // 60 seconds before another database fetch

    public function index () {
        $events = Event::all();

        return $events;
    }
    public function show (Request $request) {
        $pagination_num = $request->query('limit') ?? 10;
        $page_num = $request->query('page') ?? 1;

        $value = Cache::remember("events".$pagination_num.$page_num, $this->cacheTime, function () use ($pagination_num) {
            return Event::with('eventType', 'leaders', 'organizes')
                        ->orderBy('date', 'desc')
                        ->paginate($pagination_num, $columns = ['id', 'name', 'venue', 'date', 'image', 'event_type_id']);
        });

        return $value;
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