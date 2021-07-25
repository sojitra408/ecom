<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\discount;
use App\Category;
use App\Products;
use DB;

class DiscountController extends Controller
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
        return response()->json(discount::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'discount_name' => 'required',
            'option'=> 'required|in:product,categories,flats' ,
            'minimum_price'=>'required',
            'discount_fix'=>'required|in:percentage,fix' ,
            

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $discount = discount::create($request->all());
        return response()->json(["message" => "Discount Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $discount = discount::findOrFail($id);

        if(is_null($discount)){

            return response()->json(["message" => "Discount record not found"],200);
            
        }
        
        $discount->delete();

        return response()->json(["message" => "Discount Deleted Successfully"],200);

        
    }


    public function show($id)
    {
        $discount= discount::find($id);

        if(is_null($discount)){

            return response()->json(["message" => "Discount record not found"],200);
            
        }
        
        return response()->json(discount::find($id),200);


       
    }

    public function update(Request $request, $id)
    {
        $discount= discount::find($id);

        if(is_null($discount)){

            return response()->json(["message" => "Discount record not found"],200);
            
        }

        $discount->update($request->all());

        return response()->json(["message" => "Discount Update Successfully"],200);

       
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
