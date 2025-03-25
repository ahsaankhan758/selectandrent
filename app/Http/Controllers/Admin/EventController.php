<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => Carbon::parse($event->start)->toIso8601String(), // Convert to ISO 8601
                'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null, // Convert if exists
                'className' => $event->className
            ];
        });
        
       
        return response()->json($events);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'start' => 'required|date',
        //     'end' => 'nullable|date',
        //     'className' => 'required|string|max:255',
        // ]);

        foreach ($request->events as $eventData) {
            $event = Event::create([
                'title' => $eventData['title'],
                'start' => Carbon::parse($eventData['start'])->format('Y-m-d H:i:s'),
                'end' => isset($eventData['end']) ? Carbon::parse($eventData['end'])->format('Y-m-d H:i:s') : null,
                'className' => $eventData['className'],
            ]);
    
    //        $createdEvents[] = $event;
        }

        return response()->json(['message' => 'Event created successfully!', 'event' => $event], 201);
    }
  
}


