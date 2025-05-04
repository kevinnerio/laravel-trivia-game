<?php

use Illuminate\Support\Facades\Route;

# GamePlayController Pub_Trivia 
use App\Http\Controllers\GamePlayController;

Route::get('/', function () {
    return view('home');
});

Route::post('/games/{gameId}/join', [GamePlayController::class, 'joinGame']);

# Testing routes 
Route::get('/game/start', [GamePlayController::class, 'start'])->name('game.start');
Route::get('/game/{game}/question', [GamePlayController::class, 'showQuestion'])->name('game.question');
Route::post('/game/{game}/answer', [GamePlayController::class, 'submitAnswer'])->name('game.submitAnswer');
Route::get('/game/{game}/result', [GamePlayController::class, 'result'])->name('game.result');

# SubmitAnswer
#Route::post('/game/{game}/answer', [GamePlayController::class, 'submitAnswer'])->name('game.submitAnswer');
