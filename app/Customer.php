<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_no',
        'email', 
        'name',
        'phone_1',
        'phone_2',
        'pic'
    ];
}
