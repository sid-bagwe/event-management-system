@extends('layouts.app')

@section('content')

    @if (!empty($event))
        <div class="container p-2">
            <h3 class="text-center">Update Event</h3>
        </div>

        <div class="container border" style="margin: auto; margin-top: 1%; margin-bottom: 2%; padding: 1.75%; border-radius: 16px; width: 75%">
            <form method="POST" action="/events/{{$event->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Event Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$event->name}}" placeholder="Enter the Name">
                </div>
                <br>
                <div class="form-group">
                    <label for="place">Place</label>
                    <input type="text" class="form-control" id="place" name="place" value="{{$event->place}}" placeholder="Enter the Place">
                </div>
                <br>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$event->date}}" placeholder="Enter the Date">
                </div>
                <br>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" value="{{$event->time}}" placeholder="Enter the Time">
                </div>
                <br>
                <div class="form-group">
                    <label for="invited-users">Invite Users</label>
                    <select class="form-select" multiple aria-label="multiple select example" id="invited-users" name="invited_users[]">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-dark" name="submit">Submit</button>
            </form>

	    </div>
    @else
        <div class="container p-2">
            <h3 class="text-center">Create Event</h3>
        </div>

        <div class="container border" style="margin: auto; margin-top: 1%; margin-bottom: 2%; padding: 1.75%; border-radius: 16px; width: 75%">
            <form method="POST" action="/events" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Event Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the Name">
                </div>
                <br>
                <div class="form-group">
                    <label for="place">Place</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Enter the Place">
                </div>
                <br>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter the Date">
                </div>
                <br>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" placeholder="Enter the Time">
                </div>
                <br>
                <div class="form-group">
                    <label for="invited-users">Invite Users</label>
                    <select class="form-select" multiple aria-label="multiple select example" id="invited-users" name="invited_users[]">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-dark" name="submit">Submit</button>
            </form>

	    </div>
    @endif
    

	

@endsection
