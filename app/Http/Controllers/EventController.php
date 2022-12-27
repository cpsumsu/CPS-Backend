<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventShowResource;

class EventController extends Controller
{
    public $cacheTime = 60; // seconds before another database fetch

    public function index (Request $request) {
        $pagination_num = $request->query('limit') ?? 10;
        $page_num = $request->query('page') ?? 1;

        $events = Cache::remember("events-$pagination_num-$page_num", $this->cacheTime, function () use ($pagination_num) {
            return EventShowResource::collection(Event::with('eventType', 'leaders', 'organizers')
            ->orderBy('date', 'desc')
            ->paginate($pagination_num));
        });

        return $events;        
    }

    public function show ($id) {
        $event = Event::with('eventType', 'leaders', 'organizers')
            ->whereIn('id', [$id])
            ->first();

        if (is_null($event)) {
            return response()->json([
                'message' => 'Event not found.'
            ], 404);
        }

        $event = EventResource::make($event);

        return $event;
    }

    public function list () {
        $events = Event::all();

        return $events;
    }

}