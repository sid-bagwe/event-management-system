<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    //
    public function index() {

        $events = Event::all();

        return view('events.index', ['events'=> $events]);

        // return Event::all();
    }

    public function show($id) {
        $event = Event::find($id);
        $invited_users = User::whereIn('id', $event->invited_users)->get();
        $created_by = User::find($event->created_by);

        return view('events.show', ['event' => $event, 'invited_users' => $invited_users, 'created_by' => $created_by]);
    }

    public function create() {
        $users = User::all();
        return view('events.create', ['event' => null, 'users'=> $users]);
    }

    public function store() {
        // error_log(request('name'));
        // error_log(request('place'));
        // error_log(request('date'));
        // error_log(request('time'));
        $event = new Event();
        $event->name = request('name');
        $event->place = request('place');
        $event->date = request('date');
        $event->time = request('time');
        $event->invited_users = request('invited_users');

        $event->save();
        return redirect('/events');
    }

    public function destroy($id) {
        $event = Event::findorFail($id);
        $event->delete();

        return redirect('/events');
    }

    public function invitations($id) {
        $events = Event::whereJsonContains('invited_users', $id)->get();
        return view('events.index', ['events'=> $events]);

    }

    public function creations($id) {
        $events = Event::where('created_by', $id)->get();
        return view('events.index', ['events'=> $events]);
    }

    public function update($id) {
        $event = Event::find($id);
        $users = User::all();
        // return $event;
        return view('events.create', ['event' => $event, 'users' => $users]);
    }

    public function updateEvent($id) {

        $event = Event::find($id);
        $event->name = request('name');
        $event->place = request('place');
        $event->date = request('date');
        $event->time = request('time');
        $event->invited_users = request('invited_users');

        $event->save();
        return redirect('/events');

    }
}
