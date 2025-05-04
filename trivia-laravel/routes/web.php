<?php

use Illuminate\Support\Facades\Route;

# GameController Pub_Trivia 
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/games/{gameId}/join', [GameController::class, 'joinGame']);
