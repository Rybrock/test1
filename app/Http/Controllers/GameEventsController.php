<?php

namespace App\Http\Controllers;

use App\Models\GameEvents;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class GameEventsController extends Controller
{
    /**
     * Store a newly created game event in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'platforms' => 'required|string',
            'event_date' => 'required|date',
            'game_ids' => 'required|array',
            'game_ids.*' => 'exists:games,id',
            'developer_ids' => 'required|array',
            'developer_ids.*' => 'exists:developers,id',
            'subscriber_ids' => 'nullable|array',
            'subscriber_ids.*' => 'exists:subscribers,id',
        ]);

        $gameEvent = GameEvents::create([
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
            'platforms' => $validatedData['platforms'],
            'event_date' => $validatedData['event_date'],
        ]);

        $gameEvent->games()->attach($validatedData['game_ids']);
        $gameEvent->developers()->attach($validatedData['developer_ids']);
        
        if (isset($validatedData['subscriber_ids'])) {
            $gameEvent->subscribers()->attach($validatedData['subscriber_ids']);
        }

        return response()->json([
            'message' => 'Game event created successfully!',
            'game_event' => $gameEvent
        ], 201);
    }

    /**
     * Display the specified game event.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $gameEvent = GameEvents::with(['games', 'developers', 'subscribers'])->findOrFail($id);

        return response()->json([
            'game_event' => $gameEvent
        ], 200);
    }

    /**
     * Attach subscribers to a game event.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachSubscribers(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subscriber_ids' => 'required|array',
            'subscriber_ids.*' => 'exists:subscribers,id',
        ]);

        $gameEvent = GameEvents::findOrFail($id);
        $gameEvent->subscribers()->sync($validatedData['subscriber_ids']);

        return response()->json([
            'message' => 'Subscribers attached to game event successfully!',
            'game_event' => $gameEvent->load('subscribers'),
        ]);
    }
}
