@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.movies-rooms.update') }}" method="post">
        @csrf
        <label for="room">Select Room:</label>
        <select name="room" id="room">
            @foreach($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select>

        <label for="movie">Select Movie:</label>
        <select name="movie" id="movie">
            @foreach($movies as $movie)
                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
            @endforeach
        </select>

        <label for="start_time">Start Time:</label>
        <input type="datetime-local" id="start_time" name="start_time" required min="{{ now()->toDateTimeLocalString() }}">

        <button type="submit">Save</button>
    </form>

    <script>
        document.getElementById('start_time').min = new Date().toISOString().slice(0,16);
    </script>
@endsection
