@extends('layouts.app')

@section('content')
    <style>
        .movie-square {
            width: 100%; /* Make it full width */
            display: inline-block; /* Display elements inline */
            vertical-align: top; /* Align to the top */
            margin-bottom: 20px; /* Added margin for spacing */
        }

        .poster-container {
            width: 50%; /* Set width for poster container */
            display: inline-block; /* Display elements inline */
            position: relative;
        }

        .poster {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay-text {
            width: 50%; /* Set width for overlay text container */
            display: inline-block; /* Display elements inline */
            vertical-align: top; /* Align to the top */
            background-color: rgb(255 255 255 / 70%);
            color: #8f2323;
            padding: 10px;
            border-radius: 5px; /* Added border radius for styling */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Added box shadow for better visibility */
        }

        .overlay-text h3,
        .overlay-text p {
            margin: 0;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="rooms-container">
                    <h1 style="color: #1a202c; font-size: 30px">Room: {{$room->name}}</h1>
                    @foreach ($screenings as $screening)
                        <a href="{{ route('rooms.seats', ['roomId' => $room->id, 'screeningId' => $screening->id]) }}">
                            <div class="movie-square" id="{{ $loop->iteration }}">
                                <div class="poster-container">
                                    <!-- Poster Image -->
                                    <img src="{{ asset('storage/' . $screening->movie->poster) }}" class="poster"
                                         alt="Poster">
                                </div>
                                <!-- Overlay Text -->
                                <div class="overlay-text">
                                    <h3>Screening {{ $loop->iteration }}</h3>
                                    <p>Movie Title: {{ $screening->movie->title }}</p>
                                    <p>Start Time: {{ $screening->start_time }}</p>
                                    <p>End Time: {{ $screening->end_time }}</p>
                                    <!-- Add other information as needed -->
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
