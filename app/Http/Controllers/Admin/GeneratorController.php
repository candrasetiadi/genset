<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Generator;

class GeneratorController extends Controller
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
        $generators = DB::table('generators')->get();
        $title = 'Generator';

        return view('admin.generators.index', compact('generators', 'title'));
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
            'generator_no' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'diesel_fuel_capacity' => 'required'
        ]);

        Generator::create($request->all());

        $request->session()->flash('flash_message', 'Generator successfully added!');
        
        return redirect()->route('generator.index');
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
        $data = DB::table('generators')
                        ->select('id', 'generator_no', 'name', 'brand', 'type', 'diesel_fuel_capacity')
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
        $generator = Generator::findOrFail($id);

        $this->validate($request, [
            'generator_no' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'diesel_fuel_capacity' => 'required'
        ]);

        $input = $request->all();

        $generator->fill($input)->save();

        $request->session()->flash('flash_message', 'Generator successfully updated!');
        
        return redirect()->route('generator.index')
                        ->with('success','Generator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generators = Generator::find($id);
        $generators->delete();

        // redirect
        return redirect()->route('generator.index')
                        ->with('success','generator deleted successfully');
    }
}
