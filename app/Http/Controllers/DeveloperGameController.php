<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperGameController extends Controller
{
    public function index($developer_id)
    {
        $developer = Developer::findOrFail($developer_id);
        $games = $developer->games;
        return response()->json($games);
    }

    public function store(Request $request, $developer_id)
    {
        $developer = Developer::findOrFail($developer_id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
        ]);

        $game = $developer->games()->create($validatedData);

        return response()->json([
            'message' => 'Game created successfully',
            'game' => $game
        ], 201);
    }

    public function show($developer_id, $game_id)
    {
        $developer = Developer::findOrFail($developer_id);
        $game = $developer->games()->findOrFail($game_id);
        return response()->json($game);
    }

    public function update(Request $request, $developer_id, $game_id)
    {
        $developer = Developer::findOrFail($developer_id);
        $game = $developer->games()->findOrFail($game_id);

        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'release_date' => 'sometimes|date',
        ]);

        $game->update($validatedData);

        return response()->json([
            'message' => 'Game updated successfully',
            'game' => $game
        ], 200);
    }

    public function destroy($developer_id, $game_id)
    {
        $developer = Developer::findOrFail($developer_id);
        $game = $developer->games()->findOrFail($game_id);

        $game->delete();

        return response()->json([
            'message' => 'Game deleted successfully'
        ], 200);
    }
}
