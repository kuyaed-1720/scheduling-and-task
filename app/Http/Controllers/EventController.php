<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Task;

use DateTimeZone;
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
        if ($request->ajax()) {
            
            $taskdata = Task::whereDate('due', '>=', $request->due)
                        ->get(['id', 'title', 'description', 'priority', 'due']);
                        return response()->json($taskdata);
        }
        $tasks = Task:: all(['id', 'title', 'description', 'priority', 'due']);
        return view('events.index',['events'=> $events, 'tasks'=> $tasks]);
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
                'end' => 'required|max:255',
            ]);
                if ($this->isWeekend($request->input('start'))) {
                    return back();
                }
                $start = $request->input('start')." ". date('d/m/Y H:i:s');
                $end = $request->input('end')." ". date('d/m/Y H:i:s');
            Event::create([
                'title' => $request->input('title'),
                'start' => $start,
                'end' => $end,
            ]);
    
            return redirect()->route('events.index')->with('success', 'Event created successfully!');
        }

        public function isWeekend($date){
            $input = date_create_from_format("d/m/Y", $date, new DateTimeZone("Asia/Manila"));
            $day = $input->format('d/m/Y');
            return $day >=0;
        }
}