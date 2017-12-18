<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use App\Rent;

class LandingController extends Controller
{
    public function index()
    {
    	return view('landing');
    }
}
