<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SubUnitController extends Controller
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
         $unit =DB::table('sub_unit')->select('sub_unit.*','unit.unit')->join('unit','sub_unit.unit_id','unit.id')->get();
		$title 			  = 	array('pageTitle' => 'Sub Unit List');
        return view('admin.subunit.index',$title)->with('unit',$unit);
    }
	
	 public function display()
    {
        $unit =DB::table('sub_unit')->select('sub_unit.*','unit.unit')->join('unit','sub_unit.unit_id','unit.id')->get();
		$title 			  = 	array('pageTitle' => 'Sub Unit List');
        return view('admin.subunit.index',$title)->with('unit',$unit);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $unit =DB::table('unit')->get();
		 $subunit =DB::table('sub_unit')->get();
		$title 			  = 	array('pageTitle' => 'Sub Unit Create');
        return view('admin.subunit.create',$title)->with('unit',$unit)->with('subunit',$subunit);
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
            'unit_title' => 'required|string|max:255',
			 'unit_id' => 'required',
			  'unit_value' => 'required'
            
        ]);
        
        DB::table('sub_unit')->insertGetId([
            'sub_title'   =>   $request->unit_title,
             'unit_id'   =>   $request->unit_id,
			  'unit_value'   =>   $request->unit_value,
        ]);
        
        return redirect(route('subunit.display'))->with('message','Sub Unit Created Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	
	 
         $unit =DB::table('unit')->get();
		  $subunit =DB::table('sub_unit')->where('id',$id)->get();
		 
		// echo print_r($unit);die;
       
		 $title 			  = 	array('pageTitle' => 'Edit Sub Unit');
        
		return view('admin.subunit.edit',$title)->with('unit',$unit)->with('subunit',$subunit[0]);
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
            'unit_title' => 'required|string|max:255',
			 'unit_id' => 'required',
			  'unit_value' => 'required'
           
        ]);
		 
        DB::table('sub_unit')->where('id',$request->id)->update([
            'unit_id'   =>   $request->unit_id,
			 'sub_title'   =>   $request->unit_title,
			   'unit_value'   =>   $request->unit_value,
            
            
        ]);
        return redirect(route('subunit.display'))->with('message','Unit updated successfully');
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
        return redirect (route('unit.display'))->with('message','Unit Deleted Successfully');
    }
}
