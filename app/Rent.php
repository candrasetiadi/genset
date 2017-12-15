<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'rent_no',
        'id_ship', 
        'id_container',
        'set_point',
        'delivery_type',
        'date_in',
        'time_in',
        'date_out',
        'time_out',
        'temperature_out',
        'status',
        'remark',
        'created_by'
    ];
}
