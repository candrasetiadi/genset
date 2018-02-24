<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
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
            $customers = DB::table('customers')->get();
            $title = 'Customer';

            return view('admin.customers.index', compact('customers', 'title'));
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

    public function generateCustomerNumber()
    {
        $prefix = 'CUST';

        $lastNumber = DB::table('customers')
                            ->select('customer_no')
                            ->orderBy('id', 'desc')
                            ->first();

        if ( $lastNumber != null ) {

            $numb = substr($lastNumber->customer_no, 4,3);

        } else {
            $numb = '000';
        }

        $last = $numb + 1;
        $str_pad = str_pad($last, 3, '0', STR_PAD_LEFT);
        $result = $prefix . $str_pad;

        return $result;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_1' => 'required',
            'pic' => 'required'
        ]);

        $customer_no = $this->generateCustomerNumber();

        $request->merge([
            'customer_no' => $customer_no,
            'date' => date('Y-m-d')
        ]);

        Customer::create($request->all());

        $request->session()->flash('flash_message', 'Customer successfully added!');
        
        return redirect()->route('customer.index');
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
        $data = DB::table('customers')
                        ->select('id', 'customer_no', 'email', 'name', 'address', 'phone_1', 'phone_2', 'pic')
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
        $customer = Customer::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_1' => 'required',
            'pic' => 'required'
        ]);

        $input = $request->all();

        $customer->fill($input)->save();

        $request->session()->flash('flash_message', 'customer successfully updated!');
        
        return redirect()->route('customer.index')
                        ->with('success','customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customer::find($id);
        $customers->delete();

        // redirect
        return redirect()->route('customer.index')
                        ->with('success','Customer deleted successfully');
    }
}
