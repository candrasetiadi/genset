<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rent;
use App\RentDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plugin = DB::table('rents as a')
                        ->select(DB::raw('count(a.id) AS total_cont, c.size AS size'))
                        ->leftJoin('rent_details as b', 'a.id', '=', 'b.id_rent')
                        ->leftJoin('containers as c', 'a.id_container', '=', 'c.id')
                        ->where('a.date_in', 'LIKE', date('Y-m-d').'%')
                        ->groupBy('c.size')
                        ->orderBy('c.size', 'asc')
                        ->get();

        $plugout = DB::table('rents as a')
                        ->select(DB::raw('count(a.id) AS total_cont, c.size AS size'))
                        ->leftJoin('rent_details as b', 'a.id', '=', 'b.id_rent')
                        ->leftJoin('containers as c', 'a.id_container', '=', 'c.id')
                        ->where('a.date_out', 'LIKE', date('Y-m-d').'%')
                        ->groupBy('c.size')
                        ->orderBy('c.size', 'asc')
                        ->get();

        $today = date('Y-m-d');
        $oneWeekAgo = date ( 'Y-m-d', strtotime ( '-7 day' . $today ) );

        $solar = DB::table('fuel_usages')
                        ->where('date', '>=', date('Y-m-d', strtotime($oneWeekAgo)))
                        ->get();

        $userLogin = DB::table('users')
                        ->get();

        return view('home', compact('plugin', 'plugout', 'solar', 'userLogin'));
    }
}