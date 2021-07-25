<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\Pattern;
use Auth;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Pattern List');
        $pages = DB::table('pattern')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('pattern')|| Auth::user()->can('pattern-add')|| Auth::user()->can('pattern-edit')|| Auth::user()->can('pattern-view')|| Auth::user()->can('pattern-delete'))
        {

        return view('admin.setting.pattern.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Pattern Create');
        
        if(Auth::user()->can('pattern-add'))
        {

        return view('admin.setting.pattern.create',$title);
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
    
   
   
    Pattern::create($data);
   
    return redirect()->back()->with(["success"=>"Pattern Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Pattern');
       
         $page = DB::table('pattern')->find($id);
       
        if(Auth::user()->can('pattern-edit')|| Auth::user()->can('pattern-view'))
        {

        return view('admin.setting.pattern.edit',$title, compact('page'));
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
        
        $tax=Pattern::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Pattern Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('pattern')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Pattern Deleted Successfully.']);
    }
}
