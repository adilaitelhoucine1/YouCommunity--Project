<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/addevent', [UserController::class, 'AddEvent']);
Route::get('/ShowMyEvents', [UserController::class, 'ShowMyEventsView']);
Route::get('/my-events', [UserController::class, 'ShowMyEventsView'])->name('events.my');
Route::get('/events/{event}/edit', [UserController::class, 'edit'])->name('events.edit');
Route::delete('/events/delete/{event}', [UserController::class, 'destroy'])->name('events.delete');


require __DIR__.'/auth.php';
