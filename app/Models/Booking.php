<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Booking extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'screening_id',
        'seat_id',
        'user_id',
    ];

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
