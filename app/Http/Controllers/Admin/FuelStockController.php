<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\FuelStock;
use PDF;

class FuelStockController extends Controller
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
            $fuelStocks = DB::table('fuel_stocks as a')
                            ->select('a.date', 'a.solar_in', 'a.solar_out', 'a.id', 'a.last_stock', 'b.name as created_by')
                            ->leftJoin('users as b', 'a.created_by', '=', 'b.id')
                            ->get();

            $title = 'Solar Masuk (Stock)';

            return view('admin.fuelStocks.index', compact('fuelStocks', 'title'));
        } else {
            redirect('/admin/home');
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
            'date' => 'required',
            'solar_in' => 'required'
        ]);

        $stock = DB::table('fuel_stocks')
                        ->orderBy('id', 'desc')
                        ->first();

        $last_stock = $stock->last_stock + $request->solar_in;

        $request->merge([
            'last_stock' => $last_stock
        ]);

        FuelStock::create($request->all());

        $request->session()->flash('flash_message', 'Solar Masuk successfully added!');
        
        return redirect()->route('fuelStock.index');
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
        $data = DB::table('fuel_stocks as a')
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
        $fuelStock = FuelStock::findOrFail($id);

        $this->validate($request, [
            'date' => 'required',
            'solar_in' => 'required'
        ]);

        $input = $request->all();

        $fuelStock->fill($input)->save();

        $request->session()->flash('flash_message', 'Solar Masuk successfully updated!');
        
        return redirect()->route('fuelStock.index')
                        ->with('success','Solar Masuk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuelStock = FuelStock::find($id);
        $fuelStock->delete();

        // redirect
        return redirect()->route('fuelStock.index')
                        ->with('success','Solar Masuk deleted successfully');
    }
}
