<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Ship;

class ShipController extends Controller
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
        $ships = DB::table('ships')->get();
        $title = 'Kapal';

        return view('admin.ships.index', compact('ships', 'title'));
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
            'ship_no' => 'required',
            'name' => 'required',
            'owner' => 'required'
        ]);

        Ship::create($request->all());

        $request->session()->flash('flash_message', 'Ship successfully added!');
        
        return redirect()->route('ship.index');
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
        $data = DB::table('ships')
                        ->select('id', 'ship_no', 'name', 'owner')
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
        $ship = Ship::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $ship->fill($input)->save();

        $request->session()->flash('flash_message', 'Ship successfully updated!');
        
        return redirect()->route('ship.index')
                        ->with('success','Ship updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ships = Ship::find($id);
        $ships->delete();

        // redirect
        return redirect()->route('ship.index')
                        ->with('success','Ship deleted successfully');
    }
}
