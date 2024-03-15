@extends('layouts.app')

@section('content')

    <style>
        .room-square {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            margin: 10px;
            display: inline-block;
            text-align: center;
            line-height: 100px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="rooms-container">
                    @foreach($rooms['room'] as $room)
                        <div class="room-square">
                            <a href="{{ route('rooms.movies', ['roomId' => $room->id]) }}">{{ $room->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

