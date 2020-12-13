<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
    public function index()
    {
        return City::all();
    }
    public function show($id)
    {
        $city =  City::find($id);
        $governomate = $city->governorate;
        return response()->json($city, 201);
    }

    public function store(Request $request)
    {
        $city = City::create($request->all());
        return response()->json($city, 201);
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->update($request->all());


        return response()->json($city, 200);
    }

    public function delete(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(null, 204);
    }
}
