<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        return Bus::all();
    }
    public function show($id)
    {
        $bus =  Bus::find($id);
        return response()->json($bus);
    }

    public function store(Request $request)
    {
        $bus = Bus::create($request->all());
        return response()->json($bus, 201);
    }

    public function update(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        $bus->update($request->all());


        return response()->json($bus, 200);
    }

    public function delete(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();

        return response()->json(null, 204);
    }
}
