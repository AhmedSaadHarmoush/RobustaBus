<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// direct auth for web/frontend users using sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// allow cors
Route::group(['middleware' => ['cors', 'json.response']], function () {
    // public routes
    Route::post('login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.api');
    Route::post('register','App\Http\Controllers\Auth\ApiAuthController@register')->name('register.api');
 });
Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::post('logout', 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('logout.api');
    //City CRUD
    Route::get('cities/{id}', [CityController::class, 'show']);
    Route::post('cities', [CityController::class, 'store']);
    Route::put('cities/{id}', [CityController::class, 'update']);
    Route::delete('cities/{id}', [CityController::class, 'delete']);
    //Governate CRUD
    Route::get('governorates', [\App\Http\Controllers\GovernorateController::class, 'index']);
    Route::get('governorates/{id}', [\App\Http\Controllers\GovernorateController::class, 'show']);
    Route::post('governorates', [\App\Http\Controllers\GovernorateController::class, 'store']);
    Route::put('governorates/{id}', [\App\Http\Controllers\GovernorateController::class, 'update']);
    Route::delete('governorates/{id}', [\App\Http\Controllers\GovernorateController::class, 'delete']);
    //Bus CRUD
    Route::get('buses', [\App\Http\Controllers\BusController::class, 'index']);
    Route::get('buses/{id}', [\App\Http\Controllers\BusController::class, 'show']);
    Route::post('buses', [\App\Http\Controllers\BusController::class, 'store']);
    Route::put('buses/{id}', [\App\Http\Controllers\BusController::class, 'update']);
    Route::delete('buses/{id}', [\App\Http\Controllers\BusController::class, 'delete']);
    //Booking Routes
    Route::post('availablebookings', [BookingController::class, 'getAvailableSeats']);
    Route::post('booking', [BookingController::class, 'store']);
});




