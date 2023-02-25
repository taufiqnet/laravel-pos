<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\Controller;
use App\Models\branch\Branch;
use App\Models\company\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::find(1);
        $branches = Branch::all();
        return view('backend.branch.index', compact('branches', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::find(1);
        return view('backend.branch.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'branch_name' => 'required|unique:branches',
            'email' => 'required|unique:branches',
        ]);
        $formData['address'] = $request->address;
        $formData['contact_no_1'] = $request->contact_no_1;
        $formData['contact_no_2'] = $request->contact_no_2;
        $formData['fax'] = $request->fax;
        
        $company = Company::find(1);
        $formData['company'] = $company->company_name;

        Branch::create($formData);

        return redirect()->route('branch.index')->with('success', 'Branch Created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $company = Company::find(1);
        $branch = Branch::findOrFail($id);
        return view('backend.branch.view', compact('company', 'branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find(1);
        $branch = Branch::findOrFail($id);
        return view('backend.branch.edit', compact('company', 'branch'));
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
        $formData = $request->validate([
            'branch_name' =>  'required|unique:branches,branch_name,'.$id,
            'email' => 'required|unique:branches,email,'.$id,
        ]);
        $formData['address'] = $request->address;
        $formData['contact_no_1'] = $request->contact_no_1;
        $formData['contact_no_2'] = $request->contact_no_2;
        $formData['fax'] = $request->fax;
        
        $company = Company::find(1);
        $formData['company'] = $company->company_name;

        Branch::where('id', $id)->update($formData);

        return redirect()->route('branch.index')->with('success', 'Branch Updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::Where('id', $id)->delete();
        return redirect()->route('branch.index')->with('success', 'Branch Deleted successfully !!');
    }
}
