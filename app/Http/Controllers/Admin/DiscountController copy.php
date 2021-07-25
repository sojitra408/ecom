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

        $discounts = DB::table('discount')->get();
        
        // $discounts =  DB::select("SELECT
        //               discount.discount_name,
        //               discount.product_id,
        //               discount.category_id,
        //               discount.cat_parent_id,
        //               products.brand_name,
        //               categories.name
        //             FROM discount
        //             LEFT JOIN products
        //               ON discount.product_id = products.id
        //             LEFT JOIN categories
        //               ON discount.category_id = categories.id");

        //$data = $discounts.$sub;

        

        // $discounts = DB::table('discount')
        //     ->leftJoin('Products', 'discount.product_id', '=', 'Products.id')
        //     ->leftJoin('Category', 'discount.category_id', '=', 'Category.id')
        //     ->select('discount.*', 'Products.brand_name,', 'Category.name')
        //     ->get();

        //dd($discounts);
        
        return view('admin.discount.index',$title,compact('discounts'));
    }
	
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Discount');
 
    $data = Category::get();
    $products = Products::get();
   
    return view("admin.discount.create",$title,compact('data','products'));
  }

  public function store(Request $request){ 
    $request->validate([
            'discount_name' => 'required',
            'option'=> 'required|in:product,categories,flats' ,
            'minimum_price'=>'required',
            'discount_fix'=>'required|in:percentage,fix' ,
        ], [
            'discount_name.required' => 'Discount Name Is Required.',
            'option.required' => 'Select Any One Option.',
            'minimum_price.required' => 'Minimum Price Is Required.',
            'discount_fix.required' => 'Select Any One Option.',
            
            
        ]);

    $catid=$request->select_category;
    $product=$request->select_product;

    if(!empty($catid)){
        foreach ( $request->get('select_category') as $n){
            $pid=DB::table('categories')->select('id')->where('parent_id',$n)->get();
            
            $product_id = $request->get("product_id");
            $category_id=$request->get("select_category");
            //$cat_parent_id=$List;
            $option=$request->get("option");
            $minimum_price=$request->get("minimum_price");
            $discount_percentage=$request->get("discount_percentage");
            $discount_fix=$request->get("discount_fix_price"); 
            foreach ( $pid as $key => $value){

                $discount = new discount;

                    
                $discount->discount_name=$request->get("discount_name");
                $discount->product_id = $product_id;
                $discount->category_id=$category_id;
                $discount->cat_parent_id=$value->id;
                $discount->option=$option;
                $discount->minimum_price=$minimum_price;
                $discount->discount_percentage=$discount_percentage;
                $discount->discount_fix=$discount_fix;

                $discount->save();

                $product_id=null;
                $category_id=null;
                //$cat_parent_id=0;
                $option=null;
                $minimum_price=null;
                $discount_percentage=null;
                $discount_fix=null;


            }
        } 
    }
    elseif(!empty($product)){
        
        $List = "";

        $category_id=$request->get("select_category");
        $cat_parent_id=$List;
        $option=$request->get("option");
        $minimum_price=$request->get("minimum_price");
        $discount_percentage=$request->get("discount_percentage");
        $discount_fix=$request->get("discount_fix_price");


        foreach ( $request->get('select_product') as $n){

            $discount = new discount;

                
            $discount->discount_name=$request->get("discount_name");
            $discount->product_id = $n;
            $discount->category_id=$category_id;
            $discount->cat_parent_id=$cat_parent_id;
            $discount->option=$option;
            $discount->minimum_price=$minimum_price;
            $discount->discount_percentage=$discount_percentage;
            $discount->discount_fix=$discount_fix;

            $discount->save(); 
            $cat_parent_id=null;
            $option=null;
            $minimum_price=null;
            $discount_percentage=null;
            $discount_fix=null; 
        }

    }

    else{

        $List=null;
        $discount=new discount();

        $discount->discount_name=$request->get("discount_name");
        $discount->product_id=$request->get("select_product");
        $discount->category_id=$request->get("select_category");
        $discount->cat_parent_id=$List;
        $discount->option=$request->get("option");
        $discount->minimum_price=$request->get("minimum_price");
        $discount->discount_percentage=$request->get("discount_percentage");
        $discount->discount_fix=$request->get("discount_fix_price");


       $discount->save();
    }
 
 
   
    return redirect()->back()->with(["success"=>"Discount Saved Successfully!"]);
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
        
        return view('admin.discount.edit',$title, compact('discounts','products','data'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'discount_name' => 'required',
            

        ], [
            'discount_name.required' => 'Discount Name Is Required.',
            
            
            
        ]);


        $catid=$request->select_category;
    //$pid=$request->select_product;

        $select_product = $request->input('select_product');
    

    if(!empty($select_product)){
        $select_product=$request->input('select_product');
       $select_product = implode(',', $select_product);
    }
    else{
        $select_product=0;
    }

    if(!empty($catid)){

        $pid=DB::table('categories')->select('id')->where('parent_id',$catid)->get();

        $List=0;

        foreach ($pid as $key => $value) {
        # code...

        $cpid[]=$value->id;
       $List = implode(',', $cpid);

        //$p = array_merge($cpid);
        }
    }
    else{
        $List = 0;
    }


        $discount=discount::find($id);
        
        // $discounts->question=$request->get("question");
        // $discounts->answer=$request->get("answer");


        $discount->discount_name=$request->get("discount_name");
        $discount->product_id=$select_product;
        $discount->category_id=$request->get("select_category");
        $discount->cat_parent_id=$List;
        $discount->option=$request->get("option");
        $discount->minimum_price=$request->get("minimum_price");
        $discount->discount_percentage=$request->get("discount_percentage");
        $discount->discount_fix=$request->get("discount_fix_price");

        $discount->save();

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
