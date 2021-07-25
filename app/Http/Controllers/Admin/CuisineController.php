<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\Cuisine;
use Auth;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Cuisine List');
        $pages = DB::table('cuisine')->orderBy('id', 'DESC')->get();

        if(Auth::user()->can('cuisine')|| Auth::user()->can('cuisine-add')|| Auth::user()->can('cuisine-edit')|| Auth::user()->can('cuisine-view')|| Auth::user()->can('cuisine-delete'))
        {

        return view('admin.setting.cuisine.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Cuisine Create');
        
        if(Auth::user()->can('cuisine-add'))
        {

        return view('admin.setting.cuisine.create',$title);
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
    
   
   
    Cuisine::create($data);
   
    return redirect()->back()->with(["success"=>"Cuisine Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Cuisine');
       
         $page = DB::table('cuisine')->find($id);
       
        if(Auth::user()->can('cuisine-edit')|| Auth::user()->can('cuisine-view'))
        {

        return view('admin.setting.cuisine.edit',$title, compact('page'));
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
        
        $tax=Cuisine::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Cuisine Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('cuisine')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Cuisine Deleted Successfully.']);
    }
}
