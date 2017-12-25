<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $fillable = [
        'about_us',
        'address',
        'phone',
        'website',
        'banner_1',
        'banner_2',
        'banner_3',
        'text_1',
        'text_2',
        'text_3'
    ];
}
