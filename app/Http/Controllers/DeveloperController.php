<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    // list developers.
    public function index()
    {
        $developers = Developer::all();
        return response()->json($developers);
    }

    // Store
    public function store(Request $request)
    {
        $developer = Developer::create($request->all());
        return response()->json($developer, 201);
    }

    // Display/Show
    public function show($id)
    {
        $developer = Developer::findOrFail($id);
        return response()->json($developer);
    }

    // Update
    public function update(Request $request, $id)
    {
        $developer = Developer::findOrFail($id);
        $developer->update($request->all());
        return response()->json($developer);
    }

    // Delete
    public function destroy($id)
    {
        Developer::destroy($id);
        return response()->json(null, 204);
    }
}
