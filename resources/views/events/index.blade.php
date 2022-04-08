@extends('layouts.app')

@section('content')
    <div class="container p-2">
        <h3 class="text-center">Event List</h3>
    </div>

    <div class="container p-2">
    <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Place</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Delete Event?</th>
                    <th scope="col">Update Event?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>
                        <a href="/events/{{ $event->id }}" class="text-decoration-none">
                        {{ $event->name }}</a>
                    </td>
                    <td>{{ $event->place }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->time }}</td>
                    <td>
                        <form action="/events/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                    <a href="/events/update/{{ $event->id }}" type="button" class="text-decoration-none btn btn-primary">
                        Update
                    </a>
                    </td>
                
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    


@endsection

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
