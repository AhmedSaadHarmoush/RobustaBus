<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
//    use HasFactory;
    protected $fillable = ['value_AR','value_EN'];

    public function governorate(){return $this->belongsTo(Governorate::Class,'gov_id');}
}
