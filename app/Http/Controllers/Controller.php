<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $shift = [
            '02' => '02.00 - 04.00',
            '04' => '04.00 - 06.00',
            '06' => '06.00 - 12.00',
            '12' => '12.00 - 16.00',
            '16' => '16.00 - 18.00',
            '18' => '18.00 - 20.00',
            '20' => '20.00 - 22.00',
            '22' => '22.00 - 00.00',
            '00' => '00.00 - 02.00'
    ];
}
