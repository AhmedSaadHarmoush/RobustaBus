<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;
class GovernorateController extends Controller
{
    public function index()
    {
        return Governorate::all();
    }
    public function show($id)
    {
        $governomate =  Governorate::find($id);
        $cities = $governomate->cities;
        return response()->json($governomate);
    }

    public function store(Request $request)
    {
        $governomate = Governorate::create($request->all());
        return response()->json($governomate, 201);
    }

    public function update(Request $request, $id)
    {
        $governomate = Governorate::findOrFail($id);
        $governomate->update($request->all());


        return response()->json($governomate, 200);
    }

    public function delete(Request $request, $id)
    {
        $governomate = Governorate::findOrFail($id);
        $governomate->delete();

        return response()->json(null, 204);
    }
}
