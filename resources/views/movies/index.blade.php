@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header" style="font-size: 40px">Movies</h1>

                    <div class="card-body">
                        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3"><h1 style="color: brown; font-size: larger">Create Movie</h1></a>
                        @if ($movies->count() > 0)
                            <ul class="list-group">
                                @foreach ($movies as $movie)
                                    <li class="list-group-item" style="margin-top: 30px">
                                        <a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
                                        <div class="float-right">
                                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this movies?')">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        @else
                            <p>No movies found.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
