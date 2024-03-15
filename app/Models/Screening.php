<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Screening extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['room_id', 'movie_id', 'start_time', 'end_time'];


    public function room()
    {
        return $this->belongsTo(CinemaRoom::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
