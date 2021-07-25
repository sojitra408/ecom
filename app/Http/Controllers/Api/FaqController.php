<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\faq;
use DB;

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
    {
        return response()->json(faq::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'question' => 'required',
            'answer' => 'required',
            

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $faq = faq::create($request->all());
        return response()->json(["message" => "Faq Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $faq = faq::findOrFail($id);

        if(is_null($faq)){

            return response()->json(["message" => "Faq record not found"],200);
            
        }
        
        $faq->delete();

        return response()->json(["message" => "Faq Deleted Successfully"],200);

       
    }


    public function show($id)
    {
        $faq= faq::find($id);

        if(is_null($faq)){

            return response()->json(["message" => "Faq record not found"],200);
            
        }
        
        return response()->json(faq::find($id),200);


        
    }

    public function update(Request $request, $id)
    {
        $faq= faq::find($id);

        if(is_null($faq)){

            return response()->json(["message" => "Faq record not found"],200);
            
        }

        $faq->update($request->all());

        return response()->json(["message" => "Faq Update Successfully"],200);

        
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
