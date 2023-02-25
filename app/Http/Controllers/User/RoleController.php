<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('View Roles')) {
            abort(403, 'Sorry!! You are Unauthorized to view any role!');
        }

        $roles = Role::all();
        return view('backend.user_management.role.roles', compact('roles'));
    }

    public function create_role()
    {
        if (is_null($this->user) || !$this->user->can('Create Role')) {
            abort(403, 'Sorry!! You are Unauthorized to Create any role!');
        }

        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.user_management.role.create', compact('all_permissions', 'permission_groups'));
    }

    public function store_role(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('Create Role')) {
            abort(403, 'Sorry!! You are Unauthorized to Create any role!');
        }

        // validation data
        $request->validate([
            'name' => 'required|max:100|unique:roles',
        ], [
            'name.required' => 'Please give a role name'
        ]);

        // process data
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been created!!');
        return back();
    }

    public function edit_role($id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Roles')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Role!');
        }

        $role = Role::where('id', $id)->first();
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.user_management.role.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    public function update_role(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Roles')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Role!');
        }

        // validation data
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.required' => 'Please give a role name'
        ]);

        // process data
        $role = Role::findById($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->update(['name' => $request->name]);
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been updated!!');
        return back();
    }

    public function delete_role($id)
    {

        if (is_null($this->user) || !$this->user->can('Delete Roles')) {
            abort(403, 'Sorry!! You are Unauthorized to edit any role!');
        }

        $role = Role::find($id);
        if (!is_null($role)) {
            $role->delete();
        }

        session()->flash('success', 'Role has been deleted!!');
        return back();
    }
}
