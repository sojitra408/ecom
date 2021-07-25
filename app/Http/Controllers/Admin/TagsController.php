<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\tags;
use Auth;

class TagsController extends Controller
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
        
        $title            =     array('pageTitle' => 'All Tags');

        $tags = DB::table('tags')->orderBy('id', 'DESC')->get();

        if(Auth::user()->can('tags'))
        {
            return view('admin.tags.index',$title,compact('tags'));

        }
        return redirect()->back();
    }
    
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Tags');
 
    if(Auth::user()->can('tags'))
        {
           

    return view("admin.tags.create",$title);
        }
        return redirect()->back();
  }
      
  public function store(Request $request){

    $request->validate([
            'name' => 'required',
           
            

        ], [
            'name.required' => 'Name Is Required.',
           
            
            
        ]);
 
      $id=  DB::table('tags')->insertGetId([
            'name'   =>   $request->name,
            
         
      ]);
 
   
    return redirect()->back()->with(["success"=>"Tags Saved Successfully!"]);
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
