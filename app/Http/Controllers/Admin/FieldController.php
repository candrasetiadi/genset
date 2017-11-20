<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Field;

class FieldController extends Controller
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
        $fields = DB::table('fields')->get();
        $title = 'Lapangan';

        return view('admin.fields.index', compact('fields', 'title'));
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
            'field_no' => 'required',
            'name' => 'required',
            'location' => 'required'
        ]);

        Field::create($request->all());

        $request->session()->flash('flash_message', 'Field successfully added!');
        
        return redirect()->route('field.index');
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
        $data = DB::table('fields')
                        ->select('id', 'field_no', 'name', 'location')
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
        $field = Field::findOrFail($id);

        $this->validate($request, [
            'field_no' => 'required',
            'name' => 'required',
            'location' => 'required'
        ]);

        $input = $request->all();

        $field->fill($input)->save();

        $request->session()->flash('flash_message', 'Field successfully updated!');
        
        return redirect()->route('field.index')
                        ->with('success','Field updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fields = Field::find($id);
        $fields->delete();

        // redirect
        return redirect()->route('field.index')
                        ->with('success','Field deleted successfully');
    }
}
