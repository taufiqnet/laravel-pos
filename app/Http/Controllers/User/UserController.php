<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\employee\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Input;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('View Users')) {
            abort(403, 'Sorry!! You are Unauthorized to View Any Users!');
        }

        $users = User::all();
        return view('backend.user_management.user.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_user()
    {
        if (is_null($this->user) || !$this->user->can('Create Users')) {
            abort(403, 'Sorry!! You are Unauthorized to Create Any Users!');
        }

        $roles = Role::all();
        $employees = Employee::all();
        return view('backend.user_management.user.create', compact('roles', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_user(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('Create Users')) {
            abort(403, 'Sorry!! You are Unauthorized to Create Any Users!');
        }

        // validation data
        $request->validate([
            'user_name' => 'required|max:50',
            'email' => 'required|max:50|email|unique:users',
            'password' => 'required|max:8|confirmed',
        ]);

        // process data
        $user = new User();
        $user->emp_id = $request->emp_id;
        $user->user_name = $request->user_name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $user->save();

        session()->flash('success', 'Role has been created!!');
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('View Users')) {
            abort(403, 'Sorry!! You are Unauthorized to View Any Users!');
        }

        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('backend.user_management.user.view', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_user($id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Users')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Users!');
        }

        $user = User::where('id', $id)->first();
        $roles = Role::all();
        $employees = Employee::all();
        return view('backend.user_management.user.edit', compact('user', 'roles', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Users')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Users!');
        }

        // process data
        $update = array();
        $update['emp_id'] = $request->emp_id;
        $update['user_name'] = $request->user_name;
        $update['full_name'] = $request->full_name;
        $update['email'] = $request->email;
        $update['status'] = $request->status;

        if ($request->password) {
            $update['password'] = Hash::make($request->password);
        }

        DB::table('users')
            ->where('users.id', '=', $id)
            ->update($update);

        $user = User::find($id);

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $user->save();

        session()->flash('success', 'User has been updated!!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_user($id)
    {
        if (is_null($this->user) || !$this->user->can('Delete Users')) {
            abort(403, 'Sorry!! You are Unauthorized to Delete Any Users!');
        }

        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted!!');
        return back();
    }
}
