<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = [
        'container_no',
        'name', 
        'size',
        'id_field',
        'id_ship',
        'recooling_price',
        'monitoring_price'
    ];
}
