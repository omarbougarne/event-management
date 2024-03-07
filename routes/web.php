<?php

use App\Http\Controllers\AttendingEventController;
use App\Http\Controllers\AttentingSystemController;
use App\Http\Controllers\DeleteCommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventIndexController;
use App\Http\Controllers\EventShowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreCommentController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/e', EventIndexController::class)->name('eventIndex');
Route::get('/e/{id}', EventShowController::class)->name('eventShow');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/events', EventController::class);


    Route::get('/attendind-events', AttendingEventController::class)->name('attendingEvents');

    Route::post('/events-attending/{id}', AttentingSystemController::class)->name('events.attending');

    Route::post('/events/{id}/comments', StoreCommentController::class)->name('events.comments');
    Route::delete('/events/{id}/comments/{comment}', DeleteCommentController::class)->name('events.comments.destroy');
});

require __DIR__ . '/auth.php';
