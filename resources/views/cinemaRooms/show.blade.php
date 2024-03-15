@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $cinemaRoom->name }}</div>

                    <div class="card-body">
                        <p><strong>count:</strong> {{ $cinemaRoom->count }}</p>
                        <p><strong>Created At:</strong> {{ $cinemaRoom->created_at->format('d/m/Y H:i:s') }}</p>
                        <p><strong>Updated At:</strong> {{ $cinemaRoom->updated_at->format('d/m/Y H:i:s') }}</p>

                        <a href="{{ route('cinemaRooms.edit', $cinemaRoom->id) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('cinemaRooms.destroy', $cinemaRoom->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
