<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class RoomsController extends Controller
{
    public function showRooms(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $rooms = [
            'room' => CinemaRoom::all()
        ];
        return view('users.rooms', compact('rooms'));
    }

    public function showMovies($roomId)
    {
        $room = CinemaRoom::query()->findOrFail($roomId);
        $screenings = $room->screenings()
            ->with('movie')
            ->where('end_time', '>=', Carbon::now()->addHours(4))
            ->get();
        return view('users.movies', compact('room', 'screenings'));
    }

    public function showSeats($roomId, $screeningId): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $room = CinemaRoom::with(['screenings', 'seats'])->findOrFail($roomId);
        return view('users.seats', compact('room', 'screeningId'));
    }

}
