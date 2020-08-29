<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;
use App\Http\Resources\EventCollection as EventCollectionResource;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EventCollectionResource(Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Event();
        $post->event_name = $request->event_name;
        $post->date = $request->date;
        $post->detail_event = $request->detail_event;
        $post->event_duration = $request->event_duration;
        $post->event_type = $request->event_type;
        $post->save();

        return new EventResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new EventResource(Event::FindOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Event::findOrFail($id);
        $post->event_name = $request->event_name;
        $post->date = $request->date;
        $post->detail_event = $request->detail_event;
        $post->event_duration = $request->event_duration;
        $post->event_type = $request->event_type;
        $post->save();

        return new EventResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Event::findOrFail($id);
        $post->delete();

        return new EventResource($post);
    }
}
