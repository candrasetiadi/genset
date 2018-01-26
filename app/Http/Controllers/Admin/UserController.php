<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

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
    public function index(Request $request)
    {
        if( $request->user()->hasAnyRole(['super admin', 'admin kantor'])) {
            $users = DB::table('users')
                            ->select('users.*', 'roles.name as role_name')
                            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                            ->get();

            $roles = DB::table('roles')->get();

            return view('users.index', compact('users', 'roles'));
        } else {
            return redirect('/admin/home');
        }
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

    public function editRole(Request $request, $id)
    {
        $data = DB::table('roles')
                        ->where('id', $id)
                        ->get();
        return $data;
    }

    public function updateRole(Request $request, $id)
    {
        // dd($request);
        $check = DB::table('role_user')
                        ->where('id', $request->user_id)
                        ->first();

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        if( $check == null ) {
            
            DB::table('role_user')->insert(
                ['role_id' => $request->role_id, 'user_id' => $request->user_id]
            );

            DB::table('users')
                    ->where('id', $request->user_id)
                    ->update(['id_role' => $request->role_id]);

        } else {
            DB::table('role_user')
                    ->where('user_id', $request->user_id)
                    ->update(['role_id' => $request->role_id, 'user_id' => $request->user_id]);

            DB::table('users')
                    ->where('id', $request->user_id)
                    ->update(['id_role' => $request->role_id]);
        }

        $request->session()->flash('flash_message', 'roles successfully updated!');
        
        return redirect()->route('users');
    }
}
