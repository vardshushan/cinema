@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 style="color: brown; font-size: larger">Edit Movie</h1></div>

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

                        <form method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- This line is necessary for Laravel to recognize the PUT method -->

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $movie->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="poster">Poster</label>
                                <input type="file" name="poster" id="poster" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control" value="{{ $movie->duration }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary"><h1 style="color: brown"> Update </h1></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
