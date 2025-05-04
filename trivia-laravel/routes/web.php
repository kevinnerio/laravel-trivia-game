<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GamePlayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# Testing my routes -- again
Route::post('/games/{gameId}/join', [GamePlayController::class, 'joinGame']);

# Testing routes 
Route::get('/game/start', [GamePlayController::class, 'start'])->name('game.start');
Route::get('/game/{game}/question', [GamePlayController::class, 'showQuestion'])->name('game.question');
Route::post('/game/{game}/answer', [GamePlayController::class, 'submitAnswer'])->name('game.submitAnswer');
Route::get('/game/{game}/result', [GamePlayController::class, 'result'])->name('game.result');

# SubmitAnswer
#Route::post('/game/{game}/answer', [GamePlayController::class, 'submitAnswer'])->name('game.submitAnswer');

require __DIR__.'/auth.php';
