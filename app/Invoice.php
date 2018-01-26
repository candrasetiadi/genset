<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no',
        'id_field',
        'date',
        'id_customer',
        'start_date',
        'end_date',
        'status',
        'tax_invoice'
    ];
}
