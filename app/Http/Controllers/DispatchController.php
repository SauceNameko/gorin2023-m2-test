<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dispatches = Dispatch::get();
        return view("dispatch_index", compact("dispatches"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $events = Event::get();
        $workers = Worker::get();
        return view("dispatch_create", compact("events", "workers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $event = Event::where("name", $request->event_info)->first();
        $worker = Worker::where("name", $request->worker_info)->first();
        $request->validate([
            "event_info" => "required",
            "worker_info" => "required",
            "memo" => "required",
        ]);
        Dispatch::create([
            "event-id" => $event->id,
            "worker-id" => $worker->id,
            "approval" => false,
            "memo" => $request->memo
        ]);
        return redirect(route("dispatch_create"))->with(["message" => "派遣情報が登録されました"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dispatch = Dispatch::find($id);
        $dispatch->delete();
        return redirect(route("dispatch_index"));
    }
}
