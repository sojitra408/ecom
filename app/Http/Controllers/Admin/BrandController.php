<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Brand;
 use App\Seller;
 use App\BrandOfDay;
 use App\BrandGallery;
 use App\Models\admin\UploadImage; 
use App\Models\admin\Languages;
use App\Models\admin\admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\admin\Setting;

use App\Models\admin\Images;
use Storage;
use Image;
use App\tags;
use App\Models\admin\Collection;
use App\Productusp;
use App\Category;
use Illuminate\Support\Str;
 use Auth;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Setting $setting)
  {
      
      $this->varseting = new SiteSettingController($setting);
  }
	 
    
  
   public function index(){
 
	
    $title = array('pageTitle' => 'Category');
    if(Auth::user()->can('brands') || Auth::user()->can('brands-add') || Auth::user()->can('brands-edit')|| Auth::user()->can('brands-view')|| Auth::user()->can('brands-delete'))
    {

    return view("admin.brand.index",$title);
    }
    return redirect()->back();
  }


 

  public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Brand');
 	$seller = Seller::all();
    $allimages = UploadImage::get();

    if(Auth::user()->can('brands-add'))
    {

    return view("admin.brand.create",$title,compact('seller','allimages'));
    }
    return redirect()->back();
	
   
  }

 public function store(Request $request){
	  
	 $request->validate([
      'seller_id' => 'required',
	  'brand_name' => 'required|unique:brand',
      
    ]);
    
    $seller_id = $request->seller_id;

   $seller_id = Seller::select('seller_id')->where('id',$seller_id)->first();

   // $check_id = $seller_id->seller_id.'_01';
   
   $check_id = $seller_id->seller_id;
   

   $brand_seller_id = Brand::select('brand_seller_id')->where('brand_seller_id','LIKE','%'.$check_id.'%')->latest()->first();

   if(!empty($brand_seller_id)){

      $dataa = explode('_', $brand_seller_id->brand_seller_id);

     $seller = $dataa[0];
     $check = $dataa[1];


      $id = str_pad(intval($check) + 1, strlen($check), '0', STR_PAD_LEFT); // 000010
     
      $final = $seller.'_'.$id;


   }
   else{

      $final = $seller_id->seller_id.'_01';
   }
	 
// 	if($request->status==NULL) { $stat=0; } else { $stat=1; }		
// 	$data['status']=$stat;
	//$data['banner']=$request->banner;
	$data['brand_seller_id']=$request->brand_seller_id;
	$data['brand_name']=$request->brand_name;
	$data['slug']=Str::slug($request->brand_name, '-');
	$data['seller_id']=$request->seller_id;
	//$data['brand_seller_id']=$final;
	//$data['thumbnail']=$request->thumbnail;
	Brand::create($data);
   
    return redirect()->back()->with(["success"=>"Brand Saved Successfully!"]);
 
}

 /**/
 
  public function destroy($id)
    {

        $Project = DB::table('brand')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Brand Deleted Successfully.']);
    }

    public function edit($id)
    {
        //$page_name='project';

        if(Auth::user()->can('brands-edit')|| Auth::user()->can('brands-view'))
    {

         $title = array('pageTitle' => 'Edit Brand');
 		$seller = Seller::all();
        $allimages ='';  
        $project = DB::table('brand')->find($id);
		$categories=Category::where('parent_id',0)->get();
		 $usp = Productusp::all();
        //print_r($project);die;
        return view('admin.brand.edit',$title, compact('categories','project','seller','allimages','usp'));
    }
    return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $request->validate([
	      'seller_id' => 'required',
	      
	  'brand_name' => 'required|unique:brand,brand_name,'.$id,

        ]);
	if($request->status==NULL) { $stat=0; } else { $stat=1; }
	if($request->live==NULL) { $live=0; } else { $live=1; }
	$keywords = \App\Keyword::where('tableName','brand')->where('idItem',$id)->first();
        if(!$keywords){
			
			$keyw=$request->brand_name;
			\App\Keyword::create(['keywords'=>$keyw,'tableName'=>'brand','idItem'=>$id]);
			
		}

        $data['brand_seller_id']=$request->brand_seller_id;
        
        $data['status']=$stat;
	$data['category_id']=implode(',',$request->category);
	$data['banner']=$request->banner_image;
	$data['brand_name']=$request->brand_name;
	$data['slug']=Str::slug($request->brand_name, '-');
	$data['seller_id']=$request->seller_id;
	$data['thumbnail']=$request->thumbnail_image;
	$data['home_pic']=$request->home_pic;
	$data['description']=$request->description;
	$data['fssai_licence_number']=$request->fssai;
    $data['brand_usp']=implode(',',$request->usp);
    $data['live']=$live;
	
	Brand::where('id',$id)->update($data);

        return redirect()->back()->with(['message' => 'Brand Updated Successfully.']);
    }
	
  
 public function additional($id)
    {
        //$page_name='project';

        if(Auth::user()->can('brands-edit')|| Auth::user()->can('brands-view'))
    {

         $title = array('pageTitle' => 'Additional Brand');
 		$seller = Seller::all();
         
        $products = DB::table('products')->where('brand_id', $id)->get();
        $brand_sponsors = DB::table('brand_sponsors')->where('brand_id', $id)->get();
        $brand_head_turners = DB::table('brand_head_turners')->where('brand_id', $id)->get();
        
        // dd($arr);
        $project = DB::table('brand')->find($id);
        //print_r($project);die;
		$galleries=BrandGallery::where('brand_id',$id)->get();
        return view('admin.brand.additional',$title, compact('project','seller','galleries', 'products','brand_sponsors','brand_head_turners'));
    }
    return redirect()->back();

    }
	
  /**/ 


  function brandList(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			2 =>'seller_name',
            3 =>'status',
            4 =>'created_at',
			5 =>'action'
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
                            ->orWhere('brand_seller_id', 'LIKE',"%{$search}%")
                            ->orWhere('fssai_licence_number', 'LIKE',"%{$search}%")
                            ->orWhere('brand_usp', 'LIKE',"%{$search}%")
                           ->whereHas('Seller', function($q) use($search){
                            $q->orWhere('seller_name', 'LIKE',"%{$search}%");
                        })
                            
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
                            ->orWhere('brand_seller_id', 'LIKE',"%{$search}%")
                            ->orWhere('fssai_licence_number', 'LIKE',"%{$search}%")
                           ->orWhere('brand_usp', 'LIKE',"%{$search}%")
                            ->whereHas('Seller', function($q) use($search){
                            $q->orWhere('seller_name', 'LIKE',"%{$search}%");
                        })
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['brand_name'] = $institute->brand_name;
                $nestedData['brand_id'] = $institute->brand_seller_id;
                $nestedData['fssai_licence_number'] = $institute->fssai_licence_number;
                
                $nestedData['brand_usp'] = $institute->brand_usp;

                $nestedData['live'] = ($institute->live==1)?'Live':'Not Live';
                $nestedData['seller_name'] = $institute->Seller->seller_name;
				// $sellername =  Seller::where('id',$institute->seller_id)->first();
				// 	if(!empty($sellername)){
    //           $nestedData['seller_name'] = $sellername->seller_name;
				// 	}else{
				// 		$nestedData['seller_name'] ='';
				// 	}
            //    $nestedData['seller_name'] = 'jghui';

                $nestedData['status'] = ($institute->status==1)?'Active':'Deactive';
                $nestedData['created_at'] = date('d M Y | h:i A',strtotime($institute->created_at));
              // $nestedData['action'] = '<a href="'.route('brand.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; 
              
              // <a href="'.route('brand.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2" onclick="return confirm('."'Are you sure Want Delete?'".')" >Delete</a>';

                if(Auth::user()->can('brands-edit')|| Auth::user()->can('brands-view'))
                {
                    $nestedDataEdit = '<a href="'.route('brand.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp;';
                }
                else
                {
                    $nestedDataEdit ='';
                }
                if(Auth::user()->can('brands-delete'))
                {
                    $nestedDataDelete = '
              <a href="'.route('brand.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2" onclick="return confirm('."'Are you sure Want Delete?'".')" >Delete</a>';
                }
                else
                {
                    $nestedDataDelete ='';
                }
               
                $nestedData['action'] ="$nestedDataEdit"."$nestedDataDelete";


              //<a href="'.route("deleteImage",$institute->filename).'" class="del"> Remove</a>';
        
              /*  $nestedData['action'] = '<a href="#" class="del"><span class="glyphicon glyphicon-trash"></span> 
</a><a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>';*/
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     }    



 
  function brandOfTheDay(Request $request){
 
		 $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			2 =>'seller_name'
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
                            
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
				
				$check1=BrandOfDay::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                
               // $nestedData['id'] = $key+1;
                $nestedData['brand_name'] = $institute->brand_name;
				$sellername =  Seller::where('id',$institute->seller_id)->first();
					if(!empty($sellername)){
               $nestedData['seller_name'] = $sellername->seller_name;
					}else{
						$nestedData['seller_name'] ='';
					}
            //    $nestedData['seller_name'] = 'jghui';

                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     }
     
     function brandSquare(Request $request){
 
		 $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			2 =>'seller_name'
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
                            
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
				
				$check1=\App\BrandSquare::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                
               // $nestedData['id'] = $key+1;
                $nestedData['brand_name'] = $institute->brand_name;
				$sellername =  Seller::where('id',$institute->seller_id)->first();
					if(!empty($sellername)){
               $nestedData['seller_name'] = $sellername->seller_name;
					}else{
						$nestedData['seller_name'] ='';
					}
            //    $nestedData['seller_name'] = 'jghui';

                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     }
 
  

   
    public function delete(Request $request){
	$objcategory = new NewCategories();
      $deletecategory = $objcategory->deleterecord($request);
      $message = Lang::get("labels.CategoriesDeleteMessage");
      return redirect()->back()->withErrors([$message]);
    }
	
	public function savebrandGallery(Request $request){
		$arr=array();	    
		 $check=\App\BrandGallery::where('image_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\BrandGallery::create(['brand_id'=>$request->brand_id,'image_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\BrandGallery::where('image_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	
	public function saveSponsoredBrand(Request $request){
	   // dd($request);
		$arr=array();
		
		 $Project = DB::table('brand_sponsors')->where('brand_id',$request->brand_id)->delete();
		
		if(isset($request->products[0])){
		    DB::table('brand_sponsors')->insert(['brand_id'=>$request->brand_id,'product_id'=>(int)$request->products[0]]);
		}
		if(isset($request->products[1])){
		    DB::table('brand_sponsors')->insert(['brand_id'=>$request->brand_id,'product_id'=>(int)$request->products[1]]);
		}
		
			$arr=['status'=>true,'message'=>'Product Added Successfully!!', 'products'=>$request->products];

	    
        return redirect()->back()->with(['message' => 'Brand Sponsor Updated Successfully.']);
	}
	
	public function brand_head_turners(Request $request){
	   // dd($request);
		$arr=array();
		
		 $Project = DB::table('brand_head_turners')->where('brand_id',$request->brand_id)->delete();
		
		$id = $request->brand_id;
		
		foreach($request->products as $product){
				
				DB::table('brand_head_turners')->insert(['brand_id'=>$id,'product_id'=>$product]);
				
				
					
				}
		
		
// 		if(isset($request->products[0])){
// 		    DB::table('brand_head_turners')->insert(['brand_id'=>$request->brand_id,'product_id'=>(int)$request->products[0]]);
// 		}
// 		if(isset($request->products[1])){
// 		    DB::table('brand_head_turners')->insert(['brand_id'=>$request->brand_id,'product_id'=>(int)$request->products[1]]);
// 		}
		
// 			$arr=['status'=>true,'message'=>'Product Added Successfully!!', 'products'=>$request->products];

	    
        return redirect()->back()->with(['message' => 'Brand Sponsor Updated Successfully.']);
	}
	
	function tagList(Request $request){
 
    //echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = tags::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        $institutes = tags::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        $collection=Brand::where('id',$request->cid)->first();
         $tag_ids=json_decode($collection->tag_ids);
            $ids_array = explode(',',$tag_ids);
        // return $collections;
        $data = array();
        if(!empty($institutes))
        {
      
            foreach ($institutes as $key=>$institute)
            {
        $check1=false;
            if( in_array( $institute->id,$ids_array) ) 
            {
                $check1=true;
            }
               
        // $check1=FashionSingle::where('product_id',$institute->id)->first();
        
                //echo $check;die;
              //  if($check>0)
            if(Auth::user()->can('brands-edit'))
            {
                if($check1==true)
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelectTag(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelectTag(this.value)" value="'.$institute->id.'">'; 
                    
                }

            }
            else{
                $nestedData['id']='';
            }
                $nestedData['name'] = $institute->name;
                
                
                $data[] = $nestedData;
            }
 
        }
    
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     }


public function saveCollectionTag(Request $request){
        $arr=array();   
        $id= json_encode($request->id);
        $collection=Brand::where('id',$request->collection_id)->first();
        if(isset($collection->tag_ids) && $collection->tag_ids!=null){
            $tag_ids=json_decode($collection->tag_ids);
            $ids_array = explode(',',$tag_ids);
            if( in_array( $request->id,$ids_array) )
            {
                if(count($ids_array)==1){
                    $collection->update(['tag_ids'=>null]);
                    $arr=['status'=>false,'message'=>'Tag Removed Successfully!!'];
                    return json_encode($arr);
                }else{
                    $key = array_search($request->id, $ids_array);
                    if (false !== $key) {
                        unset($ids_array[$key]);
                    }
                    $ids= implode(",",$ids_array);
                    // $ids=json_decode($emplode_ids);
                    $arr=['status'=>false,'message'=>'Tag Removed Successfully!!'];
                }
            }else{
                $ids=json_decode($collection->tag_ids).','.$request->id;
                $arr=['status'=>true,'message'=>'Tag Added Successfully!!'];
            }
            $ids_to_save= json_encode($ids);
            $collection->update(['tag_ids'=>$ids_to_save]);
        }else{
            $collection->update(['tag_ids'=>$id]);
            $arr=['status'=>true,'message'=>'Tag Added Successfully!!'];
        }
        

//     $check=\App\FashionSingle::where('product_id',$request->id)->get()->count();
//       if($check==0)
//      {   
//      \App\FashionSingle::create(['product_id'=>$request->id]);
//      $arr=['status'=>true,'message'=>'Product Added Successfully!!'];
//      }else{       
//          \App\FashionSingle::where('product_id',$request->id)->delete();
//      $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
//      }
      return json_encode($arr);
     }
	 
	  public function fashiontopbrand(){
		
      
		$title= array('pageTitle' => 'Edit Top Brands ');
        if(Auth::user()->can('brand-fashion-category'))
        {

        return view('admin.brandfashioncategories.topbrands.edit',$title); 
        }
        return redirect()->back();
    }
	
	function brandListCategory(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FashionCatTopBrand::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 

	public function saveFashioncatTopBrand(Request $request){
		$arr=array();       

         $check=\App\FashionCatTopBrand::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FashionCatTopBrand::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FashionCatTopBrand::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	public function saveFashioncatTopBranddelete()
	{
	    $updateSlider=\App\FashionCatTopBrand::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
	
	public function brandedit(){
		
        $single=\App\FashionCateBrandOfDay::first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandfashioncategories.brand.edit',$title,compact('single','brands')); 
    }
    
    public function brandfashioncate_stoperinglee(){
		
        $single=DB::table('fashioncate_stopersingle')->first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandfashioncategories.brand.edit',$title,compact('single','brands')); 
    }
    
    
    public function stoperingleesaveFashionBrandOfDay(Request $request,$id){
		
        $arr=array();
	    
		
		 DB::table('fashioncate_stopersingle')->where('id',$id)->update(['brand_id'=>$request->brand_id]);
			
			$arr=['status'=>false,'message'=>'Brand Updated Successfully!!'];
	    return redirect()->back();
    }
	
	public function saveFashionBrandOfDay(Request $request,$id)
	{
		//echo '<pre>';print_r($request->all());die;
		$arr=array();
	    
		
		 \App\FashionCateBrandOfDay::where('id',$id)->update(['brand_id'=>$request->brand_id]);
			
			$arr=['status'=>false,'message'=>'Brand Updated Successfully!!'];
	    return redirect()->back();
	}
	public function sponsorbrandedit(){
		
        $single=\App\FashionCateBrandSponsor::first();
        $brands=\App\Products::where('category_id',2)->where('status',1)->get();       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandfashioncategories.sponsor.edit',$title,compact('single','brands')); 
    }
	
	public function saveFashionSponsor(Request $request,$id)
	{		
	   // dd($request);
// 		$arr=array();
		
		$data['product_id']=$request->brand_id;
		
		$updateData=\App\FashionCateBrandSponsor::where('id',$id)->update($data);
		
// 		\App\FashionCateBrandSponsor::where('id',$id)->update(['product_id'=>$request->brand_id]);

        if($updateData){
            return redirect()->back()->with('success', 'Product Updated Successfully!!.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!!!, Please try again.');
        }

// 		$arr=['status'=>false,'message'=>'Product Updated Successfully!!'];
	   // return redirect()->back();
	}
	
	 public function fashionNoteWorth(){
		
      
		$title= array('pageTitle' => 'Edit NoteWorth ');
        return view('admin.brandfashioncategories.noteworth.edit',$title); 
    }
	function brandListnoteworthFashion(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FashionCatNoteWorth::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     }
     
     
     public function brandListnoteworthFashionDelete()
	{
	    $updateSlider=\App\FashionCatNoteWorth::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function saveFashioncatRecommenddelete()
	{
	    $updateSlider=\App\FashionCatRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function saveFashioncatNoteWorth(Request $request){
		$arr=array();       

         $check=\App\FashionCatNoteWorth::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FashionCatNoteWorth::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FashionCatNoteWorth::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}


public function saveFashioncatRecommend(Request $request){
		$arr=array();       

         $check=\App\FashionCatRecommend::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FashionCatRecommend::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FashionCatRecommend::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	public function fashionStopers(){
		
      
		$title= array('pageTitle' => 'Edit Stopers ');
        return view('admin.brandfashioncategories.stopers.edit',$title); 
    }
	function brandListrecomendFashion(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FashionCatRecommend::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	
	 public function fashionRecommend(){
		
      
		$title= array('pageTitle' => 'Edit Recommend ');
        return view('admin.brandfashioncategories.recommend.edit',$title); 
    }
	
	function brandListstopersFashion(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FashionCatStopers::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 



	public function saveFashioncatStopers(Request $request){
		$arr=array();       

         $check=\App\FashionCatStopers::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FashionCatStopers::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FashionCatStopers::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	public function saveFashioncatStopersdelete()
	{
	    $updateSlider=\App\FashionCatStopers::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
	 public function beautytopbrand(){
		
      
		$title= array('pageTitle' => 'Edit Top Brands ');
        if(Auth::user()->can('brand-beauty-category'))
        {
        
        return view('admin.brandbeautycategories.topbrands.edit',$title); 
        }
        return redirect()->back();
    }
	
	function brandListCategoryBeauty(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\BeautyCatTopBrand::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	
	public function saveBeautycatTopBranddelete()
	{
	    $updateSlider=\App\BeautyCatTopBrand::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function saveBeautycatTopBrand(Request $request){
		$arr=array();       

         $check=\App\BeautyCatTopBrand::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatTopBrand::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatTopBrand::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	public function saveBeautycatNoteBrand(Request $request){
		$arr=array();       

         $check=\App\BeautyCatNoteWorth::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatNoteWorth::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatNoteWorth::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	public function saveBeautycatRecommendBrand(Request $request){
		$arr=array();       

         $check=\App\BeautyCatRecommend::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatRecommend::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatRecommend::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	public function saveBeautycatRecommendBranddelete()
	{
	    $updateSlider=\App\BeautyCatRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function saveBeautycatNoteBranddelete()
	{
	    $updateSlider=\App\BeautyCatNoteWorth::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function beautybrandedit(){
		
        $single=\App\BeautyCateBrandOfDay::first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandbeautycategories.brand.edit',$title,compact('single','brands')); 
    }
    
    
    public function beautybrandeditt(){
		
        $single=DB::table('beautycate_stopersingle')->first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandbeautycategories.brand.edit',$title,compact('single','brands')); 
    }
	
	public function saveBeautyBrandOfDay(Request $request,$id)
	{
		//echo '<pre>';print_r($request->all());die;
		$arr=array();
	    

		 \App\BeautyCateBrandOfDay::where('id',$id)->update(['brand_id'=>$request->brand_id]);
			
			$arr=['status'=>false,'message'=>'Brand Updated Successfully!!'];
	    return redirect()->back();
	}
	
	
	public function saveBeautyyBrandOfDay(Request $request,$id)
	{
		//echo '<pre>';print_r($request->all());die;
		$arr=array();
	    

		 DB::table('beautycate_stopersingle')->where('id',$id)->update(['brand_id'=>$request->brand_id]);
			
			$arr=['status'=>false,'message'=>'Brand Updated Successfully!!'];
	    return redirect()->back();
	}
	
	public function beautysponsorbrandedit(){
		
        $single=\App\BeautyCateBrandSponsor::first();
        $brands=\App\Products::where('category_id',3)->where('status',1)->get();       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandbeautycategories.sponsor.edit',$title,compact('single','brands')); 
    }
	
	public function saveBeautySponsor(Request $request,$id)
	{		
		$arr=array();	    
		\App\BeautyCateBrandSponsor::where('id',$id)->update(['product_id'=>$request->brand_id]);			
		$arr=['status'=>false,'message'=>'Product Updated Successfully!!'];
	    return redirect()->back();
	}
	
	 public function beautyNoteWorth(){
		
      
		$title= array('pageTitle' => 'Edit NoteWorth ');
        return view('admin.brandbeautycategories.noteworth.edit',$title); 
    }
	function brandListnoteworthBeauty(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\BeautyCatNoteWorth::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	
		public function saveBeautycatNoteWorth(Request $request){
		$arr=array();       

         $check=\App\BeautyCatNoteWorth::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatNoteWorth::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatNoteWorth::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}


public function saveBeautycatRecommend(Request $request){
		$arr=array();       

         $check=\App\BeautyCatRecommend::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatRecommend::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatRecommend::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	public function beautyStopers(){
		
      
		$title= array('pageTitle' => 'Edit Stopers ');
        return view('admin.brandbeautycategories.stopers.edit',$title); 
    }
	function brandListrecomendBeauty(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\BeautyCatRecommend::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	
	 public function beautyRecommend(){
		
      
		$title= array('pageTitle' => 'Edit Recommend ');
        return view('admin.brandbeautycategories.recommend.edit',$title); 
    }
	
	function brandListstopersBeauty(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\BeautyCatStopers::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 



	public function saveBeautycatStopers(Request $request){
		$arr=array();       

         $check=\App\BeautyCatStopers::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatStopers::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatStopers::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	public function saveBeautycatstoperBrand(Request $request){
		$arr=array();       

         $check=\App\BeautyCatStopers::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyCatStopers::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\BeautyCatStopers::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	public function saveBeautycatstoperBranddelete()
	{
	    $updateSlider=\App\BeautyCatStopers::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	 public function foodtopbrand(){
		
      
		$title= array('pageTitle' => 'Edit Top Brands ');
        if(Auth::user()->can('brand-food-category'))
{
        
        return view('admin.brandfoodcategories.topbrands.edit',$title); 
}
return redirect()->back();
    }
	
	function brandListCategoryFood(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FoodCatTopBrand::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	 
	 
	 public function saveFoodcatTopBrand(Request $request){
		$arr=array();       

         $check=\App\FoodCatTopBrand::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodCatTopBrand::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FoodCatTopBrand::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	public function saveFoodcatstoperBrand(Request $request){
		$arr=array();       

         $check=\App\FoodCatStopers::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodCatStopers::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FoodCatStopers::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	public function saveFoodcatstoperBranddelete()
	{
	    $updateSlider=\App\FoodCatStopers::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function saveFoodcatTopBranddelete()
	{
	    $updateSlider=\App\FoodCatTopBrand::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function brandfoodedit(){
		
        $single=\App\FoodCateBrandOfDay::first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandfoodcategories.brand.edit',$title,compact('single','brands')); 
    }
    
    public function brandfoodeditt(){
		
        $single=DB::table('foodcate_stopersingle')->first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandfoodcategories.brand.edit',$title,compact('single','brands')); 
    }
	
	public function saveFoodBrandOfDay(Request $request,$id)
	{
		//echo '<pre>';print_r($request->all());die;
		$arr=array();
	    
		
		 \App\FoodCateBrandOfDay::where('id',$id)->update(['brand_id'=>$request->brand_id]);
			
			$arr=['status'=>false,'message'=>'Brand Updated Successfully!!'];
	    return redirect()->back();
	}
	
	public function singlesaveFoodBrandOfDay(Request $request,$id)
	{
		//echo '<pre>';print_r($request->all());die;
		$arr=array();
	    
		
		 DB::table('foodcate_stopersingle')->where('id',$id)->update(['brand_id'=>$request->brand_id]);
			
			$arr=['status'=>false,'message'=>'Brand Updated Successfully!!'];
	    return redirect()->back();
	}
	
	 public function foodNoteWorth(){
		
      
		$title= array('pageTitle' => 'Edit NoteWorth ');
        return view('admin.brandfoodcategories.noteworth.edit',$title); 
    }
	function brandListnoteworthFood(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FoodCatNoteWorth::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	
		public function saveFoodcatNoteWorth(Request $request){
		$arr=array();       

         $check=\App\FoodCatNoteWorth::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodCatNoteWorth::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FoodCatNoteWorth::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	public function saveFoodcatNoteWorthdelete()
	{
	    $updateSlider=\App\FoodCatNoteWorth::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}


   public function saveFoodcatRecommend(Request $request){
		$arr=array();       

         $check=\App\FoodCatRecommend::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodCatRecommend::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FoodCatRecommend::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	
	public function saveFoodcatRecommeBrand(Request $request){
		$arr=array();       

         $check=\App\FoodCatRecommend::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodCatRecommend::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FoodCatRecommend::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	
	public function saveFoodcatRecommeBranddelete()
	{
	    $updateSlider=\App\FoodCatRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function deletefashionProduct()
	{
	    $updateSlider=\App\FoodCatRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
	
	public function foodStopers(){
		
      
		$title= array('pageTitle' => 'Edit Stopers ');
        return view('admin.brandfoodcategories.stopers.edit',$title); 
    }
	function brandListrecomendFood(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FoodCatRecommend::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 
	
	 public function foodRecommend(){
		
      
		$title= array('pageTitle' => 'Edit Recommend ');
        return view('admin.brandfoodcategories.recommend.edit',$title); 
    }
	
	function brandListstopersFood(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'brand_name',
			
          
        );  
        $totalData = Brand::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Brand::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Brand::where('id','LIKE',"%{$search}%")
                            ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Brand::where('id','LIKE',"%{$search}%")
                             ->orWhere('brand_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $check1=\App\FoodCatStopers::where('brand_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->brand_name.'" class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="brand_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['brand_name'] = $institute->brand_name;
                
                $data[] = $nestedData;
            }
 
        }
	//print_r($data);die;
        $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );            
        echo json_encode($json_data); 
     } 



	public function saveFoodcatStopers(Request $request){
		$arr=array();       

         $check=\App\FoodCatStopers::where('brand_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodCatStopers::create(['brand_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Brand Added Successfully!!'];

        }else{       

            \App\FoodCatStopers::where('brand_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Brand Removed Successfully!!'];

        }

        return json_encode($arr);
	}
	
	public function foodsponsorbrandedit(){
		
        $single=\App\FoodCateBrandSponsor::first();
        $brands=\App\Products::where('category_id',19)->where('status',1)->get();       
		$title= array('pageTitle' => 'Brand of the day ');
        return view('admin.brandfoodcategories.sponsor.edit',$title,compact('single','brands')); 
    }
	
	public function saveFoodSponsor(Request $request,$id)
	{		
		$arr=array();	    
		\App\FoodCateBrandSponsor::where('id',$id)->update(['product_id'=>$request->brand_id]);			
		$arr=['status'=>false,'message'=>'Product Updated Successfully!!'];
	    return redirect()->back();
	}
	
}
