<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingService extends Model
{
  	protected $fillable = [
        'title',
        'description'
    ];
}
