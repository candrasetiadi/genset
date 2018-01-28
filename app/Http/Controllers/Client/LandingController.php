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

    	return view('landingPage', compact('data', 'services'));
    }

    public function about()
    {
    	$data = DB::table('landings')->first();

    	return view('about', compact('data'));
    }

    public function service()
    {
    	$data = DB::table('landing_services')->get();

    	return view('services', compact('data'));
    }

    public function contact()
    {
    	$data = DB::table('landings')->first();

    	return view('contact', compact('data'));
    }
}
