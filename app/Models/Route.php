<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['code','duration'];
    public function stops(){return $this->hasMany(RouteStop::class, 'route_id');}
    public function trips(){return $this->hasMany(Trip::class, 'route_id');}
}
