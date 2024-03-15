@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 style="color: brown; font-size: larger">Create Movie</h1></div>

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

                        <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="poster">Poster</label>
                                <input type="file" name="poster" id="poster" class="form-control-file" required>
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary"><h1 style="color: brown"> Create </h1></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
