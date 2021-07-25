<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Company $company)
	 {
	 $this->company=$company;
	 
	 }
    public function index()
    {
         $company = Company::all();
		$title 			  = 	array('pageTitle' => 'Company List');
        return view('admin.company.index',$title)->with('company',$company);
    }
	
	 public function display()
    {
       $company = Company::all();
		$title 			  = 	array('pageTitle' => 'Company List');
        return view('admin.company.index',$title)->with('company',$company);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $company = Company::all();
		$title 			  = 	array('pageTitle' => 'Company Create');
        return view('admin.company.create',$title)->with('company',$company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_title' => 'required|string|max:255',
            'company_description' => 'required|string|max:500',
             'address' => 'required|string|max:255'
        ]);
        
        $company =$this->company->create($request->all());
        
        return redirect(route('company.display'))->with('message','Company Created Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
       
		 $title 			  = 	array('pageTitle' => 'Edit Company');
        
		return view('admin.company.edit',$title)->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'company_title' => 'required|string|max:255',
            'company_description' => 'required|string|max:500',
             'address' => 'required|string|max:255'
        ]);
        $company =$this->company->update_data($request->all());
        return redirect(route('company.display'))->with('message','Comapny updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = admin::find($id);
        $users->roles()->detach();
        $users->delete();
        return redirect (route('company.index'))->with('message','Admin User Deleted Successfully');
    }
}
