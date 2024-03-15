<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomsRequest;
use App\Models\CinemaRoom;
use App\Models\Seat;

class CinemaRoomController extends Controller
{
    private function createSeats($totalSeats, $rowCount, $roomId)
    {
        Seat::query()->where('room_id', $roomId)->delete();
        $seatsPerRow = floor($totalSeats / $rowCount);
        $remainingSeats = $totalSeats % $rowCount;

        $seatNumber = 1;
        for ($i = 1; $i <= $rowCount; $i++) {
            $seatsToAdd = $seatsPerRow;
            if ($remainingSeats > 0) {
                $seatsToAdd++;
                $remainingSeats--;
            }
            for ($j = 1; $j <= $seatsToAdd; $j++) {
                Seat::create([
                    'room_id' => $roomId,
                    'row_number' => $i,
                    'seat_number' => $seatNumber,
                    'availability' => 1
                ]);
                $seatNumber++;
            }
        }
    }

    public function index()
    {
        $cinemaRooms = CinemaRoom::all();
        return view('cinemaRooms.index', compact('cinemaRooms'));
    }

    public function create()
    {
        return view('cinemaRooms.create');
    }

    public function store(RoomsRequest $request)
    {
        $room = CinemaRoom::create([
            'name' => $request->name,
            'count' => $request->count,
            'row_count' => $request->row_count
        ]);

        $totalSeats = $request->count;
        $rowCount = $request->row_count;
        $this->createSeats($totalSeats, $rowCount, $room->id);

        return redirect()->route('cinemaRooms.index')
            ->with('success', 'CinemaRooms created successfully with seats.');
    }

    public function show(CinemaRoom $cinemaRoom)
    {
        return view('cinemaRooms.show', compact('cinemaRoom'));
    }

    public function edit(CinemaRoom $cinemaRoom)
    {
        return view('cinemaRooms.edit', compact('cinemaRoom'));
    }

    public function update(RoomsRequest $request, CinemaRoom $cinemaRoom)
    {
        $cinemaRoom->update($request->all());
        $totalSeats = $request->count;
        $rowCount = $request->row_count;
        if ($cinemaRoom->row_count != $rowCount || $totalSeats != $cinemaRoom->count) {
            $this->createSeats($totalSeats, $rowCount, $cinemaRoom->id);
        }

        return redirect()->route('cinemaRooms.index')
            ->with('success', 'CinemaRooms updated successfully');
    }

    public function destroy(CinemaRoom $cinemaRoom)
    {
        $cinemaRoom->delete();
        return redirect()->route('cinemaRooms.index')
            ->with('success', 'CinemaRooms deleted successfully');
    }
}
