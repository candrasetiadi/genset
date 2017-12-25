<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Spka;
use PDF;

class SpkaController extends Controller
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
            $spkas = DB::table('spkas as a')
                            ->select('a.id', 'a.spka_no', 'a.date', 'a.id_invoice', 'b.invoice_no', 'c.name as customer_name')
                            ->leftJoin('invoices as b', 'a.id_invoice', '=', 'b.id')
                            ->leftJoin('customers as c', 'b.id_customer', '=', 'c.id')
                            ->get();

            $invoices = DB::table('invoices')->get();
            $title = 'SPKA';

            return view('admin.spkas.index', compact('spkas', 'invoices', 'title'));
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
            'id_invoice' => 'required'
        ]);

        Spka::create($request->all());

        $request->session()->flash('flash_message', 'SPKA successfully added!');
        
        return redirect()->route('spka.index');
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
        $data = DB::table('spkas as a')
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
        $spka = Spka::findOrFail($id);

        $this->validate($request, [
            'date' => 'required',
            'id_invoice' => 'required'
        ]);

        $input = $request->all();

        $spka->fill($input)->save();

        $request->session()->flash('flash_message', 'SPKA successfully updated!');
        
        return redirect()->route('spka.index')
                        ->with('success','SPKA updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spka = Spka::find($id);
        $spka->delete();

        // redirect
        return redirect()->route('spka.index')
                        ->with('success','SPKA deleted successfully');
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
