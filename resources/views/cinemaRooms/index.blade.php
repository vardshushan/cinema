@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header" style="font-size: 40px">Cinema Rooms</h1>

                    <div class="card-body">
                        <a href="{{ route('cinemaRooms.create') }}" class="btn btn-primary mb-3"><h1 style="color: brown; font-size: larger">Create Room</h1></a>
                        @if ($cinemaRooms->count() > 0)
                            <ul class="list-group">
                                @foreach ($cinemaRooms as $room)
                                    <li class="list-group-item" style="margin-top: 30px">
                                        <a href="{{ route('cinemaRooms.show', $room->id) }}">{{ $room->name }}</a>
                                        <div class="float-right">
                                            <a href="{{ route('cinemaRooms.edit', $room->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('cinemaRooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        @else
                            <p>No rooms found.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
