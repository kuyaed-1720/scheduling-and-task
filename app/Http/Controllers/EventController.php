<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Event;

// class EventController extends Controller
// {
// 	public function index()
//     {
//         $events = Event::all();
//         return view('events.index', compact('events'));
//     }

//     public function getEvents()
//     {
//         $events = Event::all();
//         return response()->json($events);
//     }


//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required|max:255',
//             'start' => 'required|max:255',
//             'end' => 'max:255',
//         ]);

//         Event::create([
//             'title' => $request->input('title'),
//             'start' => $request->input('start'),
//             'end' => $request->input('end'),
//         ]);

//         return redirect()->route('events.index')->with('success', 'Event created successfully!');
//     }

//     public function edit(Event $event)
//     {
//         return view('events.edit', compact('events'));
//     }

//     public function update(Request $request, Event $event)
//     {
//         $request->validate([
//             'title' => 'required|max:255',
//             'start' => 'required|max:255',
//             'end' => 'max:255',
//         ]);

//         $event->update([
//             'title' => $request->input('title'),
//             'start' => $request->input('start'),
//             'end' => $request->input('end'),
//         ]);

//         return redirect()->route('events.index')->with('success', 'Event updated successfully!');
//     }

//     public function destroy(Event $event)
//     {
//         $event->delete();

//         return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
//     }

// }
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
  
class EventController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
        $events = Event::all(['id', 'title', 'start', 'end']);
        return view('events.index',['events'=> $events]);
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request): JsonResponse
    {
 
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
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
}