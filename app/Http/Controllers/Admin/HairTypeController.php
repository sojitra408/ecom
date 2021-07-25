<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\HairType;
use Auth;

class HairTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Hair Type List');
        $pages = DB::table('hair_type')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('hair-type'))
        {

        return view('admin.setting.hair_type.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Hair Type Create');
        
        if(Auth::user()->can('hair-type'))
        {

        return view('admin.setting.hair_type.create',$title);
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
        

    $data['title']=$request->name;
    
   
   
    HairType::create($data);
   
    return redirect()->back()->with(["success"=>"Hair Type Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Hair Type');
       
         $page = DB::table('hair_type')->find($id);
       
       if(Auth::user()->can('hair-type'))
        {

        return view('admin.setting.hair_type.edit',$title, compact('page'));
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
        $request->validate([
      'name' => 'required',
     
      
      
    ]);
        
        $tax=HairType::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Hair Type Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('hair_type')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Hair Type Deleted Successfully.']);
    }
}
