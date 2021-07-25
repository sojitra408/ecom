<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\MaterialCare;
use Auth;

class MaterialCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Material Care List');
        $pages = DB::table('material_care')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('material-care')|| Auth::user()->can('material-care-add')|| Auth::user()->can('material-care-edit')|| Auth::user()->can('material-care-view')|| Auth::user()->can('material-care-delete'))
        {

        return view('admin.setting.material_care.index',$title,compact('pages'));
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title            =     array('pageTitle' => 'Material Care Create');
        
        if(Auth::user()->can('material-care-add'))
        {

        return view('admin.setting.material_care.create',$title);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
      'name' => 'required',
     
      
      
    ]);
        

    $data['name']=$request->name;
    
    
   
   
    MaterialCare::create($data);
   
    return redirect()->back()->with(["success"=>"Material Care Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Material Care');
       
         $page = DB::table('material_care')->find($id);
       
        if(Auth::user()->can('material-care-edit')|| Auth::user()->can('material-care-view'))
        {

        return view('admin.setting.material_care.edit',$title, compact('page'));
        }
        return redirect()->back();
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
        
        $tax=MaterialCare::find($id);
        
        
        $tax->name=$request->get("name");
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Material Care Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('material_care')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Material Care Deleted Successfully.']);
    }
}
