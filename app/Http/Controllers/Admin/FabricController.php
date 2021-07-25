<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\Fabric;
use Auth;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Fabric List');
        $pages = DB::table('fabric')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('fabric') || Auth::user()->can('fabric-add')|| Auth::user()->can('fabric-edit')|| Auth::user()->can('fabric-view')|| Auth::user()->can('fabric-delete'))
        {

        return view('admin.setting.fabric.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Fabric Create');
        
        if(Auth::user()->can('fabric-add'))
        {

        return view('admin.setting.fabric.create',$title);
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
    
   
   
    Fabric::create($data);
   
    return redirect()->back()->with(["success"=>"Fabric Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Fabric');
       
         $page = DB::table('fabric')->find($id);
       
        if(Auth::user()->can('fabric-edit')|| Auth::user()->can('fabric-view'))
        {

        return view('admin.setting.fabric.edit',$title, compact('page'));
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
        
        $tax=Fabric::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Fabric Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('fabric')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Fabric Deleted Successfully.']);
    }
}
