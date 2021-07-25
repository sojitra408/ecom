<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\tags;
use DB;

class TagsController extends Controller
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
        return response()->json(tags::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'name' => 'required',
            

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $tags = tags::create($request->all());
        return response()->json(["message" => "Tags Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $tags = tags::findOrFail($id);

        if(is_null($tags)){

            return response()->json(["message" => "Tags record not found"],200);
            
        }
        
        $tags->delete();

        return response()->json(["message" => "Tags Deleted Successfully"],200);

        
    }


    public function show($id)
    {
        $tags= tags::find($id);

        if(is_null($tags)){

            return response()->json(["message" => "Tags record not found"],200);
            
        }
        
        return response()->json(tags::find($id),200);


       
    }

    public function update(Request $request, $id)
    {
        $tags= tags::find($id);

        if(is_null($tags)){

            return response()->json(["message" => "Tags record not found"],200);
            
        }

        $tags->update($request->all());

        return response()->json(["message" => "Tags Update Successfully"],200);

       
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
