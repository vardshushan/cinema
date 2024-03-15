<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMoviesRequest;
use App\Models\Movie;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(CreateMoviesRequest $request)
    {

        $posterPath = $request->file('poster')->store('posters', 'public');
        Movie::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'poster' => $posterPath, // Store the path to the uploaded poster
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => [
                'required',
                'max:255',
                Rule::unique('movies')->ignore($movie->id)->where(function ($query) use ($request) {
                    return $query->where('title', $request->title);
                }),
            ],
            'duration' => 'required|integer|min:1',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the poster image
        ]);
        $posterPath = $request->file('poster')->store('posters', 'public');


        $movie->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'poster' => $posterPath,
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully');
    }
}
