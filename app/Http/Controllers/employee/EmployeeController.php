<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\employee\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    public function employee_registration()
    {
        return view('backend.employee_management.employee.employee_registration');
    }

    public function employee_register(Request $request)
    {
        // validation data
        $request->validate([
            'emp_no' => 'required|max:100|unique:employees',
        ], [
            'user_name' => 'required|max:100|unique:employees',
        ]);

        // process data
        $employee = new Employee();

        if ($request->photo) {
            $filename = time() . $request->photo->getClientOriginalName();
            $request->photo->move('public/documents/photo/', $filename);
            $upload_path = 'public/documents/photo/';
            $profile_photo = $upload_path . $filename;
        }

        if ($request->photo) {
            $employee->photo = $profile_photo;
        }

        $employee->emp_no = $request->emp_no;
        $employee->user_name = Str::slug($request->first_name . $request->emp_no, '_');
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->home_phone = $request->home_phone;
        $employee->personal_phone = $request->personal_phone;
        $employee->email = $request->email;

        $employee->marital_status = $request->marital_status;
        $employee->country = $request->country;
        $employee->blood_group = $request->blood_group;
        $employee->religion = $request->religion;
        $employee->gender = $request->gender;
        $employee->hire_date = $request->hire_date;
        $employee->probation_end_date = $request->probation_end_date;

        $employee->emp_type = $request->emp_type;
        $employee->date_of_permanent = $request->date_of_permanent;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->emergency_contact_no = $request->emergency_contact_no;

        $employee->department = $request->department;
        $employee->unit = $request->unit;
        $employee->designation = $request->designation;
        $employee->grade = $request->grade;
        $employee->reporting_to = $request->reporting_to;
        $employee->termination = $request->termination;
        $employee->termination_note = $request->termination_note;

        $employee->save();

        session()->flash('success', 'Data has been added!!');
        return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee_management.employee.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee_management.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation data
        $request->validate([
            'emp_no' => 'required|max:100|unique:employees',
        ], [
            'user_name' => 'required|max:100|unique:employees',
        ]);

        // process data
        $employee = new Employee();

        if ($request->photo) {
            $filename = time() . $request->photo->getClientOriginalName();
            $request->photo->move('public/documents/photo/', $filename);
            $upload_path = 'public/documents/photo/';
            $profile_photo = $upload_path . $filename;
        }

        if ($request->photo) {
            $employee->photo = $profile_photo;
        }

        $employee->emp_no = $request->emp_no;
        $employee->user_name = Str::slug($request->first_name . $request->emp_no, '_');
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->home_phone = $request->home_phone;
        $employee->personal_phone = $request->personal_phone;
        $employee->email = $request->email;

        $employee->marital_status = $request->marital_status;
        $employee->country = $request->country;
        $employee->blood_group = $request->blood_group;
        $employee->religion = $request->religion;
        $employee->gender = $request->gender;
        $employee->hire_date = $request->hire_date;
        $employee->probation_end_date = $request->probation_end_date;

        $employee->emp_type = $request->emp_type;
        $employee->date_of_permanent = $request->date_of_permanent;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->emergency_contact_no = $request->emergency_contact_no;

        $employee->department = $request->department;
        $employee->unit = $request->unit;
        $employee->designation = $request->designation;
        $employee->grade = $request->grade;
        $employee->reporting_to = $request->reporting_to;
        $employee->termination = $request->termination;
        $employee->termination_note = $request->termination_note;

        $employee->save();

        session()->flash('success', 'Employee has been added!!');
        return redirect()->route('employee.index');
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
        $employee = Employee::where('id', $id)->first();
        return view('backend.employee_management.employee.edit', compact('employee'));
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
        $employee = Employee::where('id', $id)->first();
        // process data
        $update = array();

        if ($request->photo) {
            $filename = time() . $request->photo->getClientOriginalName();
            $request->photo->move('public/documents/photo/', $filename);
            $upload_path = 'public/documents/photo/';
            $profile_photo = $upload_path . $filename;
        }

        if ($request->photo) {
            $update['photo'] = $profile_photo;
        }

        $update['user_name'] = Str::slug($request->first_name . $employee->emp_no, '_');
        $update['first_name'] = $request->first_name;
        $update['last_name'] = $request->last_name;
        $update['date_of_birth'] = $request->date_of_birth;
        $update['home_phone'] = $request->home_phone;
        $update['personal_phone'] = $request->personal_phone;
        $update['email'] = $request->email;

        $update['marital_status'] = $request->marital_status;
        $update['country'] = $request->country;
        $update['blood_group'] = $request->blood_group;
        $update['religion'] = $request->religion;
        $update['gender'] = $request->gender;
        $update['hire_date'] = $request->hire_date;
        $update['probation_end_date'] = $request->probation_end_date;

        $update['emp_type'] = $request->emp_type;
        $update['date_of_permanent'] = $request->date_of_permanent;
        $update['present_address'] = $request->present_address;
        $update['permanent_address'] = $request->permanent_address;
        $update['emergency_contact_no'] = $request->emergency_contact_no;

        $update['department'] = $request->department;
        $update['unit'] = $request->unit;
        $update['designation'] = $request->designation;
        $update['grade'] = $request->grade;
        $update['reporting_to'] = $request->reporting_to;
        $update['employment_status'] = 1;
        $update['termination'] = $request->termination;
        $update['termination_note'] = $request->termination_note;

        DB::table('employees')
            ->where('employees.id', '=', $id)
            ->update($update);

        $username = User::where('emp_id', $id)->first();
        if ($username) {
            $update_emp_username = array();
            $update_emp_username['user_name'] = Str::slug($request->first_name . $request->emp_no, '_');
            $update_emp_username['full_name'] = $request->first_name . ' ' . $request->last_name;
            $update_emp_username['email'] = $request->email;

            DB::table('users')
                ->where('users.id', '=', $username->id)
                ->update($update_emp_username);
        }


        session()->flash('success', 'Employee has been updated!!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!is_null($employee)) {
            $employee->delete();
        }

        session()->flash('success', 'Employee has been deleted!!');
        return back();
    }
}
