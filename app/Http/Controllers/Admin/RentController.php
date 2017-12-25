<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rent;
use App\RentDetail;
use PDF;

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

    public function index(Request $request)
    {
        // $this->authorize('view', $post);
        // $request->user()->authorizeRoles('super admin');
        if( $request->user()->hasAnyRole(['super admin', 'admin kantor', 'petugas lapangan'])) {

            $rents = DB::table('rents as a')
                            ->select('a.id', 'a.rent_no', 'a.id_container', 'a.id_ship', 'd.name as field_name', 'a.set_point', 'a.delivery_type', 'a.date_in', 'a.date_out', 'a.status', 'b.name as container_name', 'c.name as ship_name')
                            ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                            ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                            ->leftJoin('fields as d', 'b.id_field', '=', 'd.id')
                            ->get();
            $containers = DB::table('containers')->get();
            $ships = DB::table('ships')->get();
            $title = 'Recooling & Monitoring';

            return view('admin.rents.index', compact('rents', 'ships', 'title'));
        } else {
            return redirect('/admin/home');
        }
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
                        ->select('a.id', 'a.rent_no', 'a.id_container', 'a.id_ship', 'a.set_point', 'a.delivery_type', 'a.date_in', 'a.time_in', 'a.date_out', 'a.time_out', 'a.temperature_out', 'a.status', 'b.container_no', 'b.name as container_name', 'c.name as ship_name', 'c.ship_no', 'd.name as field_name', 'd.field_no', 'e.name as user_name')
                        ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                        ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                        ->leftJoin('fields as d', 'b.id_field', '=', 'd.id')
                        ->leftJoin('users as e', 'a.created_by', '=', 'e.id')
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
                        ->select('id', 'rent_no', 'id_ship', 'id_container', 'set_point', 'delivery_type', 'date_in', 'date_out', 'remark', 'status')
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
            'date_out' => 'required',
            'time_out' => 'required',
            'temperature_out' => 'required'
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

    public function refeerContainer()
    {
        $data = DB::table('rents as a')
                        ->select(DB::raw('b.container_no, b.name, b.size, a.date_in, a.time_in, count(c.time_shift) as total_shift, a.set_point, a.delivery_type, d.name as ship_name, b.recooling_price, b.monitoring_price'))
                        ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                        ->leftJoin('rent_details as c', 'a.id', '=', 'c.id_rent')
                        ->leftJoin('ships as d', 'a.id_ship', '=', 'd.id')
                        ->groupBy('a.id')
                        ->get();

        $fields = DB::table('fields')->get();
        
        $title = 'Recooling & Monitoring Refeer Container';

        return view('admin.rents.refeerContainer', compact('title', 'data', 'fields'));
    }

    public function generatePdf(Request $request) {

        $data = DB::table('rents as a')
                        ->select(DB::raw('b.container_no, b.name, b.size, a.date_in, a.time_in, a.date_out, count(c.time_shift) as total_shift, a.set_point, a.delivery_type, d.name as ship_name, b.recooling_price, b.monitoring_price, e.name as field_name'))
                        ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                        ->leftJoin('rent_details as c', 'a.id', '=', 'c.id_rent')
                        ->leftJoin('ships as d', 'a.id_ship', '=', 'd.id')
                        ->leftJoin('fields as e', 'b.id_field', '=', 'e.id')
                        ->where('a.date_in', '>=', $request->start)
                        ->where('a.date_out', '<=', $request->end)
                        ->where('b.id_field', $request->id_field)
                        ->groupBy('a.id')
                        ->get();

        $field = DB::table('fields')->first();

        $pdf = PDF::loadView('admin.rents.export', compact('data', 'field'), [], ['format' => 'A4-L']);
        return $pdf->stream('document.pdf');
    }
}
