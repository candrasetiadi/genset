<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Landing;
use App\LandingService;

class LandingController extends Controller
{
    public function index()
    {
    	$data = DB::table('landings')->first();
    	$services = DB::table('landing_services')->get();

    	return view('landing', compact('data', 'services'));
    }
}
