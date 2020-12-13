<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\RouteStop;
use App\ViewModels\InitRouteInput;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return Route::all();
    }
    public function show($id)
    {
        $route =  Route::find($id);
        return response()->json($route);
    }

    public function store(InitRouteInput $initRoute)
    {
        if($initRoute->validateInit()){
            $route = Route::create($initRoute->route);
            foreach ($initRoute->stops as $stop)
                RouteStop::create($stop);
            return response()->json($route, 201);
        }else{
            throw ValidationException::withMessages(['stops' => 'creating route needs at least two stops']);
        }
    }

    public function update(Request $request, $id)
    {
        $route = Route::findOrFail($id);
        $route->update($request->all());


        return response()->json($route, 200);
    }

    public function delete(Request $request, $id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return response()->json(null, 204);
    }
}
