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
                'start' => Carbon::parse($event->start)->toIso8601String(),
                'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null,
                'className' => [$event->className],
                'extendedProps' => [
                    'location' => $event->location,
                ],
            ];

        });
        
       
        return response()->json($events);
    }
       public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'required|string',
                'category' => 'required|string',
                'start' => 'required|date',
                'end' => 'nullable|date',
                'location' => 'required',
            ]);

            $event = Event::create([
                'title' => $validated['title'],
                'start' => $validated['start'],
                'end' => $validated['end'] ?? $validated['start'],
                'className' => $validated['category'],
                'location' => $validated['location']
            ]);

            return response()->json([
                'message' => 'Event saved successfully',
                'event' => $event
            ]);
        }
    public function update(Request $request){
        $validated =  $request->validate([
            'title' => 'required',
            'newTitle' => 'required',
            'location' => 'required'
        ]);
        $selectedTitle = Event::where('title', $validated['title'])->first();
        $selectedTitle->title = $validated['newTitle'];
        $selectedTitle->location = $validated['location'];
        $selectedTitle->update();

        return response()->json([
            'message' => 'Event Updated Successfully',
        ]);
    }
    public function delete(Request $request){
        $validated =  $request->validate([
            'title' => 'required'
        ]);
        $selectedTitle = Event::where('title', $validated['title']);
        $selectedTitle->delete();

        return response()->json([
            'message' => 'Event Deleted Successfully',
        ]);
    }
}


