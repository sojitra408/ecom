<?php

namespace App\Http\Controllers;

 use App\Product;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\NewCategories;
use App\Models\Cart;
 use Session;
use DB;
class CartController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 protected $orderType=null;
	  protected $company_id=null;
	 
	 public function __construct()
	 {
	 
	 $this->middleware('auth:web');
	 $this->ordderType=session('orderType');
	 $this->company_id=session('company_id');
	  
	 }
   public function addToCart(Request $request)
  {
        $objcart=new Cart();
	    $result=$objcart->addToCart($request);
		  $qunatity=0; 
                foreach($result as $cart_data)
				{
                  $qunatity += $cart_data->cart_qty;  
               }
			   
			  
 

 
		
		$cart='<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#basicModal">View Cart ('.$qunatity.')</a>';
		$modalTable=' <table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" width="200" class="text-right">Action</th>
</tr>
</thead>
<tbody>';
		if(count($result)>0){
		foreach($result as $cart_data)
{

 
  
  $product=DB::table('cart as c')->select('p.*','c.sub_id')->join('products as p','c.product_id','p.id')->where('c.product_id',$cart_data->product_id)->where('c.sub_id',$cart_data->sub_id)->first();
  $inventry =  DB::table('inventory')->select('inventory.*','su.sub_title')->join('sub_unit as su','inventory.sub_unit_id','su.id')->where('inventory.products_id',$product->id)->where('inventory.sub_unit_id',$product->sub_id)->first();
  
 $modalTable.=' <tr>
	<td>
<figure class="media">
	
	<figcaption class="media-body">
		<h6 class="title text-truncate">'.$product->product_title.'</h6>
		<dl class="param param-inline small">
		  <dt>'.$inventry->sub_title.'</dt>
		  
		</dl>
	
	</figcaption>
</figure> 
	</td>
	<td> 
		'.$cart_data->cart_qty.'
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">Rs. '.$cart_data->final_price.'</var> 
			<small class="text-muted">(Rs.'.$cart_data->final_price/$cart_data->cart_qty.' Each)</small> 
		</div>  
	</td>
	<td class="text-right"> 
	
	<a href="javascript:void(0)" onclick="removeItem('.$cart_data->id.')" class="btn btn-small"> X</a>
	</td>
</tr>';
  
		
		}
		
		}
		
		 
		$responseData = array('cart'=>$cart,
										 'cartmodel'=> $modalTable,
										);  
			return response()->json($responseData);
		 
         
		  
    }
	
	
   public function removeItem(Request $request)
  {
         $objcart=new Cart();
		 $result=array();
	     $objcart->removeItem($request->id);
		 $result= $objcart->mycart();
		
		  $qunatity=0; 
                foreach($result as $cart_data)
				{
                  $qunatity += $cart_data->cart_qty;  
               }
			   
			  
 

 
		
		$cart='<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#basicModal">View Cart ('.$qunatity.')</a>';
		$modalTable=' <table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" width="200" class="text-right">Action</th>
</tr>
</thead>
<tbody>';
		if(count($result)>0){
		foreach($result as $cart_data)
{

 
  
  $product=DB::table('cart as c')->select('p.*','c.sub_id')->join('products as p','c.product_id','p.id')->where('c.product_id',$cart_data->product_id)->where('c.sub_id',$cart_data->sub_id)->first();
  $inventry =  DB::table('inventory')->select('inventory.*','su.sub_title')->join('sub_unit as su','inventory.sub_unit_id','su.id')->where('inventory.products_id',$product->id)->where('inventory.sub_unit_id',$product->sub_id)->first();
  
 $modalTable.=' <tr>
	<td>
<figure class="media">
	
	<figcaption class="media-body">
		<h6 class="title text-truncate">'.$product->product_title.'</h6>
		<dl class="param param-inline small">
		  <dt>'.$inventry->sub_title.'</dt>
		  
		</dl>
	
	</figcaption>
</figure> 
	</td>
	<td> 
		'.$cart_data->cart_qty.'
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">Rs. '.$cart_data->final_price.'</var> 
			<small class="text-muted">(Rs.'.$cart_data->final_price/$cart_data->cart_qty.' Each)</small> 
		</div>  
	</td>
	<td class="text-right"> 
	
	<a  href="javascript:void(0)" onclick="removeItem('.$cart_data->id.')" class="btn btn-small"> X</a>
	</td>
</tr>';
  
		
		}
		
		}
		
		 
		$responseData = array('cart'=>$cart,
										 'cartmodel'=> $modalTable,
										);  
			return response()->json($responseData);
		 
         
		  
    }
	
	public function updatecart(Request $request)
	{
	
         $objcart=new Cart();
		 $result=array();
		 
		 $cart=DB::table('cart')->where('id',$request->cart_id)->first();
		 $oldPrice=$cart->final_price;
		 $oldQty=$cart->cart_qty;
		 
		 $eachPrice=$cart->final_price/$oldQty;
		 $newPrice=$eachPrice*$request->qty;
		 
	      DB::table('cart')->where('id', '=', $request->cart_id)->update(
				[
					  
					 'cart_qty' =>  $request->qty,
					 'final_price' => $newPrice
					 
				]);
		 $result= $objcart->mycart();
		
		  $qunatity=0; 
                foreach($result as $cart_data)
				{
                  $qunatity += $cart_data->cart_qty;  
               }
			   
			  
 

 
		
		$cart='<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#basicModal">View Cart ('.$qunatity.')</a>';
		 
		
		 
		$responseData = array('cart'=>$cart,
										 
										);  
			return response()->json($responseData);
		 
         
		  
    
	
	}
	
	public function orderType(Request $request)
	{
	if($this->ordderType!=$request->orderType)
	{
	$this->refreshCart();
	session(['orderType'=>$request->orderType]);
	}
	
	return session('orderType');
	
	}
	
	public function changeComapny(Request $request)
	{
	if($this->company_id!=$request->company_id)
	{
	$this->refreshCart();
	session(['company_id'=>$request->company_id]);
	}
	
	return session('company_id');
	
	}
	
	public function refreshCart()
	{
	 
	 DB::table('cart')->where('session_id',Session::getId())->delete();
	
	}
	
	
	 
	
	
 
}//class
