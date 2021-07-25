<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\SkinType;
use Auth;
class SkinTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Skin Type List');
        $pages = DB::table('skin_type')->orderBy('id', 'DESC')->get();

        if(Auth::user()->can('skin-type'))
        {

        return view('admin.setting.skin_type.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Skin Type Create');
        
        if(Auth::user()->can('skin-type'))
        {

        return view('admin.setting.skin_type.create',$title);
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
    
   
   
    SkinType::create($data);
   
    return redirect()->back()->with(["success"=>"Skin Type Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Skin Type');
       
         $page = DB::table('skin_type')->find($id);
       
        if(Auth::user()->can('skin-type'))
        {

        return view('admin.setting.skin_type.edit',$title, compact('page'));
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
        
        $tax=SkinType::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Skin Type Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('skin_type')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Skin Type Deleted Successfully.']);
    }
}
