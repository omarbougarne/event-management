<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = Event::all()->sortBy('desc');
        return view('eventIndex', compact('events'));
    }
}
