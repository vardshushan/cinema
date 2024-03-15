@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 style="color: brown; font-size: larger">Edit Room</h1></div>
                    <div class="alert" id="alertDiv" style="display: none;"></div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('cinemaRooms.update', $cinemaRoom->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Room Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $cinemaRoom->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="count">Count</label>
                                <input type="number" name="count" id="count" class="form-control" value="{{ $cinemaRoom->count }}" required>
                            </div>

                            <div class="form-group">
                                <label for="row_count">Row Count</label>
                                <input type="number" name="row_count" id="row_count" class="form-control" value="{{ $cinemaRoom->row_count }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary"  onclick="return confirm('After update Rooms rows and count all booking should removed. Are you sure?')"><h1 style="color: brown; font-size: larger">Update</h1></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
