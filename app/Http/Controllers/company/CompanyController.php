<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\company\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $company = Company::find(1);
        return view('backend.company_management.company', compact('company'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $formData = $request->validate([
            'company_name' => 'required',
        ]);

        $formData['email'] = $request->email;
        $formData['contact_no_1'] = $request->contact_no_1;
        $formData['contact_no_2'] = $request->contact_no_2;
        $formData['fax'] = $request->fax;
        $formData['address_1'] = $request->address_1;
        $formData['address_2'] = $request->address_2;
        $formData['city'] = $request->city;
        $formData['district'] = $request->district;
        $formData['division'] = $request->division;
        $formData['state'] = $request->state;
        $formData['country'] = $request->country;

        $formData['website'] = $request->website;
        $formData['linkedin'] = $request->linkedin;
        $formData['facebook'] = $request->facebook;
        $formData['youtube'] = $request->youtube;
        $formData['twitter'] = $request->twitter;
        $formData['instagram'] = $request->instagram;

        $status = strtolower($request->is_active);
        if ($status == 'active') {
            $formData['is_active'] = true;
        }else{
            $formData['is_active'] = false;
        }
        
        if ($request->hasFile('logo')) {
            $formData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        if($request->hasFile('banner')){
            $formData['banner'] = $request->file('banner')->store('logos', 'public');
        }

        Company::where('id', $id)->update($formData);
        return redirect()->route('company.index')->with('success', 'Company update successfully !!');
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
