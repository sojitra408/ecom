<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\faq;
use DB;

use App\Category;
use App\Products;
use App\discount;
use App\Brand;
use Auth;

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
    {$seller=array();
        
		$title 			  = 	array('pageTitle' => 'All Discount');

        $discounts = DB::table('discount')->orderBy('id','desc')->get(); 
        
        if(Auth::user()->can('discount')||Auth::user()->can('discount-add')||Auth::user()->can('discount-edit')||Auth::user()->can('discount-view')||Auth::user()->can('discount-delete'))
        {

        return view('admin.discount.index',$title,compact('discounts'));
        }
        return redirect()->back();
    }
	
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Discount');
 
    $data = Category::get();
    $products = Products::get();
    $brands = Brand::get();
   
   if(Auth::user()->can('discount-add'))
        {

    return view("admin.discount.create",$title,compact('data','products','brands'));
        }
        return redirect()->back();
  }

  public function store(Request $request){ 
    $request->validate([
            'discount_name' => 'required',
            'option'=> 'required|in:product,categories,brands,flats' ,
            'minimum_price'=>'required',
            'maximum_discount'=>'required',
            'discount_fix'=>'required|in:percentage,fix' ,
            'discount_code'=>'required',
        ], [
            'discount_name.required' => 'Discount Name Is Required.',
            'discount_code.required'=>'Discount Code is Required.',
            'option.required' => 'Select Any One Option.',
            'minimum_price.required' => 'Minimum Price Is Required.',
            'maximum_discount.required' => 'Maximum Discount Is Required.',
            'discount_fix.required' => 'Select Discount Type: Fix / Percentage.',
        ]);
    $product_id=null;
    $category_id=null; 
    $option=null;
    $minimum_price=null;
    $discount_percentage=null;
    $discount_fix=null;
    $cat_parent_id=null; 
    $catid=$request->select_category; 
    $product=$request->select_product;
	$brand_id=implode(',',$request->select_brand ?? []);
	
	$showInList = $request->input('showin_list', 0);
    $applyOnCart = $request->input('apply_oncart', 0);
    $oneTime = $request->input('one_time', 0);
	
    if(!empty($catid) && count($catid)>0){ 
        $product_id = $request->get("select_product");
        $category_id=implode(',',$request->get("select_category")); 
        $option=$request->get("option");
        $minimum_price=$request->get("minimum_price");
        $maximum_discount=$request->get("maximum_discount");
        
        $discount_percentage=$request->get("discount_percentage");
        $discount_fix=$request->get("discount_fix_price");
        
        $discount = new discount; 
        $discount->discount_name=$request->get("discount_name");
        $discount->discount_code=$request->get("discount_code");
        $discount->description=$request->get("description");
        $discount->product_id = $product_id; 
        $discount->cat_parent_id=$cat_parent_id;
        $discount->category_id=$category_id; 
		$discount->brand_id=$brand_id;
        $discount->option=$option;
        $discount->minimum_price=$minimum_price;
        $discount->maximum_discount=$maximum_discount;
        $discount->discount_percentage=$discount_percentage;
        $discount->discount_fix=$discount_fix;
        $discount->type=$request->get("discount_fix");
        $discount->start_date=date('Y-m-d',strtotime($request->get("start_date")));
        $discount->end_date=date('Y-m-d',strtotime($request->get("end_date")));
        
        $discount->showin_list = $showInList;
        $discount->apply_oncart = $applyOnCart;
        $discount->one_time = $oneTime;
        
        $discount->status=1;

        $discount->save();  
    }
    elseif(!empty($product) && count($product)>0){
        
        $List = "";

        $category_id=$request->get("select_category"); 
        $option=$request->get("option");
        $minimum_price=$request->get("minimum_price");
         $maximum_discount=$request->get("maximum_discount");
        $discount_percentage=$request->get("discount_percentage");
        $discount_fix=$request->get("discount_fix_price");
        $product_id=implode(',',$request->get("select_product")); 
         

        $discount = new discount; 
        $discount->discount_name=$request->get("discount_name");
		$discount->discount_code=$request->get("discount_code");
        $discount->description=$request->get("description");
        $discount->product_id = $product_id;
        $discount->category_id=$category_id;
        $discount->brand_id=$brand_id;
        $discount->cat_parent_id=$cat_parent_id;
        $discount->option=$option;
        $discount->minimum_price=$minimum_price;
        $discount->maximum_discount=$maximum_discount;
        $discount->discount_percentage=$discount_percentage;
        $discount->discount_fix=$discount_fix; 
		$discount->type=$request->get("discount_fix");
        $discount->start_date=date('Y-m-d',strtotime($request->get("start_date")));
        $discount->end_date=date('Y-m-d',strtotime($request->get("end_date")));
        
        $discount->showin_list = $showInList;
        $discount->apply_oncart = $applyOnCart;
        $discount->one_time = $oneTime;
        
        $discount->status=1;
        $discount->save();   
    } 
    else{

        $List=null;
        $discount=new discount();

        $discount->discount_name=$request->get("discount_name");
		$discount->discount_code=$request->get("discount_code");
        $discount->description=$request->get("description");
        $discount->product_id=$request->get("select_product");
        $discount->category_id=$request->get("select_category");
		 $discount->brand_id=$brand_id;
        $discount->cat_parent_id=$List;
        $discount->option=$request->get("option");
        $discount->minimum_price=$request->get("minimum_price");
        $discount->maximum_discount=$request->get("maximum_discount");
        $discount->discount_percentage=$request->get("discount_percentage");
        $discount->discount_fix=$request->get("discount_fix_price");
		$discount->type=$request->get("discount_fix");
        $discount->start_date=date('Y-m-d',strtotime($request->get("start_date")));
        $discount->end_date=date('Y-m-d',strtotime($request->get("end_date")));
        
        $discount->showin_list = $showInList;
        $discount->apply_oncart = $applyOnCart;
        $discount->one_time = $oneTime;
        
        $discount->status=1;


       $discount->save();
    } 
    return redirect('admin/discount')->with(["success"=>"Discount Saved Successfully!"]);
  }

  public function delete($id)
    {

        $Project = DB::table('discount')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Discount Deleted Successfully.']);
    }


    public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Discount');

        $discounts = DB::table('discount')->find($id);

        $products = Products::get();
        $data = Category::get();
         $brands = Brand::get();
         if(Auth::user()->can('discount-edit')||Auth::user()->can('discount-view'))
        {
        return view('admin.discount.edit',$title, compact('discounts','products','data','brands'));

        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'discount_name' => 'required',

        ], [
            'discount_name.required' => 'Discount Name Is Required.',
            
            
            
        ]);

        $discount = DB::table('discount');
        $discountObject =  $discount->where('id',$id)->first(); 

        $catid=$request->input('select_category', []);
        //$pid=$request->select_product;

        $select_product = $request->input('select_product', []);
    

        if(!empty($select_product)){
           $select_product = implode(',', $select_product);
        }
        else{
            $select_product=0;
        }
    
        if(!empty($catid)){ 
            $List = implode(',', $catid);
     
        }
        else{
            $List = 0;
        }
        
        $brand_id=implode(',',$request->input('select_brand', []));
        
        $startDate = $request->input('start_date', $discountObject->start_date);
        $endDate = $request->input('end_date', $discountObject->end_date);
        
        $data=array(
			'discount_code'=>$request->get("discount_code"),
			
            'product_id'=> $select_product,
            
            'brand_id'=> $brand_id,
            
            'category_id'=>$List,
            
            'minimum_price'=>$request->get("minimum_price"),
            'maximum_discount'=>$request->get("maximum_discount"),
            'discount_percentage'=>$request->get("discount_percentage"),
            'discount_fix'=>$request->get("discount_fix_price"),
            'option'=>$request->get("option"),
            
            'discount_name' => $request->get("discount_name"),
            'description'=>$request->get("description"),
            'start_date'=>$startDate,
            'end_date'=>$endDate,
            
            'showin_list'=>$request->input("showin_list", 0),
            'apply_oncart'=>$request->input("apply_oncart", 0),
            'one_time'=>$request->input("one_time", 0),
        );
        $discount->update($data);
        return redirect()->back()->with(['message' => 'Discounts Updated Successfully.']);
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
