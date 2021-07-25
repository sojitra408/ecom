<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Seller;

class SellerController extends Controller
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
        
		$title 			  = 	array('pageTitle' => 'Seller List');

        $sellers =  DB::table('seller')->orderBy('id', 'DESC')->get();
        if (Auth::user()->can('seller-list') || Auth::user()->can('seller-add') || Auth::user()->can('seller-edit') || Auth::user()->can('seller-view') || Auth::user()->can('seller-delete')) 
        {
        
            return view('admin.seller.index',$title,compact('sellers'))->with('seller',$seller);
        }
        return redirect()->back();
        // return view('admin.seller.index',$title,compact('sellers'))->with('seller',$seller);
        
    }

    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Seller');

    if (Auth::user()->can('seller-add')) 
    {
    $lastid = Seller::latest()->first();

    $final = "ST0000";

        if(!empty($lastid))

        {

          $lastid = Seller::latest()->first()->seller_id;

          $lastid = substr ($lastid, -2);

          $lastid = $lastid+1;



        }
        else{
            $lastid = "11";
        }
   
    return view("admin.seller.create",$title,compact('final','lastid'));

    } 
    return redirect()->back();
    
  }

 public function store(Request $request){

    

    $request->validate([
            'seller_id' => 'required|unique:seller,seller_id',
            'seller_name'=> 'required' ,
            
            
            

        ], [
            'seller_id.required' => 'Seller Id Is Required.',
            'seller_name.required' => 'Seller Name Is Required.',
            
            
            
        ]);
 
      $id=  DB::table('seller')->insertGetId([
            'seller_id'   =>   $request->seller_id,
            'seller_name'   =>   $request->seller_name,
      ]);
 
   
    return redirect()->back()->with(["success"=>"Seller Saved Successfully!"]);
  }

  public function delete($id)
    {
    
        $seller = DB::table('seller')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Seller Deleted Successfully.']);
    }


    public function edit($id)
    {
        //$page_name='project';

        if (Auth::user()->can('seller-view') || Auth::user()->can('seller-edit')) 
        {

         $title = array('pageTitle' => 'Edit seller');

        $sellers = DB::table('seller')->find($id);
        
        return view('admin.seller.edit',$title, compact('sellers'));
        } 
        return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'seller_name' => 'required',
            
        ], [
            'seller_name.required' => 'Seller Name Is Required.',
            
            
            
        ]);


        $sellers=seller::find($id);
        
        //$sellers->seller_id=$request->get("seller_id");
        $sellers->seller_name=$request->get("seller_name");

        $sellers->save();

        return redirect()->back()->with(['message' => 'Seller Updated Successfully.']);
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
