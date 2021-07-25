<?php

namespace App\Http\Controllers;

 use App\Product;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\NewCategories;
use App\Models\Cart;
use App\Models\Orders;
 use Session;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Product $product,NewCategories $new_category,Cart $cart,Orders $orders)
	 {
	 
	 $this->middleware('auth:web');
	 
	  $this->product=$product;
	   $this->cart=$cart;
	   $this->orders=$orders;
	   $this->new_category=$new_category;
	 
	 }
	 
	  public function thanks()
	 {
	   $result=array();
	    $result=$this->cart->mycart();
		$title 			  = 	array('pageTitle' => 'Thanks');
        return view('thank-you',$title)->with(['result'=>$result]);
	 
	 }
	  public function challan()
	 {
	   $result=array();
	    $challan=$this->orders->challan();
		$title 			  = 	array('pageTitle' => 'Challan List');
		
        return view('challan',$title)->with(['result'=>$result,'challan'=>$challan]);
	 
	 }
	 
	 public function processChallan(Request $request)
	 {
	 
	 $result=$this->cart->mycart();
	 $challanNo=$this->orders->randID(6);
	 $finalPrice=0;
	  foreach($result as $cart)
	 {
	 $finalPrice=$finalPrice+$cart->final_price;
	 }
	$challan_id=  DB::table('challan')->insertGetId(
				[
					 'challan_no'  => $challanNo,
					 'staff_id'   => $cart->staff_id,
					 'customer_id'=>$request->customer_id,
					  'order_type'=>$request->order_type,
					 'company_id' => $cart->company_id,
					 'final_price' => $finalPrice,
					 'session_id'  => $cart->session_id,
					 'is_order'  => 0]);
	 
	 
	 
	 foreach($result as $cart)
	 {
	 $cart_id = DB::table('challan_details')->insertGetId(
				[
					 'product_id'  => $cart->product_id,
					 'challan_no'=>$challan_id,
					 'cart_id'  => $cart->id,
					 'sub_id'  => $cart->sub_id,
					 'unit_id'  => $cart->unit_id,
					 'staff_id'   => $cart->staff_id,
					 'company_id' => $cart->company_id,
					 'cart_qty' => $cart->cart_qty,
					 'final_price' => $cart->final_price,
					 'session_id'  => $cart->session_id,
					 'is_order'  => 0]);
	 
	 }
	 $request->session()->regenerate();
	 session(['msg'=>'1']);
	 return 1;
	 
	 }
     
}
