<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Notifications\test;
use App\Events\NewEventAdded;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use App\Notifications\NewEventNotification;
use Illuminate\Support\Facades\Notification;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate('10');
        return view('admin.events.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        
        $data = $request->validated();
        
        
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('events', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;
        Event::create($data);
        $users = User::where('user_type','user')->get();
        Notification::send($users,new NewEventNotification());
        $message = "A New Event is added go to events now!";
        //event(new NewEventAdded($message));
        Broadcast(new NewEventAdded($message));
        
        return to_route('admin.events.create')->with('add_event_status','Your Event Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
