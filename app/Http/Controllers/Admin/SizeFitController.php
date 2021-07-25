<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\SizeFit;
use Auth;

class SizeFitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Size Fit List');
        $pages = DB::table('size_fit')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('size-fit'))
        {

        return view('admin.setting.size_fit.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Size Fit Create');
        
        if(Auth::user()->can('size-fit'))
        {
        return view('admin.setting.size_fit.create',$title);

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
    
   
   
    SizeFit::create($data);
   
    return redirect()->back()->with(["success"=>"Size Fit Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Size Fit');
       
         $page = DB::table('size_fit')->find($id);
       
       if(Auth::user()->can('size-fit'))
        {
        return view('admin.setting.size_fit.edit',$title, compact('page'));

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
        
        $tax=SizeFit::find($id);
        
        
        $tax->name=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Size Fit Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('size_fit')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Size Fit Deleted Successfully.']);
    }
}
