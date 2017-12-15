<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spka extends Model
{
    protected $fillable = [
        'spka_no',
        'date',
        'id_invoice'
    ];
}
