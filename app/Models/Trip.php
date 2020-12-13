<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function route(){return $this->belongsTo(Route::Class,'route_id');}
    public function bus(){return $this->belongsTo(Bus::Class,'bus_id');}

}
