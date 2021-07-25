<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\faq;
use DB;
use App\HelpCenter;
use App\Category;
use App\Help_Categories;
use Auth;

class HelpCenterController extends Controller
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
        
		$title 			  = 	array('pageTitle' => 'All Help Center');

        $faqs = DB::table('help_center')->select('help_center.*','help_categories.name as category_name')->leftjoin('help_categories','help_center.category_id','help_categories.id')->orderBy('id', 'DESC')->get();

        if(Auth::user()->can('help-center')||Auth::user()->can('help-center-add')||Auth::user()->can('help-center-edit')||Auth::user()->can('help-center-view')||Auth::user()->can('help-center-delete'))
        {

        return view('admin.help_center.index',$title,compact('faqs'));
        }
        return redirect()->back();

    }
	
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Help Center');
 
    $all_category = Help_Categories::where('parent_id',0)->get();

    if(Auth::user()->can('help-center-add'))
        {

    return view("admin.help_center.create",$title,compact('all_category'));
        }
        return redirect()->back();

  }

  public function store(Request $request){

    $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category' => 'required'

        ], [
            'question.required' => 'Question Name Is Required.',
            'answer.required' => 'Answer Is Required.',
            'category.required' => 'Category Is Required.'
            
        ]);
 
      $id=  DB::table('help_center')->insertGetId([
            'question'   =>   $request->question,
            'answer'   =>   $request->answer,
            'category_id'   =>   $request->category,
         
      ]);
 
   
    return redirect()->back()->with(["success"=>"Help Center Saved Successfully!"]);
  }

  public function delete($id)
    {

        $Project = DB::table('help_center')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Help Center Deleted Successfully.']);
    }


    public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Help Center');

        $faq = DB::table('help_center')->find($id);
        $all_category = Help_Categories::where('parent_id',0)->get();

        if(Auth::user()->can('help-center-edit')||Auth::user()->can('help-center-view'))
        {

        return view('admin.help_center.edit',$title, compact('faq','all_category'));
        }
        return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category' => 'required',
            
        ], [
            'question.required' => 'Question Is Required.',
            'answer.required' => 'Answer Is Required.',
            'category.required' => 'Category Is Required.'
            
        ]);


        $tax=HelpCenter::find($id);
        
        $tax->question=$request->get("question");
        $tax->answer=$request->get("answer");
        $tax->category_id=$request->get("category");

        $tax->save();

        return redirect()->back()->with(['message' => 'Help Center Updated Successfully.']);
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
