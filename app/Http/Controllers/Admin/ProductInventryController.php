<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\Company;
use App\Models\admin\Product;
use App\Models\admin\NewCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Images;
use Auth;

use DB;
class ProductInventryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Company $company,NewCategories $new_category,Product $product)
	 {
	 $this->company=$company;
	  $this->product=$product;
	  $this->new_category=$new_category;
	 
	 }
    
	 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        
		    
   		 $current_stock=0;
		  $inventry =  DB::table('inventory')->where('products_id',$product_id)->get();
		  $current_stock = DB::table('inventory')->where('products_id',$product_id)->where('stock_type','in')->sum('stock');
		   $product =  DB::table('products')->where('id',$product_id)->first();
		   if($current_stock)
		   {
		   }else{
		   $current_stock=0;
		   }
		   
		$title 			  = 	array('pageTitle' => 'Product Inventry');
        return view('admin.product.invenrty.create',$title)->with(['inventry'=>$inventry,'product'=>$product,'current_stock'=>$current_stock]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $admin_id=auth()->user()->id;
		if(count($request->stock)>0)
		{ 
		 for($i=0;$i<count($request->stock);$i++){
		 if($request->stock[$i]>0)
		 {
		 
         $id=  DB::table('inventory')->insertGetId([
             'products_id'   =>  $request->products_id,
			 'unit_id'=>$request->unit_id[$i],
			  'sub_unit_id'=>$request->sub_unit_id[$i],
             'purchase_price'		 	 => '0',
			  'r_price'		 	 => $request->r_price[$i],
			   'w_price'		 	 => $request->w_price[$i],
			 'stock_type'		 	 =>   'in',
			 'stock'		 	 =>    $request->stock[$i]*$request->unit_val[$i],
			 'unit_val' =>    $request->unit_val[$i]
			 
	  ]);
	  }
	  }
	  
	  }
        
        return redirect(route('inventry.create',$request->products_id))->with('message','Inventry Updated Successfully');
    }
	
	 

     

     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = admin::find($id);
        $users->roles()->detach();
        $users->delete();
        return redirect (route('company.index'))->with('message','Admin User Deleted Successfully');
    }
}
