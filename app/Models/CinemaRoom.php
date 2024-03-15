<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CinemaRoom extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'count',
        'row_count'
    ];

    public function screenings()
    {
        return $this->hasMany(Screening::class, 'room_id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'room_id');
    }

}
