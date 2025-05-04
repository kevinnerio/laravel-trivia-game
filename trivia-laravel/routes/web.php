<?php

use Illuminate\Support\Facades\Route;

# GameController Pub_Trivia 
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/games/{gameId}/join', [GameController::class, 'joinGame']);

# Testing routes 
Route::get('/game/start', [GameController::class, 'start'])->name('game.start');
Route::get('/game/{game}/question', [GameController::class, 'showQuestion'])->name('game.question');
Route::post('/game/{game}/answer', [GameController::class, 'submitAnswer'])->name('game.answer');
Route::get('/game/{game}/result', [GameController::class, 'result'])->name('game.result');
