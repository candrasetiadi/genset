<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users.index', compact('users'));
    }

    public function profile($id)
    {
        $users = DB::table('users')
                        ->where('id', $id)
                        ->first();

        return view('users.profile', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $request->merge([
            'password' => bcrypt($request->password)
        ]);

        $input = $request->all();

        $users->fill($input)->save();

        $request->session()->flash('flash_message', 'users successfully updated!');
        
        return redirect()->route('users.profile', $id);
    }
}
