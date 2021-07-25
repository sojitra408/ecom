<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\SoleMaterial;
use App\product_type;
use Auth;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Product Type');
        $pages = DB::table('product_type')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('product-type')|| Auth::user()->can('product-type-add')|| Auth::user()->can('product-type-edit')|| Auth::user()->can('product-type-view')|| Auth::user()->can('product-type-delete'))
        {

        return view('admin.setting.product_type.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Product Type Create');
        
        if(Auth::user()->can('product-type-add'))
        {

        return view('admin.setting.product_type.create',$title);
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
    
   
   
    product_type::create($data);
   
    return redirect()->back()->with(["success"=>"Product Type Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Product Type');
       
         $page = DB::table('product_type')->find($id);
       
        if(Auth::user()->can('product-type-edit')|| Auth::user()->can('product-type-view'))
        {

        return view('admin.setting.product_type.edit',$title, compact('page'));
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
        
        $tax=SoleMaterial::find($id);
        
        
        $tax->title=$request->get("name");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Product Type Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('product_type')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Product Type Deleted Successfully.']);
    }
}
