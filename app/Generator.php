<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    protected $fillable = [
        'generator_no',
        'name', 
        'brand',
        'type',
        'diesel_fuel_capacity'
    ];
}
