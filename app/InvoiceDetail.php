<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'invoice_no',
        'rent_no',
        'recooling_price',
        'monitoring_price'
    ];
}
