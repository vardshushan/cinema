<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookASeatRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookASeat(BookASeatRequest $request): void
    {
        try {
            DB::transaction(function () use ($request) {
                Booking::create([
                    'screening_id' => $request->screeningId,
                    'seat_id' => $request->seatId,
                    'user_id' => Auth::user()->id,
                ]);

                return response()->json(['message' => 'Seat booked successfully'], 200);
            });
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
