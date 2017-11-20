<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rent;
use App\RentDetail;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rents = DB::table('rents as a')
                        ->select('a.id', 'a.rent_no', 'a.id_container', 'a.id_ship', 'a.set_point', 'a.date_in', 'a.date_out', 'a.status', 'b.name as container_name', 'c.name as ship_name')
                        ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                        ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                        ->get();
        $containers = DB::table('containers')->get();
        $ships = DB::table('ships')->get();
        $title = 'Recooling & Monitoring';

        return view('admin.rents.index', compact('rents', 'ships', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_ship' => 'required',
            'id_container' => 'required',
            'date_in' => 'required',
            'time_in' => 'required',
            'set_point' => 'required'
        ]);

        $rent_no = $this->generateRM();

        $request->merge([
            'rent_no' => $rent_no
        ]);

        Rent::create($request->all());

        $request->session()->flash('flash_message', 'Rent successfully added!');
        
        return redirect()->route('rent.index');
    }

    public function generateRM()
    {
        $prefix = '/TLP/RM/' . date('d/m/Y');

        $lastNumber = DB::table('rents')
                            ->select('rent_no')
                            ->orderBy('id', 'desc')
                            ->first();

        if ( $lastNumber != null ) {

            $day = substr($lastNumber->rent_no, 12,2);
            $month = substr($lastNumber->rent_no, 15,2);
            $year = substr($lastNumber->rent_no, 18,4);

            if ( date('Y') != $year ) {
                $numb = '0000';
            } elseif ( date('m') != $month ) {
                $numb = '0000';
            } elseif ( date('d') != $day ) {
                $numb = '0000';
            } else {
                $numb = substr($lastNumber->rent_no, 0,4);
            }

        } else {
            $numb = '0000';
        }

        $last = $numb + 1;
        $str_pad = str_pad($last, 4, '0', STR_PAD_LEFT);
        $result = $str_pad . $prefix;

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Recooling & Monitoring Aktif Detail';

        $data = DB::table('rents as a')
                        ->select('a.id', 'a.rent_no', 'a.id_container', 'a.id_ship', 'a.set_point', 'a.date_in', 'a.time_in', 'a.date_out', 'a.time_out', 'a.temperature_out', 'a.status', 'b.container_no', 'b.name as container_name', 'c.name as ship_name', 'c.ship_no', 'd.name as field_name')
                        ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                        ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                        ->leftJoin('fields as d', 'b.id_field', '=', 'd.id')
                        ->where('a.id', $id)
                        ->first();

        $details = DB::table('rent_details as a')
                        ->select('a.id', 'a.id_rent', 'a.date', 'a.time_shift', 'a.temperature')
                        ->where('a.id_rent', $id)
                        ->get();

        $timeShift = $this->shift;

        return view('admin.rents.detail', compact('title', 'data', 'details', 'timeShift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = DB::table('rents')
                        ->select('id', 'rent_no', 'id_ship', 'id_container', 'set_point', 'date_in', 'date_out', 'remark', 'status')
                        ->where('id', $id)
                        ->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rent = Rent::findOrFail($id);

        $this->validate($request, [
            'id_ship' => 'required',
            'id_container' => 'required',
            'date_in' => 'required',
            'time_in' => 'required',
            'set_point' => 'required'
        ]);

        $status = 0;

        $request->merge([
            'status' => $status
        ]);

        $input = $request->all();

        $rent->fill($input)->save();

        $request->session()->flash('flash_message', 'Rent successfully updated!');
        
        return redirect()->route('rent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rents = Rent::find($id);
        $rents->delete();

        // redirect
        return redirect()->route('rent.index');
    }

    // detail

    public function storeDetail(Request $request)
    {
        RentDetail::create($request->all());

        $request->session()->flash('flash_message', 'Temperature Record successfully added!');
        
        return redirect()->back();
    }
}
