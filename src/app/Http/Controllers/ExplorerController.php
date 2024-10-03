<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use Illuminate\Http\Request;
use PhpParser\Node\Expr;

class ExplorerController extends Controller
{
    public function store(Request $request)
    {
        $explorer = Explorer::create($request->only('name', 'age', 'latitude', 'longitude'));
        return response()->json($explorer, 201);
    }
    public function updateLocation(Request $request, $id)
    {
        $explorer = Explorer::findOrFail($id);
        $explorer->locationHistories()->create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        $explorer->update($request->only('latitude', 'longitude'));
        return response()->json($explorer);
    }
    public function show($id)
    {
        $explorer = Explorer::with('items')->findOrFail($id);
        return response()->json($explorer);
    }
    public function getLocationHistory($id)
    {
        $explorer = Explorer::findOrFail($id);
        $history = $explorer->locationHistories;
        return response()->json($history);
    }
}
