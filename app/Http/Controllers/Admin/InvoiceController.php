<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Invoice;
use PDF;

class InvoiceController extends Controller
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
        $invoices = DB::table('invoices as a')
                        ->select('a.id', 'a.invoice_no', 'a.date','a.start_date', 'a.end_date', 'a.id_customer', 'b.name as customer_name')
                        ->leftJoin('customers as b', 'a.id_customer', '=', 'b.id')
                        // ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                        ->get();

        
        $title = 'Invoice';
        $fields = DB::table('fields')->get();
        $customers = DB::table('customers')->get();

        return view('admin.invoices.index', compact('invoices', 'fields', 'customers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Invoice';
        $fields = DB::table('fields')->get();
        $customers = DB::table('customers')->get();
        
        return view('admin.invoices.create', compact('fields', 'customers', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function generateInvoiceNumber()
    {
        $prefix = '/TLP/' . date('m/Y');

        $lastNumber = DB::table('invoices')
                            ->select('invoice_no')
                            ->orderBy('id', 'desc')
                            ->first();

        if ( $lastNumber != null ) {

            $month = substr($lastNumber->invoice_no, 10,2);
            $year = substr($lastNumber->invoice_no, 13,4);

            if ( date('Y') != $year ) {
                $numb = '0000';
            } elseif ( date('m') != $month ) {
                $numb = '0000';
            } elseif ( date('d') != $day ) {
                $numb = '0000';
            } else {
                $numb = substr($lastNumber->invoice_no, 0,4);
            }

        } else {
            $numb = '0000';
        }

        $last = $numb + 1;
        $str_pad = str_pad($last, 4, '0', STR_PAD_LEFT);
        $result = $str_pad . $prefix;

        return $result;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_field' => 'required',
            'id_customer' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $invoice_no = $this->generateInvoiceNumber();

        $request->merge([
            'invoice_no' => $invoice_no,
            'date' => date('Y-m-d')
        ]);

        Invoice::create($request->all());

        $request->session()->flash('flash_message', 'Invoice successfully added!');
        
        return redirect()->route('invoice.index');
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
        $data = DB::table('containers')
                        ->select('id', 'container_no', 'name', 'size', 'recooling_price', 'monitoring_price')
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
        $container = Container::findOrFail($id);

        $this->validate($request, [
            'container_no' => 'required',
            'name' => 'required',
            'size' => 'required',
            'id_field' => 'required',
            'id_ship' => 'required',
            'recooling_price' => 'required',
            'monitoring_price' => 'required'
        ]);

        $input = $request->all();

        $container->fill($input)->save();

        $request->session()->flash('flash_message', 'Container successfully updated!');
        
        return redirect()->route('container.index')
                        ->with('success','Container updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $containers = Container::find($id);
        $containers->delete();

        // redirect
        return redirect()->route('container.index')
                        ->with('success','container deleted successfully');
    }

    public function getByShip(Request $request, $id_ship)
    {
        $data = DB::table('containers')
                        ->select('id', 'name')
                        ->where('id_ship', $id_ship)
                        ->get();
        return $data;
    }

    public function generatePdf($id) {
        $data = DB::table('invoices as a')
                        ->select('a.id', 'a.invoice_no', 'a.date','a.start_date', 'a.end_date', 'a.id_customer', 'b.name as customer_name', 'b.address')
                        ->leftJoin('customers as b', 'a.id_customer', '=', 'b.id')
                        ->where('a.id', $id)
                        ->first();

        $dataRM = DB::table('invoice_view')
                        ->where('date_in', '>', $data->start_date)
                        ->where('date_in', '<', $data->end_date)
                        ->get();

        // $dataBA = DB::table('invoices as a')
        //                 ->select('a.id', 'a.invoice_no', 'a.date','a.start_date', 'a.end_date', 'a.id_customer', 'b.name as customer_name', 'b.address')
        //                 ->leftJoin('customers as b', 'a.id_customer', '=', 'b.id')
        //                 ->where('a.id', $id)
        //                 ->first();

        // dd($dataRM);

        $subtotal = 0;
        foreach ($dataRM as $key => $value) {
            $subtotal += ($value->recooling_price * $value->total_shift) + ($value->monitoring_price * $value->total_shift);
        }
        $ppn = $subtotal * 10 / 100;
        $subtotal = number_format($subtotal + $ppn, 0,'','');
        $text = $this->textNumber($subtotal);

        $pdf = PDF::loadView('admin.invoices.export', compact('data', 'text', 'dataRM'));
        return $pdf->stream('invoice-'.$data->invoice_no.'-'.time().'.pdf');
    }

    public function textNumber($number)
    {
        $text = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

        if ($number < 12)
            return " " . $text[$number];
        elseif ($number < 20)
            return $this->textNumber($number - 10) . "belas";
        elseif ($number < 100)
            return $this->textNumber($number / 10) . " puluh" . $this->textNumber($number % 10);
        elseif ($number < 200)
            return " seratus" . $this->textNumber($number - 100);
        elseif ($number < 1000)
            return $this->textNumber($number / 100) . " ratus" . $this->textNumber($number % 100);
        elseif ($number < 2000)
            return " seribu" . $this->textNumber($number - 1000);
        elseif ($number < 1000000)
            return $this->textNumber($number / 1000) . " ribu" . $this->textNumber($number % 1000);
        elseif ($number < 1000000000)
            return $this->textNumber($number / 1000000) . " juta" . $this->textNumber($number % 1000000);
    }
}
