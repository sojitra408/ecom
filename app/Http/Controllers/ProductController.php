<?php

namespace App\Http\Controllers;

 use App\Product;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\NewCategories;
use App\Models\admin\Customer;
 use Session;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Product $product,NewCategories $new_category,Customer $customer)
	 {
	 
	 $this->middleware('auth:web');
	 
	  $this->product=$product;
	   $this->customer=$customer;
	   $this->new_category=$new_category;
	 
	 }
    public function index()
    {
         $result=array();
		  $categories=$this->new_category->paginator();
		//  echo "<pre>",print_r($categories);die;
		$result=$this->mycart();
		  
		$title 			  = 	array('pageTitle' => 'Product List');
        return view('welcome',$title)->with(['categories'=> $categories,'result'=>$result]);
    }
	
	 public function category(Request $request)
    {
	$result=array();
    $id=$request->id; 
		$title 			  = 	array('pageTitle' => 'Product List');
        $products=$this->product->category($id);
		$result=$this->mycart();
		 
        return view('category',$title)->with(['products'=> $products,'result'=>$result]);
       
    }
	
	public function mycart()
	{
	return $result=DB::table('cart')->where([
					['session_id', '=', Session::getId()],
					 ['is_order', '=', 0]
				])->get();
	}
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $company = Company::all();
		   $objcategory = new NewCategories();
		    $images = new Images;
    $allimage = $images->getimages();
		  $category =  DB::table('categories as c')->select('c.*','cd.categories_name')->join('categories_description as cd','c.categories_id','cd.categories_id')->get();
		$title 			  = 	array('pageTitle' => 'Product Create');
        return view('admin.product.create',$title)->with(['company'=>$company,'category'=> $category ])->with('allimage', $allimage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_title' => 'required|string|max:255',
            'hs_code' => 'required|string|max:500',
             'sku' => 'required|string|max:255',
			  'cat_id' => 'required'
        ]);
        
        $company =$this->product->create($request->all());
        
        return redirect(route('product.display'))->with('message','Product Created Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
       
		 $title 			  = 	array('pageTitle' => 'Edit Company');
        
		return view('admin.company.edit',$title)->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'company_title' => 'required|string|max:255',
            'company_description' => 'required|string|max:500',
             'address' => 'required|string|max:255'
        ]);
        $company =$this->company->update_data($request->all());
        return redirect(route('company.display'))->with('message','Comapny updated successfully');
    }
	
	 public function checkout(Request $request)
    {
	 
		$title 			  = 	array('pageTitle' => 'Product Chekout');
       $customer= $this->customer->getCustomer();
		$result=$this->mycart();
		 
        return view('checkout',$title)->with(['result'=>$result,'all_customer'=>$customer]);
       
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
