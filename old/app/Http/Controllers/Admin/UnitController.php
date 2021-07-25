<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UnitController extends Controller
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
         $unit =DB::table('unit')->get();
		$title 			  = 	array('pageTitle' => 'unit List');
        return view('admin.unit.index',$title)->with('unit',$unit);
    }
	
	 public function display()
    {
        $unit =DB::table('unit')->get();
		$title 			  = 	array('pageTitle' => 'unit List');
        return view('admin.unit.index',$title)->with('unit',$unit);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $unit =DB::table('unit')->get();
		$title 			  = 	array('pageTitle' => 'unit Create');
        return view('admin.unit.create',$title)->with('unit',$unit);
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
            'unit_title' => 'required|string|max:255'
            
        ]);
        
        DB::table('unit')->insertGetId([
            'unit'   =>   $request->unit_title,
             
        ]);
        
        return redirect(route('unit.display'))->with('message','Company Created Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	
	 
         $unit =DB::table('unit')->where('id',$id)->get();
		 
		// echo print_r($unit);die;
       
		 $title 			  = 	array('pageTitle' => 'Edit Unit');
        
		return view('admin.unit.edit',$title)->with('unit',$unit[0]);
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
            'unit_title' => 'required|string|max:255'
           
        ]);
        DB::table('unit')->where('id',$request->id)->update([
            'unit'   =>   $request->unit_title
            
            
        ]);
        return redirect(route('unit.display'))->with('message','Unit updated successfully');
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
