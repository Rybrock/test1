<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeveloperRequest;
use App\Models\Developer;
use App\Models\Game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    // List developers.
    public function index()
    {
        try {
            $developers = Developer::all();
            return response()->json($developers);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve developers.'], 500);
        }
    }

    // Store
    public function store(StoreDeveloperRequest $request)
    {
        try {
            $developer = Developer::create($request->validated());
            return response()->json($developer, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create developer.'], 500);
        }
    }

    // Display/Show
    public function show($id)
    {
        try {
            $developer = Developer::findOrFail($id);
            return response()->json($developer);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Developer not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve developer.'], 500);
        }
    }

    // Update
    public function update(StoreDeveloperRequest $request, $id)
    {
        try {
            $developer = Developer::findOrFail($id);
            $developer->update($request->validated());
            return response()->json($developer);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Developer not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update developer.'], 500);
        }
    }

    // Delete
    public function destroy($id)
    {
        try {
            $developer = Developer::findOrFail($id);
            $developer->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Developer not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete developer.'], 500);
        }
    }

    // Show a game
    public function showGame($developer_id, $game_id)
    {
        try {
            $developer = Developer::findOrFail($developer_id);
            $game = Game::where('developer_id', $developer_id)->findOrFail($game_id);
            return response()->json($game);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Game or Developer not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve game.'], 500);
        }
    }

    // Delete a game by developer ID and game ID
    public function destroyGame($developer_id, $game_id)
    {
        try {
            $developer = Developer::findOrFail($developer_id);
            $game = Game::where('developer_id', $developer_id)->findOrFail($game_id);
            $game->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Game or Developer not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete game.'], 500);
        }
    }
}
