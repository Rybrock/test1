<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // list of games.
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    // Store
    public function store(Request $request)
    {
        $game = Game::create($request->all());
        return response()->json($game, 201);
    }

    // Display/Show the specified game.
    public function show($id)
    {
        $game = Game::findOrFail($id);
        return response()->json($game);
    }

    // Update
    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->all());
        return response()->json($game);
    }

    // Remove/Delete
    public function destroy($id)
    {
        Game::destroy($id);
        return response()->json(null, 204);
    }
}
