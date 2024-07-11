<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // list of games.
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    // Store
    public function store(StoreGameRequest $request)
    {
        $game = Game::create($request->validated());
        return response()->json($game, 201);
    }

    // Display/Show the specified game.
    public function show($id)
    {
        $game = Game::findOrFail($id);
        return response()->json($game);
    }

    // Update
    public function update(StoreGameRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        $request->validate([
            'developer_id' => 'required|exists:developers,id'
        ]);
        $game->update($request->validated());
        return response()->json($game);
    }

    // Remove/Delete
    public function destroy($id)
    {
        Game::destroy($id);
        return response()->json(null, 204);
    }
}
