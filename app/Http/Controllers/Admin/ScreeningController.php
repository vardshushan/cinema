<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScreeningRequest;
use App\Models\Screening;
use App\Models\Movie;
use App\Models\CinemaRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ScreeningController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $rooms = CinemaRoom::all();

        return view('screenings.movies-rooms', compact('movies', 'rooms'));
    }

    public function updateScreenings(ScreeningRequest $request)
    {
        $movie = Movie::where('id', $request->movie)->first();
        $roomWithScreenings = CinemaRoom::with('screenings')->where('id', $request->room)->first();
        $endTime = Carbon::parse($request->start_time)->addMinutes($movie->duration);
        foreach ($roomWithScreenings->screenings as $screening) {
            $screeningStartTime = Carbon::parse($screening->start_time);
            $screeningEndTime = Carbon::parse($screening->end_time);

            if (
                $request->start_time > $screeningStartTime && Carbon::parse($request->start_time)->addMinutes($movie->duration) < $screeningEndTime
            ) {
                $validator = Validator::make([], []);
                $validator->errors()->add('screening_overlap', 'Screening already exists in the requested room within the specified time range.');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        Screening::create([
            'room_id' => $request->room,
            'movie_id' => $request->movie,
            'start_time' => $request->start_time,
            'end_time' => $endTime,
        ]);

        return view('welcome');
    }
}
