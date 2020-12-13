<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Route;
use App\Models\Trip;
use App\ViewModels\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getAvailableSeats(Request $request){
        $validated = $request->validate([
            'tripId' => 'required',
            'startCityId' => 'required',
            'endCityId' => 'required',
        ]);
        $bus = Seat::buildBus();
        $tripId = $request->input('tripId');
        $endCityId = $request->input('endCityId');
        $startCityId = $request->input('startCityId');
        $seatId = $request->input('seatId');
        $trip = Trip::find($tripId);
        $stops = $trip->route->stops;
        $startCity=$stops->where('stop_id',$startCityId)->first();
        $endCity=$stops->where('stop_id',$endCityId)->first();
        if(is_null($startCity)||is_null($endCity)){
            throw \Illuminate\Validation\ValidationException::withMessages(['stops' => 'Both start and end must exist in trip.']);
        }
        $prevBookings = Booking::where('trip_id',$tripId)
            ->where('start_order','<=',$startCity->order)
            ->where('end_order','>=',$endCity->order)->get();
        foreach ($prevBookings as $prevBooking){
            $bus[$prevBooking->seat_number]=false;
        }
        return $bus;
    }
    public function store(Request $request){
        $validated = $request->validate([
            'tripId' => 'required',
            'startCityId' => 'required',
            'endCityId' => 'required',
            'seatId'=>'required|min:1|max:12',
        ]);
        $bus = Seat::buildBus();
        $tripId = $request->input('tripId');
        $endCityId = $request->input('endCityId');
        $startCityId = $request->input('startCityId');
        $seatId = $request->input('seatId');
        $trip = Trip::find($tripId);
        $stops = $trip->route->stops;
        $startCity=$stops->where('stop_id',$startCityId)->first();
        $endCity=$stops->where('stop_id',$endCityId)->first();
        if(is_null($startCity)||is_null($endCity)){
            throw \Illuminate\Validation\ValidationException::withMessages(['stops' => 'Both start and end must exist in trip.']);
        }
        $prevBookings = Booking::where('trip_id',$tripId)
            ->where('start_order','<=',$startCity->order)
            ->where('end_order','>=',$endCity->order)->get();
        foreach ($prevBookings as $prevBooking){
            $bus[$prevBooking->seat_number]=false;
        }
        if(!$bus[$seatId])
        {
            throw \Illuminate\Validation\ValidationException::withMessages(['seat' => 'this seat is already taken.']);
        }
        $newBooking=[
            'trip_id'=>$tripId,
            'seat_number'=>$seatId,
            'start_order'=>$startCity->order,
            'end_order'=>$endCity->order
        ];
        $booking =auth()->user()->bookings()->create($newBooking);
        return response()->json($booking, 201);
    }

}


