<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dispatch;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(Request $request)
    {
        $worker_id = $request->query("worker_id");
        $date = $request->query("date");
        $place = $request->query("place");
        $title = $request->query("title");
        if (!$worker_id) {
            return response()->json(["error" => "bad_request"], 400);
        }
        $dispatches = Dispatch::where("worker-id", $worker_id)->get();
        $events = [];
        $results = [];
        // Event::whereIn("id", $dispatches);
        foreach ($dispatches as $dispatch) {
            $events[] = Event::find($dispatch->{"event-id"});
        }
        foreach ($events as $event) {
            $query = Event::query();
            if ($date) {
                $query->where("event-date", $date);
            }
            if ($place) {
                $query->where("place", $place);
            }
            if ($title) {
                $query->where("name", 'like', '%' . $title . '%');
            }
            $results[] = $query->find($event->id);
        }

        return response()->json($results);
    }
    public function store(Request $request)
    {
        $request->validate([
            "event_id" => "required",
            "worker_id" => "required",
        ]);
        $event_id = $request->event_id;
        $worker_id = $request->worker_id;
        $dispatches = Dispatch::where("event-id", $event_id)->where("worker-id", $worker_id)->get();
        if($dispatches->isEmpty()){
        return response()->json(["error"=>"bad_request"],400);
        }
        foreach ($dispatches as $dispatch) {
            $dispatch->update([
                "approval" => true
            ]);
        }
        return response()->json($dispatch);
    }
}
