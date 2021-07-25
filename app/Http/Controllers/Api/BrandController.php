<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\Brand;
use DB;

class BrandController extends Controller
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
        return response()->json(Brand::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'brand_name' => 'required',
            'status' => 'required',
            

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $brand = Brand::create($request->all());
        return response()->json(["message" => "Brand Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $brand = Brand::findOrFail($id);

        if(is_null($brand)){

            return response()->json(["message" => "Brand record not found"],200);
            
        }
        
        $brand->delete();

        return response()->json(["message" => "Brand Deleted Successfully"],200);

        
    }


    public function show($id)
    {
        $brand= Brand::find($id);

        if(is_null($brand)){

            return response()->json(["message" => "Brand record not found"],200);
            
        }
        
        return response()->json(brand::find($id),200);


       
    }

    public function update(Request $request, $id)
    {
        $brand= Brand::find($id);

        if(is_null($brand)){

            return response()->json(["message" => "Brand record not found"],200);
            
        }

        $brand->update($request->all());

        return response()->json(["message" => "Brand Update Successfully"],200);

       
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
