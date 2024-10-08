<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::get();
        return view("event_index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("event_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required",
            "place" => "required",
            "event_date" => "required",
        ]);
        Event::create([
            "name" => $request->name,
            "place" => $request->place,
            "event-date" => $request->event_date
        ]);
        return redirect(route("event_create"))->with(["message" => "イベント情報が登録されました"]);
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
        $event = Event::find($id);
        return view("event_edit", compact("event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $event = Event::find($id);
        $request->validate([
            "name" => "required",
            "place" => "required",
            "event_date" => "required",
        ]);
        $event->update([
            "name" => $request->name,
            "place" => $request->place,
            "event-date" => $request->event_date
        ]);
        return redirect(route("event_edit",["id"=>$event->id]))->with(["message" => "イベント情報が編集されました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return redirect(route("event_index"));
    }
}
