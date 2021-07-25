<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\Neck;
use Auth;

class NeckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Neck List');
        $pages = DB::table('neck')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('neck')|| Auth::user()->can('neck-add')|| Auth::user()->can('neck-edit')|| Auth::user()->can('neck-view')|| Auth::user()->can('neck-delete'))
        {

        return view('admin.setting.neck.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Neck Create');
        
        if(Auth::user()->can('neck-add'))
        {

        return view('admin.setting.neck.create',$title);
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
    
   
   
    Neck::create($data);
   
    return redirect()->back()->with(["success"=>"Neck Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Neck');
       
         $page = DB::table('neck')->find($id);
       
        if(Auth::user()->can('neck-edit')|| Auth::user()->can('neck-view'))
        {

        return view('admin.setting.neck.edit',$title, compact('page'));
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
        
        $tax=Neck::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Neck Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('neck')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Neck Deleted Successfully.']);
    }
}
