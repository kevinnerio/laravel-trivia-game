<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamePlayController extends Controller
{

    # Needed in order to add user(s) to game. 
    public function joinGame(Request $request, $gameId)
    {
        $game = Game::findOrFail($gameId);
        $player = Player::firstOrCreate(['email' => $request->email]);

        $game->players()->attach($player->id);

        return response()->json(['message' => 'Joined game!']);
    }

    # Needed in order to start a game. 
    public function startGame($gameId)
    {
        $game = Game::findOrFail($gameId);
        $game->status = 'started';
        $game->save();

        return response()->json(['message' => 'Game started!']);
    }
}
