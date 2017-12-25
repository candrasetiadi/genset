<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Landing;

class LandingController extends Controller
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
            $landings = DB::table('landings')
                            ->select('id', 'about_us', 'address', 'phone', 'website', 'banner_1', 'banner_2', 'banner_3', 'text_1', 'text_2', 'text_3')
                            ->get();

            $title = 'Landing Page Configuration';

            return view('admin.landings.index', compact('landings', 'title'));
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
            // 'ship_no' => 'required',
            // 'name' => 'required',
            // 'owner' => 'required'
        ]);

        Landing::create($request->all());

        $request->session()->flash('flash_message', 'Landing successfully added!');
        
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
    public function edit($id)
    {
        $data = DB::table('landings')
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
        $landings = Landing::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $landings->fill($input)->save();

        $request->session()->flash('flash_message', 'Landing successfully updated!');
        
        return redirect()->route('configuration.index')
                        ->with('success','configuration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landing = Landing::find($id);
        $landing->delete();

        // redirect
        return redirect()->route('configuration.index')
                        ->with('success','configuration deleted successfully');
    }
}
