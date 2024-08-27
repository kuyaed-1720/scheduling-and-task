<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
	public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function getEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'start' => 'required|max:255',
            'end' => 'max:255',
        ]);

        Event::create([
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('events'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255',
            'start' => 'required|max:255',
            'end' => 'max:255',
        ]);

        $event->update([
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

}
