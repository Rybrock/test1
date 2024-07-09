<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeveloperRequest;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    // List developers.
    public function index()
    {
        $developers = Developer::all();
        return response()->json($developers);
    }

    // Store
    public function store(StoreDeveloperRequest $request)
    {
        $developer = Developer::create($request->validated());
        return response()->json($developer, 201);
    }

    // Display/Show
    public function show($id)
    {
        $developer = Developer::findOrFail($id);
        return response()->json($developer);
    }

    // Update
    public function update(StoreDeveloperRequest $request, $id)
    {
        $developer = Developer::findOrFail($id);
        $developer->update($request->validated());
        return response()->json($developer);
    }

    // Delete
    public function destroy($id)
    {
        Developer::destroy($id);
        return response()->json(null, 204);
    }
}
