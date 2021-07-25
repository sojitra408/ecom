<?php

namespace App\Http\Controllers\Api;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\shipping;
use DB;

class ShippingController extends Controller
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
        return response()->json(shipping::get(),200);

  
    }
	
    public function create(Request $request){

       $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',

        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $shipping = shipping::create($request->all());
        return response()->json(["message" => "Shipping Save Successfully"],200); 
    
  }

  

  public function delete($id)
    {

        $shipping = shipping::findOrFail($id);

        if(is_null($shipping)){

            return response()->json(["message" => "Shipping record not found"],200);
            
        }
        
        $shipping->delete();

        return response()->json(["message" => "Shipping Deleted Successfully"],200);

        // $Project = DB::table('shipping')->where('id',$id)->delete();
        //$Project->delete();
        // return redirect()->back()->with(['message' => 'Shipping Deleted Successfully.']);
    }


    public function show($id)
    {
        $shipping= shipping::find($id);

        if(is_null($shipping)){

            return response()->json(["message" => "Shipping record not found"],200);
            
        }
        
        return response()->json(shipping::find($id),200);


        //$page_name='project';

        //  $title = array('pageTitle' => 'Edit Shopping');

        // $shipping = DB::table('shipping')->find($id);
        
        // return view('admin.shipping.edit',$title, compact('shipping'));
    }

    public function update(Request $request, $id)
    {
        $shipping= shipping::find($id);

        if(is_null($shipping)){

            return response()->json(["message" => "Shipping record not found"],200);
            
        }

        $shipping->update($request->all());

        return response()->json(["message" => "Shipping Update Successfully"],200);

        // $request->validate([
        //     'title' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
            
        // ], [
        //     'title.required' => 'Title Is Required.',
        //     'price.required' => 'Price Is Required.',
        //     'description.required' => 'Description Is Required.',
            
        // ]);


        // $tax=shipping::find($id);
        
        // $tax->title=$request->get("title");
        // $tax->price=$request->get("price");
        // $tax->description=$request->get("description");
        // $tax->save();

        // return redirect()->back()->with(['message' => 'Shipping Updated Successfully.']);
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
