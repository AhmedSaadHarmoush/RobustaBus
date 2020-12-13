<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['trip_id','seat_number','start_order','end_order'];
    public function passenger(){return $this->belongsTo(User::Class,'passenger_id');}
}
