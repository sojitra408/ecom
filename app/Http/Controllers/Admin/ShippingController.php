<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\shipping;
use DB;
use Auth;
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
    {$seller=array();
        
		$title 			  = 	array('pageTitle' => 'Shopping List');

        $shippings = DB::table('shipping')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('shipping')||Auth::user()->can('shipping-add')||Auth::user()->can('shipping-edit')||Auth::user()->can('shipping-view')||Auth::user()->can('shipping-delete'))
        {

        return view('admin.shipping.index',$title,compact('shippings'));
        }
        return redirect()->back();
    }
	
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Shopping');
    if(Auth::user()->can('shipping-add'))
    {
            
        return view("admin.shipping.create",$title);
    }
    return redirect()->back();
   
  }

  public function store(Request $request){

    $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',

        ], [
            'title.required' => 'Title Name Is Required.',
            'price.required' => 'Price Is Required.',
            'description.required' => 'Description Is Required.',
            
        ]);
 
      $id=  DB::table('shipping')->insertGetId([
            'title'   =>   $request->title,
            'price'   =>   $request->price,
            'description'   =>   $request->description,
      ]);
 
   
    return redirect()->back()->with(["success"=>"Shipping Saved Successfully!"]);
  }

  public function delete($id)
    {

        $Project = DB::table('shipping')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Shipping Deleted Successfully.']);
    }


    public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Shopping');

        $shipping = DB::table('shipping')->find($id);

        if(Auth::user()->can('shipping-edit')||Auth::user()->can('shipping-view'))
        {
            
        return view('admin.shipping.edit',$title, compact('shipping'));
        }
        return redirect()->back();
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            
        ], [
            'title.required' => 'Title Is Required.',
            'price.required' => 'Price Is Required.',
            'description.required' => 'Description Is Required.',
            
        ]);


        $tax=shipping::find($id);
        
        $tax->title=$request->get("title");
        $tax->price=$request->get("price");
        $tax->type=$request->get("type");
        $tax->cart_price=$request->get("cart_price");
        $tax->description=$request->get("description");
        $tax->save();

        return redirect()->back()->with(['message' => 'Shipping Updated Successfully.']);
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
