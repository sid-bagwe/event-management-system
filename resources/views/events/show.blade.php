@extends('layouts.app')

@section('content')
    <div class="container p-2">
        <div class="card p-2">
            <h4 class="text-center card-title">{{$event->name}}</h4>
            <h4 class="card-title">Creator: {{$created_by->name}}</h4>
            <h4 class="card-title text-muted">{{$event->place}}</h4>
            <h4 class="card-title text-muted">{{$event->date}}</h4>
            <h4 class="card-title text-muted">{{$event->time}}</h4>
            <br>
            <h5 class="card-title text-muted">Invited Users</h5>
            <ul>
                @foreach($invited_users as $user)
                    <li>{{$user->name}}</li>
                @endforeach
            </ul>
        </div>
        
    </div>
@endsection
