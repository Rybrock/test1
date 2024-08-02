<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;

class GameController extends Controller
{
    // list of games.
    public function index()
    {
        $games = Game::with('developer', 'subscribers')->get();
        return response()->json($games);
    }

    // Store
    public function store(StoreGameRequest $request)
    {
        $game = Game::create($request->validated());
        return response()->json($game->load('developer', 'subscribers'), 201);
    }

    // Display/Show the specified game.
    public function show($id)
    {
        $game = Game::with('developer', 'subscribers')->findOrFail($id);
        return response()->json($game);
    }

    // Update
    public function update(StoreGameRequest $request, $id)
    {
        $game = Game::findOrFail($id);

        $game->update($request->validated());

        return response()->json($game->load('developer', 'subscribers'));
    }

    // Remove/Delete
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return response()->json(null, 204);
    }
}
