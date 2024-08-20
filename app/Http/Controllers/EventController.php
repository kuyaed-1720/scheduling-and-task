<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('schedule.index', compact('events'));
    }

    public function saveEvent(Request $request)
    {
        $event = new Events();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();

        return response()->json(['success' => true]);
    }
}
