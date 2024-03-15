@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 style="color: brown; font-size: larger">Create Room</h1></div>

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
                        <form method="POST" action="{{ route('cinemaRooms.store') }}">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="name">Room Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="count">Count</label>
                                <input type="number" name="count" id="count" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="row_count">Row Count</label>
                                <input type="number" name="row_count" id="row_count" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary"><h1 style="color: brown; font-size: larger">Create</h1></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
