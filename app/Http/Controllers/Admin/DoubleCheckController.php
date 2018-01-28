<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rent;
use PDF;

class DoubleCheckController extends Controller
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
        if( $request->user()->hasAnyRole(['super admin', 'admin kantor'])) {
            $rents = DB::table('rents as a')
                            ->select('a.id', 'a.rent_no', 'a.id_container', 'a.id_ship', 'd.name as field_name', 'a.set_point', 'a.delivery_type', 'a.date_in', 'a.time_in', 'a.date_out', 'a.status', 'b.name as container_name', 'c.name as ship_name')
                            ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                            ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                            ->leftJoin('fields as d', 'b.id_field', '=', 'd.id')
                            ->where('status', 'checking')
                            ->get();

            $status = [
                'active' => 'Active',
                'inactive' => 'Inactive',
                'checking' => 'Double Check',
                'tax' => 'Tax Check',
                'done' => 'Done',
            ];
            $containers = DB::table('containers')->get();
            $ships = DB::table('ships')->get();
            $title = 'Double Check';

            return view('admin.rents.index-doubleCheck', compact('rents', 'ships', 'title', 'status'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        ]);

        $request->merge([
            'status' => 'done'
        ]);

        $input = $request->all();

        $rent->fill($input)->save();

        $request->session()->flash('flash_message', 'Status successfully updated!');
        
        return 'OK';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePdfDoubleCheck(Request $request, $id) {
        
        $rent = Rent::findOrFail($id);

        $this->validate($request, [

        ]);

        $request->merge([
            'status' => 'done'
        ]);

        $input = $request->all();

        $rent->fill($input)->save();

        $dataRent = DB::table('rents as a')
                        ->select(DB::raw('b.container_no, b.name, b.size, a.rent_no, a.date_in, a.time_in, a.date_out, count(c.time_shift) as total_shift, a.set_point, a.delivery_type, d.name as ship_name, b.recooling_price, b.monitoring_price'))
                        ->leftJoin('containers as b', 'a.id_container', '=', 'b.id')
                        ->leftJoin('rent_details as c', 'a.id', '=', 'c.id_rent')
                        ->leftJoin('ships as d', 'a.id_ship', '=', 'd.id')
                        
                        ->where('a.status', 'done')
                        ->groupBy('a.id')
                        ->get();

        $pdf = PDF::loadView('admin.rents.export-doubleCheck', compact('text', 'dataRent'));
        $output = $pdf->output();
        $rents_no = str_replace("/", "_", $dataRent[0]->rent_no);
        // file_put_contents('report/rent/double-check/'. $rents_no .'.pdf', $output);

        return $pdf->stream('double-check-'.$dataRent[0]->rent_no.'-'.time().'.pdf');
    }
}
