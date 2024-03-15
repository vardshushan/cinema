<?php

use App\Http\Controllers\Admin\CinemaRoomController;
use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\ScreeningController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth', 'user')->group(function () {
    Route::get('/users/rooms', [RoomsController::class, 'showRooms'])->name('rooms.show');
    Route::get('/rooms/{roomId}', [RoomsController::class, 'showMovies'])->name('rooms.movies');
    Route::get('/rooms-seats/{roomId}/{screeningId}', [RoomsController::class, 'showSeats'])->name('rooms.seats');
    Route::post('/book', [BookingController::class, 'bookASeat'])->name('book.seat');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::resource('cinemaRooms', CinemaRoomController::class);
    Route::resource('movies', MoviesController::class);
    Route::get('/admin/movies-rooms', [ScreeningController::class, 'index'])->name('admin.movies-rooms.index');
    Route::post('/admin/movies-rooms', [ScreeningController::class, 'updateScreenings'])->name('admin.movies-rooms.update');
});

require __DIR__ . '/auth.php';

Route::fallback(function () {
    return view('welcome');
});
