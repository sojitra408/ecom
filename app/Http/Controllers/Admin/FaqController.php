<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\faq;
use DB;
use Auth;
class FaqController extends Controller
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
        
		$title 			  = 	array('pageTitle' => 'All Faq');

        $faqs = DB::table('faq')->orderBy('id', 'DESC')->get();

        if(Auth::user()->can('faq-master'))
        {

        return view('admin.faq.index',$title,compact('faqs'));
        }
        return redirect()->back();
    }
	
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Faq');
    if(Auth::user()->can('faq-master'))
        {

    return view("admin.faq.create",$title);
        }
        return redirect()->back();
   
  }

  public function store(Request $request){

    $request->validate([
            'question' => 'required',
            'answer' => 'required',
            

        ], [
            'question.required' => 'Question Name Is Required.',
            'answer.required' => 'Answer Is Required.',
            
            
        ]);
 
      $id=  DB::table('faq')->insertGetId([
            'question'   =>   $request->question,
            'answer'   =>   $request->answer,
         
      ]);
 
   
    return redirect()->back()->with(["success"=>"Faq Saved Successfully!"]);
  }

  public function delete($id)
    {

        $Project = DB::table('faq')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Faq Deleted Successfully.']);
    }


    public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Faq');

        $faq = DB::table('faq')->find($id);
        if(Auth::user()->can('faq-master'))
        {

        return view('admin.faq.edit',$title, compact('faq'));
        }
        return redirect()->back();
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            
            
        ], [
            'question.required' => 'Question Is Required.',
            'answer.required' => 'Answer Is Required.',
            
            
        ]);


        $tax=faq::find($id);
        
        $tax->question=$request->get("question");
        $tax->answer=$request->get("answer");

        $tax->save();

        return redirect()->back()->with(['message' => 'Faq Updated Successfully.']);
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
