<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
        if (is_null($this->user) || !$this->user->can('View Permissions')) {
            abort(403, 'Sorry!! You are Unauthorized to View Any Permissions!');
        }

        $permissions = Permission::all();
        return view('backend.user_management.permission.permissions', compact('permissions'));
    }

    public function create_permission()
    {
        if (is_null($this->user) || !$this->user->can('Create Permissions')) {
            abort(403, 'Sorry!! You are Unauthorized to Create Any Permissions!');
        }

        $permission_groups = PermissionGroup::all();
        return view('backend.user_management.permission.create', compact('permission_groups'));
    }

    public function store_permission(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('Create Permissions')) {
            abort(403, 'Sorry!! You are Unauthorized to Create Any Permissions!');
        }

        // validation data
        $request->validate([
            'name' => 'required|max:100|unique:permissions',
        ], [
            'name.required' => 'Please give a permission name'
        ], [
            'group_name' => 'required|max:100|unique:permissions',
        ],);

        $group = PermissionGroup::where('id', $request->group_id)->first();

        // process data
        $data = new Permission();
        $data->name = $request->name;
        $data->group_id = $request->group_id;
        $data->group_name = $group->name;

        $data->save();

        session()->flash('success', 'Permission has been created!!');
        return back();
    }

    public function edit_permission($id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Permissions')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Permissions!');
        }

        $permission = Permission::where('id', $id)->first();
        $permission_groups = PermissionGroup::all();
        return view('backend.user_management.permission.edit', compact('permission', 'permission_groups'));
    }

    public function update_permission(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Permissions')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Permissions!');
        }

        // validation data
        $request->validate([
            'name' => 'required|max:100|unique:permissions,name,' . $id
        ], [
            'group_name.required' => 'Please give a permission name'
        ]);

        $group = PermissionGroup::where('id', $request->group_id)->first();

        // process data
        $update = array();
        $update['name'] = $request->name;
        $update['group_id'] = $request->group_id;
        $update['group_name'] = $group->name;

        DB::table('permissions')
            ->where('permissions.id', '=', $id)
            ->update($update);

        session()->flash('success', 'Permission has been updated!!');
        return back();
    }

    public function delete_permission($id)
    {
        if (is_null($this->user) || !$this->user->can('Delete Permissions')) {
            abort(403, 'Sorry!! You are Unauthorized to Delete Any Permissions!');
        }

        DB::table('permissions')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Permission has been deleted!!');
        return back();
    }


    public function create_group()
    {
        if (is_null($this->user) || !$this->user->can('Create Groups')) {
            abort(403, 'Sorry!! You are Unauthorized to Create Any Groups!');
        }

        $permission_groups = PermissionGroup::orderBy('order_no', 'asc')->get();
        return view('backend.user_management.group.create', compact('permission_groups'));
    }

    public function store_group(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('Create Groups')) {
            abort(403, 'Sorry!! You are Unauthorized to Create Any Groups!');
        }

        // validation data
        $request->validate([
            'name' => 'required|max:100|unique:permission_groups',
        ],);

        $data = new PermissionGroup();
        $data->name = $request->name;
        $data->order_no = $request->order_no;

        $data->save();

        session()->flash('success', 'Permission group has been created!!');
        return back();
    }

    public function edit_group($id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Groups')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Groups!');
        }

        $group = PermissionGroup::where('id', $id)->first();
        $all_groups = PermissionGroup::all();
        return view('backend.user_management.group.edit', compact('group', 'all_groups'));
    }

    public function update_group(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('Edit Groups')) {
            abort(403, 'Sorry!! You are Unauthorized to Edit Any Groups!');
        }

        // validation data
        $request->validate([
            'name' => 'required|max:100|unique:permission_groups,name,' . $id
        ]);


        // process data
        $update = array();
        $update['name'] = $request->name;
        $update['order_no'] = $request->order_no;

        DB::table('permission_groups')
            ->where('permission_groups.id', '=', $id)
            ->update($update);

        session()->flash('success', 'Permission group has been updated!!');
        return back();
    }

    public function delete_group($id)
    {
        if (is_null($this->user) || !$this->user->can('Delete Groups')) {
            abort(403, 'Sorry!! You are Unauthorized to Delete Any Groups!');
        }

        DB::table('permission_groups')
            ->where('id', $id)
            ->delete();

        session()->flash('success', 'Permission group has been deleted!!');
        return back();
    }
}
