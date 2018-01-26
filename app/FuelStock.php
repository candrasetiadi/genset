<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelStock extends Model
{
    protected $fillable = [
        'date', 
        'solar_in',
        'solar_out',
        'last_stock',
        'created_by'
    ];
}
