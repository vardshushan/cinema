@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $movie->title }}</div>

                    <div class="card-body">
                        <p><strong>Duration:</strong> {{ $movie->duration }}</p>
                        <p><strong>Created At:</strong> {{ $movie->created_at->format('d/m/Y H:i:s') }}</p>
                        <p><strong>Updated At:</strong> {{ $movie->updated_at->format('d/m/Y H:i:s') }}</p>
                        <img src="{{ asset('storage/' . $movie->poster) }}" style="height: 200px; width: 200px" alt="Poster">

                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
