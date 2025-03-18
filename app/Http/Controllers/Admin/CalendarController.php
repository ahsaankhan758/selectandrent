<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Event::all()->map(function ($booking) {
            return [
                'title' => $booking->title,
                'category' => $booking->category,
                'start' => $booking->start,
                'end' => $booking->end,
            ];
        });
        return view('admin.calendar.calendar', compact('events'));
        
    }
}
