<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return Subscriber::with('games')->get();
    }

    public function show($id)
    {
        return Subscriber::with('games')->findOrFail($id);
    }

    public function store(StoreSubscriberRequest $request)
    {
        $validatedData = $request->validated();

        $subscriber = Subscriber::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'location' => $validatedData['location'],
        ]);

        if (!empty($validatedData['games'])) {
            $subscriber->games()->attach($validatedData['games']);
        }

        return response()->json($subscriber->load('games'), 201);
    }

    public function update(Request $request, $id)
    {
        $subscriber = Subscriber::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:subscribers,email,' . $subscriber->id,
            'address' => 'string|max:255',
            'location' => 'string|max:255',
            'games' => 'array',
            'games.*' => 'exists:games,id',
        ]);

        $subscriber->update($validatedData);

        if (!empty($validatedData['games'])) {
            $subscriber->games()->sync($validatedData['games']);
        }

        return response()->json($subscriber->load('games'), 200);
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return response()->json(null, 204);
    }

    public function addGames(Request $request, $id)
    {
        $validatedData = $request->validate([
            'games' => 'required|array',
            'games.*' => 'exists:games,id',
        ]);

        $subscriber = Subscriber::findOrFail($id);
        $subscriber->games()->attach($validatedData['games']);

        return response()->json($subscriber->load('games'), 200);
    }

    public function removeGame($id, $game_id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->games()->detach($game_id);

        return response()->json(null, 204);
    }
}
