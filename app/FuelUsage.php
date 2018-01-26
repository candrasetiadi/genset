<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelUsage extends Model
{
    protected $fillable = [
        'id_field',
        'date', 
        'id_generator',
        'usage',
        'price',
        'field_operator',
        'unit_operator',
        'created_by',
    ];
}
