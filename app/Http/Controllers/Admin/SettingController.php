<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use DB;
use Auth;

class SettingController extends Controller
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
        
		$title 			  = 	array('pageTitle' => 'Setting List');
        $pages = DB::table('settings')->orderBy('id', 'DESC')->get();

        if(Auth::user()->can('static-page'))
        {

        return view('admin.setting.index',$title,compact('pages'));
        }
        return redirect()->back();

    }

    public function create(Request $request){
 
    $title = array('pageTitle' => 'Setting Create');
 
   if(Auth::user()->can('static-page'))
        {

    return view("admin.setting.create",$title);
        }
        return redirect()->back();
  }

  public function store(Request $request){   
    
         
     $request->validate([
      'title' => 'required',
      'description' => 'required',
      
    ]);

    $data['title']=$request->title;
    $data['description']=$request->description;
   
    Setting::create($data);
   
    return redirect()->back()->with(["success"=>"Page Saved Successfully!"]);
    
 
}

public function destroy($id)
    {

        $Project = DB::table('settings')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Page Deleted Successfully.']);
    }

    public function edit($id)
    {
        //$page_name='project';

        $title = array('pageTitle' => 'Edit Setting');
       
         $page = DB::table('settings')->find($id);
       
       if(Auth::user()->can('static-page'))
        {

        return view('admin.setting.edit',$title, compact('page'));
        }
        return redirect()->back(); 
    }

    public function update(Request $request, $id)
    {
        
        

        $tax=Setting::find($id);
        
        
        $tax->title=$request->get("title");
        $tax->description=$request->get("description");
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Page Updated Successfully.']);
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
