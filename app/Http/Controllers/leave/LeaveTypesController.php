<?php

namespace App\Http\Controllers\leave;

use App\Http\Controllers\Controller;
use App\Models\leave\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LeaveTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_types = LeaveType::all();
        return view('backend.leave_type.leave_types', compact('leave_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.leave_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|unique:leave_types|max:255',
            'description' => 'required',
            'max_day' => 'required|integer',
            'status' => 'required'
        ]);
        
        LeaveType::create([
            'leave_type' => $request->leave_type,
            'description' => $request->description,
            'max_day' => $request->max_day,
            'status' => $request->status
        ]);

        // add fillable in the Model Post 

        return redirect(route('leavetypes.index'));

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
        $leave_types = LeaveType::where('id', $id)->first();
        return view('backend.leave_type.edit', compact('leave_types'));
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
        $request->validate([
            'leave_type' => 'required|max:255|unique:leave_types,leave_type,' . $id,
            'description' => 'required',
            'max_day' => 'required|integer',
            'status' => 'required'
        ]);

        LeaveType::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));

        return redirect(route('leavetypes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // LeaveType::destroy($id);

        // return redirect(route('leavetypes.index'))->with('message', 'Leave Type has been deleted');

        $leave_type = LeaveType::find($id);
        if (!is_null($leave_type)) {
            $leave_type->delete();
        }

        session()->flash('success', 'Leave Type has been deleted!!');
        return back();
    }
}
