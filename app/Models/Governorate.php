<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = ['value_AR','value_EN'];
    public function cities(){return $this->hasMany(City::class, 'gov_id');}
}
