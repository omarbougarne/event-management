<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $event = Event::findOrFail($id);
        $attending = $event->attendings()->where('user_id', auth()->id())->first();

        return view('eventsShow', compact('event', 'attending'));
    }
}
