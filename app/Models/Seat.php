<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'room_id',
        'row_number',
        'seat_number',
        'availability',
    ];

    public function room()
    {
        return $this->belongsTo(CinemaRoom::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
