<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $fillable = [
        'about_us',
        'address',
        'phone',
        'website'
    ];
}
