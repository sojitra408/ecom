<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\Reviews;
use Auth;
class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Reviews List');
        $pages = DB::table('reviews')->select('reviews.id as id','reviews.review_title','reviews.review_description','reviews.rating','reviews.image','reviews.status','products.id as products_id','products.product_name')->leftjoin('products','reviews.product_id','products.id')->orderBy('id', 'DESC')->get();
    if(Auth::user()->can('reviews'))
    {

    
        return view('admin.reviews.index',$title,compact('pages'));
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
        // $title            =     array('pageTitle' => 'Reviews Create');
        
        // return view('admin.setting.about.create',$title);
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
    //     $request->validate([
    //   'title' => 'required',
    //   'date' => 'required',
    //   'description' => 'required',
    //   'link' => 'required',
    //   'image' => 'required',
      
      
    // ]);
    //     $p_img=$request->image;
        
    //       $pimageName=$p_img->getClientOriginalName();
    //       $p_img->move('public/images',$pimageName);
    //       $formInput['image']=$pimageName;

    // $data['title']=$request->title;
    // $data['date']=$request->date;
    // $data['description']=$request->description;
    // $data['link']=$request->link;
    // $data['image']=$pimageName;
    // $data['status']=$request->status;
   
   
   
    // About::create($data);
   
    // return redirect()->back()->with(["success"=>"About Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Reviews');
       
         $page = DB::table('reviews')->select('reviews.id as id','reviews.review_title','reviews.review_description','reviews.rating','reviews.image','reviews.status','products.id as products_id','products.product_name')->leftjoin('products','reviews.product_id','products.id')->where('reviews.id',$id)->first();
       // dd($id);
        if(Auth::user()->can('reviews'))
    {

    
        return view('admin.reviews.edit',$title, compact('page'));
        
    }
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
        // $p_img=$request->image;

       

        // if(!empty($p_img)){

        //   $pimageName=$p_img->getClientOriginalName();
        //   $p_img->move('public/images',$pimageName);
        //   $formInput['image']=$pimageName;

        //   $user=About::find($id);

        //   $user->image= $pimageName;

        //   $user->save();

        // }

        if($request->status==NULL) { $status=0; } else { $status=1; }

        $tax=Reviews::find($id);
        
        
        // $tax->title=$request->get("title");
        // $tax->date=$request->get("date");
        // $tax->description=$request->get("description");
        // $tax->link=$request->get("link");
        $tax->status=$status;
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Reviews Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $Project = DB::table('about')->where('id',$id)->delete();
        // //$Project->delete();
        // return redirect()->back()->with(['message' => 'About Deleted Successfully.']);
    }
}
