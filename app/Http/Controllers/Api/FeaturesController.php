<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\features;
use DB;

class FeaturesController extends Controller
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
        return response()->json(features::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'name' => 'required',
            

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $features = features::create($request->all());
        return response()->json(["message" => "Features Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $features = features::findOrFail($id);

        if(is_null($features)){

            return response()->json(["message" => "Features record not found"],200);
            
        }
        
        $features->delete();

        return response()->json(["message" => "Features Deleted Successfully"],200);

        
    }


    public function show($id)
    {
        $features= features::find($id);

        if(is_null($features)){

            return response()->json(["message" => "Features record not found"],200);
            
        }
        
        return response()->json(features::find($id),200);


       
    }

    public function update(Request $request, $id)
    {
        $features= features::find($id);

        if(is_null($features)){

            return response()->json(["message" => "Features record not found"],200);
            
        }

        $features->update($request->all());

        return response()->json(["message" => "Features Update Successfully"],200);

       
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
