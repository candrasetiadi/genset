<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Container;

class ContainerController extends Controller
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
            $containers = DB::table('containers as a')
                            ->select('a.id', 'a.container_no', 'a.name', 'a.size', 'a.id_field', 'a.id_ship', 'a.recooling_price', 'a.monitoring_price', 'b.name as field_name', 'c.name as ship_name')
                            ->leftJoin('fields as b', 'a.id_field', '=', 'b.id')
                            ->leftJoin('ships as c', 'a.id_ship', '=', 'c.id')
                            ->get();

            $fields = DB::table('fields')->get();
            $ships = DB::table('ships')->get();
            $title = 'Container';

            return view('admin.containers.index', compact('containers', 'fields', 'ships', 'title'));
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
            'container_no' => 'required',
            'name' => 'required',
            'size' => 'required',
            'id_field' => 'required',
            'id_ship' => 'required',
            'recooling_price' => 'required',
            'monitoring_price' => 'required'
        ]);

        Container::create($request->all());

        $request->session()->flash('flash_message', 'Container successfully added!');
        
        return redirect()->route('container.index');
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
}
