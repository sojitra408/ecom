<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\taxes;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct()
	 {
 
	 
	 }
    public function index()
    {$seller=array();
        
		$title 			  = 	array('pageTitle' => 'Tax List');
        $tax = DB::table('taxes')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('taxes')||Auth::user()->can('taxes-add')|| Auth::user()->can('taxes-edit')|| Auth::user()->can('taxes-view')||Auth::user()->can('taxes-delete'))
        {

        return view('admin.taxes.index',$title,compact('tax'))->with('seller',$seller);
        }
        return redirect()->back();
    }

    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Tax');
 
    if(Auth::user()->can('taxes-add'))
        {

    return view("admin.taxes.create",$title);
        }   
        return redirect()->back();
  }

  public function store(Request $request){

    $request->validate([
            'tax_name' => 'required',
            'tax_percentage' => 'required',
            
        ], [
            'tax_name.required' => 'Tax Name Is Required.',
            'tax_percentage.required' => 'Percentage Is Required.',
            
        ]);
 
      $id=  DB::table('taxes')->insertGetId([
            'name'   =>   $request->tax_name,
            'percentage'   =>   $request->tax_percentage,
      ]);
 
   
    return redirect()->back()->with(["success"=>"Tax Saved Successfully!"]);
  }
	
    public function destroy($id)
    {

        $Project = DB::table('taxes')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Taxes Deleted Successfully.']);
    }

    public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Add Tax');

        $project = DB::table('taxes')->find($id);
        if(Auth::user()->can('taxes-edit')|| Auth::user()->can('taxes-view'))
        {

        return view('admin.taxes.edit',$title, compact('project'));
        }
        return redirect()->back();
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tax_name' => 'required',
            'tax_percentage' => 'required',
            
        ], [
            'tax_name.required' => 'Tax Name Is Required.',
            'tax_percentage.required' => 'Percentage Name Is Required.',
            
        ]);


        $tax=Taxes::find($id);
        
        $tax->name=$request->get("tax_name");
        $tax->percentage=$request->get("tax_percentage");
        $tax->save();

        return redirect()->back()->with(['message' => 'Taxes Updated Successfully.']);
    }
	  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
