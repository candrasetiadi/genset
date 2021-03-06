<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\FuelUsage;
use App\FuelStock;
use PDF;

class FuelUsageController extends Controller
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
            $fuelUsages = DB::table('fuel_usages as a')
                            ->select('a.id', 'a.id_field', 'a.date', 'a.id_generator', 'a.usage', 'a.price','a.field_operator', 'a.unit_operator', 'b.name as generator_name', 'c.name as field_name')
                            ->leftJoin('generators as b', 'a.id_generator', '=', 'b.id')
                            ->leftJoin('fields as c', 'a.id_field', '=', 'c.id')
                            ->get();

            $fields = DB::table('fields')->get();
            $generators = DB::table('generators')->get();
            $fuelStocks = DB::table('fuel_stocks')
                        ->orderBy('id', 'desc')
                        ->first();

            $title = 'Bon Pemakaian Solar';

            return view('admin.fuelUsages.index', compact('fuelUsages', 'fields', 'generators', 'fuelStocks', 'title'));
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
        $stock = DB::table('fuel_stocks')
                        ->orderBy('id', 'desc')
                        ->first();

        $this->validate($request, [
            'id_field' => 'required',
            'date' => 'required',
            'id_generator' => 'required',
            'usage' => 'required|numeric|max:'. $stock->last_stock
        ]);

        FuelUsage::create($request->all());

        // insert into tabel stock as solar out
        
        $last_stock = $stock->last_stock - $request->usage;

        $request->merge([
            'date' => date('Y-m-d'),
            'solar_out' => $request->usage,
            'last_stock' => $last_stock,
            'created_by' => $request->created_by
        ]);

        FuelStock::create($request->all());

        $request->session()->flash('flash_message', 'Fuel Usage successfully added!');
        
        return redirect()->route('fuelUsage.index');
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
    public function edit(Request $request, $id)
    {
        $data = DB::table('fuel_usages as a')
                        ->select('a.id', 'a.id_field', 'a.date', 'a.id_generator', 'a.usage', 'a.price','a.field_operator', 'a.unit_operator')
                        ->where('id', $id)
                        ->get();
        return $data;
    }

    public function getStock(Request $request)
    {
        $data = DB::table('fuel_stocks as a')
                        ->orderBy('a.id', 'desc')
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
        $fuelUsage = FuelUsage::findOrFail($id);

        $this->validate($request, [
            'id_field' => 'required',
            'date' => 'required',
            'id_generator' => 'required',
            'usage' => 'required'
        ]);

        $input = $request->all();

        $fuelUsage->fill($input)->save();

        $request->session()->flash('flash_message', 'Fuel Usage successfully updated!');
        
        return redirect()->route('fuelUsage.index')
                        ->with('success','Fuel Usage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuelUsage = FuelUsage::find($id);
        $fuelUsage->delete();

        // redirect
        return redirect()->route('fuelUsage.index')
                        ->with('success','Fuel Usage deleted successfully');
    }

    public function generatePdf($id) {
        $data = DB::table('fuel_usages as a')
                        ->select('a.id', 'a.id_field', 'a.date', 'a.id_generator', 'a.usage', 'a.price','a.field_operator', 'a.unit_operator', 'b.name as generator_name', 'c.name as field_name')
                        ->leftJoin('generators as b', 'a.id_generator', '=', 'b.id')
                        ->leftJoin('fields as c', 'a.id_field', '=', 'c.id')
                        ->where('a.id', $id)
                        ->first();
        
        // dd($data);
        $pdf = PDF::loadView('admin.fuelUsages.export', compact('data'));
        return $pdf->stream('document.pdf');
    }
}
