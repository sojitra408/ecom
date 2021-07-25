<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\taxes;
use DB;

class TaxController extends Controller
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
        return response()->json(taxes::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'name' => 'required',
            'percentage' => 'required',

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $taxes = taxes::create($request->all());
        return response()->json(["message" => "Taxes Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $taxes = taxes::findOrFail($id);

        if(is_null($taxes)){

            return response()->json(["message" => "Taxes record not found"],200);
            
        }
        
        $taxes->delete();

        return response()->json(["message" => "Taxes Deleted Successfully"],200);

        
    }


    public function show($id)
    {
        $taxes= taxes::find($id);

        if(is_null($taxes)){

            return response()->json(["message" => "Taxes record not found"],200);
            
        }
        
        return response()->json(taxes::find($id),200);


      
    }

    public function update(Request $request, $id)
    {
        $taxes= taxes::find($id);

        if(is_null($taxes)){

            return response()->json(["message" => "Taxes record not found"],200);
            
        }

        $taxes->update($request->all());

        return response()->json(["message" => "Taxes Update Successfully"],200);

        
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