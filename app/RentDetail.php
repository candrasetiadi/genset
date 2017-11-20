<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentDetail extends Model
{
    protected $fillable = [
        'id_rent',
        'date', 
        'time_shift', 
        'temperature'
    ];
}
