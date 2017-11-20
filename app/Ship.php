<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'ship_no',
        'name', 
        'owner'
    ];
}
