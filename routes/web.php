<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/ShowMyEvents', [UserController::class, 'ShowMyEventsView'])->name('events.myevents');
  
    Route::post('/addevent', [UserController::class, 'AddEvent'])->name('events.add');
    
   
    Route::put('/events/{event}', [UserController::class, 'update'])->name('events.update');
   
    Route::delete('/events/{event}', [UserController::class, 'destroy'])->name('events.delete');

    Route::patch('/events/{event}/changeStatus', [UserController::class, 'changeStatus'])
        ->name('events.change-status');

    Route::get('/events/{event}/ShowDetails', [UserController::class, 'ShowDetailsView'])
        ->name('events.showDetails');
});

require __DIR__.'/auth.php';
