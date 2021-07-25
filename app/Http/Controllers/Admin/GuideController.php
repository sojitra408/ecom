<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\Create_master_size;
use App\Size_category;
use App\Master_size;
use Auth;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Guide List');
        $pages = DB::table('create_master_size')->select('create_master_size.*','size_category.name as category_name')->leftjoin('size_category','create_master_size.size_category_id','size_category.id')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('page-guide'))
        {
                
        return view('admin.setting.guide.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'About Create');
        $pages = DB::table('size_category')->get();
        if(Auth::user()->can('page-guide'))
        {
                
        return view('admin.setting.guide.create',$title,compact('pages'));
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
      'size_category' => 'required',
      'image' => 'required',
      
      
    ]);

        $size = $request->size_category;

        $master_size_id = Master_size::where('size_category_id',$size)->first();



        $p_img=$request->image;
        
          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

    $data['name']=$request->name;
    $data['size_category_id']=$request->size_category;
    $data['master_size_id']=$master_size_id->id;
    $data['size']=$master_size_id->size;
    $data['brand_size']=$master_size_id->brand_size;
    $data['chest_in']=$master_size_id->chest_in;
    $data['to_fit_waist']=$master_size_id->to_fit_waist;
    $data['inseam_length']=$master_size_id->inseam_length;
    $data['outseam_length']=$master_size_id->outseam_length;
    $data['to_fit_hip']=$master_size_id->to_fit_hip;
    $data['across_shoulder']=$master_size_id->across_shoulder;
    $data['sleeve_length']=$master_size_id->sleeve_length;
    $data['to_fit_foot_length']=$master_size_id->to_fit_foot_length;
    $data['image']=$pimageName;
   
   
   
    Create_master_size::create($data);
   
    return redirect()->back()->with(["success"=>"Size Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Size');
       
         $page = DB::table('create_master_size')->find($id);
         $size_category = DB::table('size_category')->get();

         if(Auth::user()->can('page-guide'))
        {
                
        return view('admin.setting.guide.edit',$title, compact('page','size_category'));
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
        $p_img=$request->image;

       

        if(!empty($p_img)){

          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

          $user=create_master_size::find($id);

          $user->image= $pimageName;

          $user->save();

        }

        $tax=create_master_size::find($id);
        
        
        $tax->size=$request->get("size");
        $tax->brand_size=$request->get("brand_size");
        $tax->chest_in=$request->get("chest_in");
        $tax->to_fit_waist=$request->get("to_fit_waist");
        $tax->inseam_length=$request->get("inseam_length");
        $tax->outseam_length=$request->get("outseam_length");
        $tax->to_fit_hip=$request->get("to_fit_hip");
        $tax->across_shoulder=$request->get("across_shoulder");
        $tax->sleeve_length=$request->get("sleeve_length");
        $tax->to_fit_foot_length=$request->get("to_fit_foot_length");
        
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Size Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('create_master_size')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Size Deleted Successfully.']);
    }
}
