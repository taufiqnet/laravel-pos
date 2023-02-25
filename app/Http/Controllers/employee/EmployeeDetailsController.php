<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\employee\Employee;
use App\Models\employee\EmployeeDetails;
use Illuminate\Http\Request;

class EmployeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('backend.employee_management.employee_details.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // process data
        $employee = new EmployeeDetails();

        if ($request->ssc_certificate) {
            $filename = time() . $request->ssc_certificate->getClientOriginalName();
            $request->ssc_certificate->move('public/documents/certificate/', $filename);
            $upload_path = 'public/documents/certificate/';
            $ssc_certificate = $upload_path . $filename;
        }

        if ($request->hsc_certificate) {
            $filename = time() . $request->hsc_certificate->getClientOriginalName();
            $request->hsc_certificate->move('public/documents/certificate/', $filename);
            $upload_path = 'public/documents/certificate/';
            $hsc_certificate = $upload_path . $filename;
        }

        if ($request->honors_certificate) {
            $filename = time() . $request->honors_certificate->getClientOriginalName();
            $request->honors_certificate->move('public/documents/certificate/', $filename);
            $upload_path = 'public/documents/certificate/';
            $honors_certificate = $upload_path . $filename;
        }

        if ($request->masters_certificate) {
            $filename = time() . $request->masters_certificate->getClientOriginalName();
            $request->masters_certificate->move('public/documents/certificate/', $filename);
            $upload_path = 'public/documents/certificate/';
            $masters_certificate = $upload_path . $filename;
        }

        if ($request->resume) {
            $filename = time() . $request->resume->getClientOriginalName();
            $request->resume->move('public/documents/resume/', $filename);
            $upload_path = 'public/documents/resume/';
            $resume = $upload_path . $filename;
        }

        if ($request->personal_file) {
            $filename = time() . $request->personal_file->getClientOriginalName();
            $request->personal_file->move('public/documents/otherfile/', $filename);
            $upload_path = 'public/documents/otherfile/';
            $personal_file = $upload_path . $filename;
        }

        if ($request->ssc_certificate) {
            $employee->ssc_certificate = $ssc_certificate;
        }

        if ($request->hsc_certificate) {
            $employee->hsc_certificate = $hsc_certificate;
        }

        if ($request->honors_certificate) {
            $employee->honors_certificate = $honors_certificate;
        }

        if ($request->masters_certificate) {
            $employee->masters_certificate = $masters_certificate;
        }

        if ($request->resume) {
            $employee->resume = $resume;
        }

        if ($request->personal_file) {
            $employee->personal_file = $personal_file;
        }

        $employee->emp_id = $id;
        $employee->emp_no = $request->emp_no;
        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->spouse = $request->spouse;
        $employee->tin = $request->tin;
        $employee->nid = $request->nid;
        $employee->education = $request->education;

        $employee->training = $request->training;
        $employee->experience = $request->experience;

        $employee->save();

        session()->flash('success', 'Employee details has been added!!');
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
        $employee = Employee::where('id', $id)->first();
        return view('backend.employee_management.employee_details.view', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
