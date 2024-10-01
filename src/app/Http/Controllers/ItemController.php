<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $item = $request->all();
        $item = Item::create($item);
        return response()->json($item, 201);
    }
    public function trade(Request $request)
    {
        $explorer1 = Explorer::findOrFail($request->explorer1_id);
        $explorer2 = Explorer::findOrFail($request->explorer2_id);

        $items1 = Item::whereIn('id', $request->explorer1_items)->get();
        $items2 = Item::whereIn('id', $request->explorer2_items)->get();

        $value1 = $items1->sum('value');
        $value2 = $items2->sum('value');

        if ($value1 != $value2) {
            return response()->json(['error' => 'Troca nao equivalente'], 400);
        }
        foreach ($items1 as $item) {
            $item->explorer_id = $explorer2->id;
            $item->save();
        }
        foreach ($items2 as $item) {
            $item->explorer_id = $explorer1->id;
            $item->save();
            return response()->json(['sucess' => 'troca realizada com suceso']);
        }
    }
}
