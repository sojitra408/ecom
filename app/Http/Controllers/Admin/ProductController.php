<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 use App\Products;
 use App\Category;
 use App\Brand;
 use App\Taxes;
 use App\Attributes;
 use App\AttributeValue;
 use App\Models\admin\UploadImage; 
 use App\Seller;
 use App\ProductVariant;
 use App\VariantValues;
 use App\HomeSponsor;
 use App\FashionSingle;
 use App\BeautySingle;
 use App\Single;
 use App\HeadTurner;
 use App\HomeRecommend;
 use App\FashionBesties;
 use App\FashionTrending;
 use App\FashionDues;
 use App\FashionMisses;
 use App\FashionKids;
 use App\tags;
 use App\SizeMaster;
 use App\HsnCode;
 use App\MaterialCare;
 use App\Cuisine;
 use App\SizeFit;
 use App\Flavour;
 use App\Item_Form;
 use App\Pattern;
 use App\Fit;
 use App\Length;
 use App\Neck;
 use App\Sleeve;
 use App\Rise;
 use App\Fabric;
 use App\SoleMaterial;
 use App\product_type;
 use App\SkinType;
 use App\HairType;
 use App\Material;
 use App\Scent;

use App\Productusp;
use App\Related_products;


 use App\HomeBestdealProduct;
use App\Models\admin\Product; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Images;

use App\Create_master_size;
use App\Size_category;
use App\Master_size;
use App\All_Size_Master_Value;
use App\All_Size_Master;
use App\Product_Master_Size;

use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Exports\ProductImportGuideExport;
use Auth;
use DB;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct( )
	 {
 
	 
	 }
	 
	 function productList(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'tsin', 
            2 =>'sku', 
            3 =>'product_name',
            4 =>'brand_name',
            5 =>'img',
            6 =>'price',
            7 =>'status',
            8 =>'action',
        );  
        $totalData = Products::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Products::with(['Brand'])->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
          $institutes =  Products::where('id','LIKE',"%{$search}%")
                            ->orWhere('sku', 'LIKE',"%{$search}%")
->orWhere('product_name', 'LIKE',"%{$search}%")
->orWhere('product_id', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
							
							
							$totalFiltered = Products::where('id','LIKE',"%{$search}%")
                             ->orWhere('sku', 'LIKE',"%{$search}%")
->orWhere('product_name', 'LIKE',"%{$search}%")
->orWhere('product_id', 'LIKE',"%{$search}%")
                             ->count();
						
							
            /*$institutes =  Products::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Products::get()->count();*/
							 
        }
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['tsin'] = $institute->tsin;
                $nestedData['sku'] = $institute->sku;
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['brand_name'] = $institute->Brand->brand_name;
                $nestedData['img'] = ' ';
                $nestedData['price'] = $institute->mrp;
				if($institute->status==1){
                $nestedData['status'] = 'Active';
				}else{
					 $nestedData['status'] = 'Inactive';
				}
         
// 				$nestedData['action'] = '<a href="'.route('product.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit 
// </a><a href="'.route('product.status',$institute->id).'" class="btn btn-primary btn-sm mr-2">Status 
// </a><a href="'.route('product.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2" onclick="return confirm('."'Are you sure Want Delete?'".')">Delete</a> ';
                

                if(Auth::user()->can('products-edit') || Auth::user()->can('products-view'))
                {
                    $nestedDataEdit = '<a href="'.route('product.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a>';
                }
                else
                {
                    $nestedDataEdit ='';
                }
                if(Auth::user()->can('products-status'))
                {
                    $nestedDataStatus = '<a href="'.route('product.status',$institute->id).'" class="btn btn-primary btn-sm mr-2">Status</a>';
                }
                else
                {
                    $nestedDataStatus ='';
                }
                if(Auth::user()->can('products-delete'))
                {
                    $nestedDataDelete = '<a href="'.route('product.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2" onclick="return confirm('."'Are you sure Want Delete?'".')">Delete</a> ';
                }
                else
                {
                    $nestedDataDelete ='';
                }
               
                $nestedData['action'] ="$nestedDataEdit"."$nestedDataStatus"."$nestedDataDelete";



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
	 function turnerProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\HeadTurner::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function food_turner_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',19)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\FoodTurner::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function food_Recommendsturner_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',19)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\FoodSponsor::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function beautyturner_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',3)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\BeautyTurner::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function beautybesttop_sell_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',3)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\BeautyTurner::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function fashionRecommends_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\FashionRecommend::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function foodRecommends_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',19)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\FoodRecommend::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     
     
     
     function beautyRecommends_table(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',3)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
                
               // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get();
				$check1=\App\BeautyRecommend::where('product_id',$institute->id)->first();
                
                if(!empty($check1))
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     

 function sponsorProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			/*$arr=array();
			$sponsered=HomeSponsor::select('product_id')->get();
			echo '<pre>';print_r($sponsered);
			foreach($sponsered as $k=>$sp){
				$arr[$k]=$sp->product_id;
			}
			echo '<pre>';print_r($arr);*/
            foreach ($institutes as $key=>$institute)
            {
				
                
              // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get()->count();
               // $check=DB::table('checkbox')->whereIn('checkbox_val1',$arr)->get()->count();
				$check1=HomeSponsor::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     
    function fashionsponsorProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			/*$arr=array();
			$sponsered=HomeSponsor::select('product_id')->get();
			echo '<pre>';print_r($sponsered);
			foreach($sponsered as $k=>$sp){
				$arr[$k]=$sp->product_id;
			}
			echo '<pre>';print_r($arr);*/
            foreach ($institutes as $key=>$institute)
            {
				
                
              // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get()->count();
               // $check=DB::table('checkbox')->whereIn('checkbox_val1',$arr)->get()->count();
				$check1=\App\FashionSponsor::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function beautysponsorProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',3)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			/*$arr=array();
			$sponsered=HomeSponsor::select('product_id')->get();
			echo '<pre>';print_r($sponsered);
			foreach($sponsered as $k=>$sp){
				$arr[$k]=$sp->product_id;
			}
			echo '<pre>';print_r($arr);*/
            foreach ($institutes as $key=>$institute)
            {
				
                
              // $check=DB::table('checkbox')->where('checkbox_val',$institute->id)->where('sessionid',Session::getId())->get()->count();
               // $check=DB::table('checkbox')->whereIn('checkbox_val1',$arr)->get()->count();
				$check1=\App\BeautySponsor::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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

 function homeproductProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
		
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=Single::where('product_id',$institute->id)->first();
               
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 function totrecommendProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=HomeRecommend::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 function bestdealProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
        
        
        
        
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=HomeBestdealProduct::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     
    public function index()
    {
         
		$title 			  = 	array('pageTitle' => 'Product List');
        if(Auth::user()->can('products') || Auth::user()->can('products-add') || Auth::user()->can('products-edit') || Auth::user()->can('products-view') || Auth::user()->can('products-delete') || Auth::user()->can('products-status'))
{
        
        return view('admin.product.index',$title);
}
return redirect()->back();
    }
	
	 public function display()
    {
       $company = NewCategories::all();
	    $category = NewCategories::all();
		$title 			  = 	array('pageTitle' => 'Product List');
        $products=$this->product->paginator();
		 
        return view('admin.product.index',$title)->with(['company'=>$company,'category'=> $category,'products'=> $products ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$step)
    {
		$title = array('pageTitle' => 'Product Create');
		$categories=Category::where('parent_id',0)->get();
		$brands=Brand::get();
		$taxes=Taxes::get();
        $seller = Seller::all();
        $allimages = UploadImage::where('type','Small')->get();
        $products = Products::where('status',1)->where('trash',0)->get();
        $attributes = Attributes::where('status',1)->get();
        $hsn = HsnCode::all();
        
        $length = 10;
        $str = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
 
        $product_id = substr(str_shuffle($str), 0, $length);

        $usp = Productusp::all();
        
        if($step == 'pricing'){
            return view('admin.product.pricing',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
        }else if($step == 'packaging') {
            return view('admin.product.packaging',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
        }else if($step == 'images') {
            return view('admin.product.images',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
        }else if($step == 'seo') {
            return view('admin.product.seo',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
        }else if($step == 'aditionalInfo'){
            return view('admin.product.adittional_info',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
        }else if($step == 'relatedProducts'){
            return view('admin.product.related_products',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
        }else{
            if(Auth::user()->can('products-add'))
            {

            return view('admin.product.basic',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes','hsn','usp','product_id'));
            }
            return redirect()->back();
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$step)
    {   
	//echo $step. '<pre>';print_r($request->all());die;
        /*$this->validate($request,[
            'product_title' => 'required|string|max:255',
            'hs_code' => 'required|string|max:500',
             'sku' => 'required|string|max:255',
			  'cat_id' => 'required'
        ]);*/
        
        $request->validate([
      'ean_code' => 'required|max:13',
      'usp' => 'required|array|min:1|max:3',
      
    ]);

        if($step == 'pricing'){
			//echo '<pre>';print_r($request->all());die;
			
        }else if($step == 'packaging') {
            return view('admin.product.packaging',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes'));
        }else if($step == 'images') {
            return view('admin.product.images',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes'));
        }else if($step == 'seo') {
            return view('admin.product.seo',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes'));
        }else if($step == 'aditionalInfo'){
            return view('admin.product.adittional_info',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes'));
        }else if($step == 'relatedProducts'){
            return view('admin.product.related_products',$title,compact('step','categories','brands','taxes','seller','allimages','products','attributes'));
        }else{ 
		//echo '<pre>';print_r($request->all());die;
		/*if(!empty($request->subcategory)){
			$subcate=implode(',',$request->subcategory);
		}else{
			$subcate='';
		}*/
         if(!isset($request->category) || $request->category=='' ){
			 return redirect()->back()->with('message','Please select Category');
		 }
		/* if(!isset($subcate) || $subcate=='' ){
			 return redirect()->back()->with('message','Please select Category');
		 }*/
		 if(!empty($request->all()['attributes'])){
			$attributes=implode(',',$request->all()['attributes']);
		}else{
			$attributes='';
		}
		
		
      	
		 $data=array(
                'company_id'=>$request->seller,
                'brand_id'=>$request->brand,
                'category_id'=>$request->category,
				//'subcategory_id'=>$subcate,
				'sub_cate'=>$request->sub_cate,
                'sub_sub_cate'=>$request->sub_sub_cate,
                'subcategory_id'=>$request->sub_cate.','.$request->sub_sub_cate,
				'attributes'=>$attributes,
                'sku'=>$request->sku,
                // 'tsin'=>$request->tsin,
                'ean_code'=>$request->ean_code,
                'product_name'=>$request->name,
                'long_description'=>$request->long_description, 
                'short_description'=>$request->short_description,
                // 'usp'=>$request->usp,
                'usp'=>implode(",",$request->all()['usp']),
                'hsn_code'=>$request->hsn_code, 
                'inventory_type'=>$request->inventory_type, 
                // 'place_origin'=>$request->place_origin,
                // 'manuf_address'=>$request->manuf_address,
                // 'cc_address'=>$request->cc_address,  
                // 'cc_contact'=>$request->cc_contact,
                // 'cc_email'=>$request->cc_email,
                // 'fssai'=>$request->fssai, 
                // 'ingredients'=>$request->ingredients,
                // 'how_to_use'=>$request->how_to_use,
                // 'nutrients'=>$request->nutrients, 
                // 'benifits'=>$request->benefits,
                // 'desclaimer'=>$request->desclaimer,
                // 'others'=>$request->others,
                'product_id'=>$request->product_id,
                'step'=>1,
                'status'=>0,
                'trash'=>0,
                'created_by'=>Auth('admin')->user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ); 
            $datap=Products::create($data); 
			return redirect()->back()->with('product_id',$datap->id)->with('brand_id',$request->brand)->with('message','Product Created Successfully');
        }
        
        // tags,pack_type,weight,base_unit,gross_weight,length,breadth,height,master_carton,master_cartonL,
// master_cartonB,master_cartonH,net_weight,,kewwords,meta_desc,status,trash,product_images,updated_at
        //return redirect(route('product.display'))->with('message','Product Created Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       $product=Products::find($id);
       $fssai = Brand::select('fssai_licence_number')->where('id',$product->brand_id)->first();
	   $categories=Category::where('parent_id',0)->get();
		$brands=Brand::get();
		$taxes=Taxes::get();
        $seller = Seller::all();       
        $attributes = Attributes::where('status',1)->get();	
        $hsn = HsnCode::all();
        $cuisine = Cuisine::all();
        $flavour = Flavour::all();
        $item_form = Item_Form::all();
        $fit = Fit::all();
        $pattern = Pattern::all();
        $lengths = Length::all();
        $neck = Neck::all();
        $sleeve = Sleeve::all();
        $rise = Rise::all();
        $fabric = Fabric::all();
        $solematerial = SoleMaterial::all();
        $product_type = product_type::all();
        $scent = Scent::all();
        $material = Material::all();
        $skin_type = SkinType::all();
        $hair_type = HairType::all();
        $country_origin = DB::table('countries')->get();
         $usp = Productusp::all();
		 $title= array('pageTitle' => 'Edit Product');
        $subcategories=Category::where('parent_id',$product->category_id)->get();
        $subsubcategories=Category::where('parent_id',$product->sub_cate)->get();
		/*$arr=array();
		$cates=Category::where('parent_id',$product->category_id)->get();
		if(!empty($cates)){
			foreach($cates as $k=>$cat){
				$array1=array();
				$sub=Category::where('parent_id',$cat->id)->get();
				foreach($sub as $k1=>$ca){
					$array1[$k1]['id']=$ca->id;
					$array1[$k1]['text']=$ca->name;
				}
				$arr[$k]['id']=$cat->id;
				$arr[$k]['text']=$cat->name;
				$arr[$k]['sub_cate']=$array1;
				
			}
		}
		$subcategories=$arr;*/
        if(Auth::user()->can('products-edit') || Auth::user()->can('products-view'))
        {

		return view('admin.product.edit',$title,compact('categories','brands','taxes','seller','product','attributes' ,'subcategories','subsubcategories','hsn','usp','country_origin','cuisine','flavour','fit','pattern','lengths','neck','sleeve','rise','scent','material','skin_type','hair_type','item_form','fssai','fabric','solematerial','product_type'));
        }
        return redirect()->back();
    }
	public function status(Request $request,$id)
    {
       $product=Products::find($id);
	   if($product->status==0){
		   $status=1;
	   }else{
		   $status=0;
	   }
	   $categories=Products::where('id',$product->id)->update(['status'=>$status]);
		
		return redirect()->back();
    }
	public function pricing(Request $request,$id)
    {
       $product=Products::with('Brand')->find($id);
	   $categories=Category::where('parent_id',0)->get();
		$brands=Brand::get();
		$taxes=Taxes::get();
        $seller = Seller::all(); 
		$attrs=explode(',',$product->attributes);
		$attributes = Attributes::where('status',1)->whereIn('id',$attrs)->get();
			/* if($product->category_id==2){
					if(in_array(20,explode(',',$product->subcategory_id))&& in_array(26,explode(',',$product->subcategory_id))){
						$attributes = Attributes::where('status',1)->whereIn('id',[5,8])->get();
					}else if(in_array(24,explode(',',$product->subcategory_id))&&in_array(32,explode(',',$product->subcategory_id))){
						$attributes = Attributes::where('status',1)->whereIn('id',[5,9])->get();
					}else{
				$attributes = Attributes::where('status',1)->whereIn('id',[4,5])->get();	
					}				
			}else{
				$attributes = Attributes::where('status',1)->whereIn('id',[6,7])->get();	  
			} */
		 $title= array('pageTitle' => 'Edit Product');
        $variants=ProductVariant::where('product_id',$id)->get();	  
		return view('admin.product.pricing',$title,compact('categories','brands','taxes','seller','product','attributes','variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		//echo '<pre>';print_r($request->all());die;
		
		$request->validate([
    //   'ean_code' => 'required|max:13',
      'usp' => 'required|array|min:1|max:3',
      
    ]);
		
		if($request->bargain_available==NULL) { $bargain_available='no'; } else { $bargain_available='yes'; }
		if($request->has_expiry==NULL) { $has_expiry='no'; } else { $has_expiry='yes'; }
		if($request->allergens==NULL) { $allergens='no'; } else { $allergens='yes'; }
        if($request->vegan==NULL) { $vegan='no'; } else { $vegan='yes'; }
        if($request->vegetarian==NULL) { $vegetarian='no'; } else { $vegetarian='yes'; }
		
		if($request->quick_buy==NULL) { $quick_buy='no'; } else { $quick_buy='yes'; }
		
		if($request->live==NULL) { $live='no'; } else { $live='yes'; }
		
		if($request->status==NULL) { $status=0; } else { $status=1; }
// 		dd($status);
        $data=array(
               // 'company_id'=>$request->seller,
               // 'brand_id'=>$request->brand,
               // 'category_id'=>$request->category,
                'sub_cate'=>$request->sub_cate,
                'sub_sub_cate'=>$request->sub_sub_cate,
                'subcategory_id'=>$request->sub_cate.','.$request->sub_sub_cate,
                //'subcategory_id'=>implode(',',$request->subcategory),
                'attributes'=>implode(',',$request->all()['attributes']),
                'sku'=>$request->sku,
                'tsin'=>$request->tsin,
                'ean_code'=>$request->ean_code,
                'product_name'=>$request->name,
                'long_description'=>$request->long_description, 
                'short_description'=>$request->short_description,
                'usp'=>implode(',',$request->usp),
                'hsn_code'=>$request->hsn_code, 
                'inventory_type'=>$request->inventory_type, 
                // 'place_origin'=>$request->place_origin,
                // 'manuf_address'=>$request->manuf_address,
                // 'cc_address'=>$request->cc_address,  
                // 'cc_contact'=>$request->cc_contact,
                // 'cc_email'=>$request->cc_email,
                'fssai'=>$request->fssai, 
                // 'ingredients'=>$request->ingredients,
                'how_to_use'=>$request->how_to_use,
                // 'nutrients'=>$request->nutrients, 
                // 'benifits'=>$request->benefits,
                'desclaimer'=>$request->desclaimer,
                // 'others'=>$request->others,
                'keywords'=>$request->keywords,

                'seller_sku'=>$request->seller_sku,
                'cuisine'=>$request->cuisine,
                
                'flavour'=>$request->flavour,
                'fabric'=>$request->fabric,
                'fit'=>$request->fit,
                'pattern'=>$request->pattern,
                'rise'=>$request->rise,
                'sleeve'=>$request->sleeve,
                'neck'=>$request->neck,
                'lengths'=>$request->lengths,

                'material'=>$request->material,
                'scent'=>$request->scent,
                'skin_type'=>$request->skin_type,
                'hair_type'=>$request->hair_type,
                'item_form'=>$request->item_form,
                

                'bargain_available'=>$bargain_available,
                'has_expiry'=>$has_expiry,
                'live'=>$live,
                // dd($status),
                'status'=>$status,
                'quick_buy'=>$quick_buy,
                'vegetarian'=>$vegetarian,
                'vegan'=>$vegan,
                'allergens'=>$allergens,

                'country_origin'=>$request->country_origin,
                'manufacturing_date'=>$request->manufacturing_date,
                'expiration_date'=>$request->expiration_date,
                'shelf_life'=>$request->shelf_life,
                'gross_weight'=>$request->gross_weight,
                'warranty'=>$request->warranty,
                'solematerial'=>$request->solematerial,
                'product_type'=>$request->product_type,
                'step'=>1,
                // 'status'=>1,
                'trash'=>0,
                'created_by'=>Auth('admin')->user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
			$datap=Products::where('id',$id)->update($data); 			
        return redirect('admin/product-inventory-edit/'.$id)->with('message','Product updated successfully');
    }
	public function pricingUpdate(Request $request,$id){
	//	echo '<pre>';print_r($request->all());die;
		$attrs=$request->attribute_id;
		//echo '<pre>';print_r($attrs);die;
		//die(count($attrs));
		//$pid=Products::where('id',$id)->first()->product_id;
		$var_id=0;
			if(isset($request->variant_id) && $request->variant_id!=''){
				if(!empty($attrs)){
					//$values=AttributeValue::where('id',$atr)->first();
					$create1=ProductVariant::where('id',$request->variant_id)->update(['product_id'=>$id,'stock'=>$request->stock,'mrp'=>$request->mrp,'offer_price'=>$request->offer_price,'tsin'=>'TSIN123','featured_image'=>$request->featured_image,'gallery_image'=>'','status'=>1,'manu_date'=>$request->manu_date,'expiry_type'=>$request->expiry_type,'no_of_days'=>$request->no_of_days,'expiry_date'=>$request->expiry_date]);
					VariantValues::where('variant_id',$request->variant_id)->delete();			
					foreach($attrs as $v){
						$values=AttributeValue::where('id',$v)->first();
						VariantValues::create(['product_id'=>$id,'variant_id'=>$request->variant_id,'attribute_id'=>$values->attribute_id,'value_id'=>$v,'status'=>1]);
					}
				}
			}else{
				if(!empty($attrs)){
					
					/*$var_count=ProductVariant::where('product_id',$id)->get()->count();
					$var_id=$var_id+$var_count+1;
					$variant_id=$pid.'-'.$var_id;*/
					$used_symbols = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'; 
					$variant_id= substr(str_shuffle($used_symbols), 0, 10);
					$create1=ProductVariant::create(['variant_id'=>$variant_id,'product_id'=>$id,'stock'=>$request->stock,'mrp'=>$request->mrp,'offer_price'=>$request->offer_price,'tsin'=>'TSIN123','featured_image'=>$request->featured_image,'gallery_image'=>'','status'=>1,'manu_date'=>$request->manu_date,'expiry_type'=>$request->expiry_type,'no_of_days'=>$request->no_of_days,'expiry_date'=>$request->expiry_date]);			
					foreach($attrs as $v){
						$values=AttributeValue::where('id',$v)->first();
						VariantValues::create(['product_id'=>$id,'variant_id'=>$create1->id,'attribute_id'=>$values->attribute_id,'value_id'=>$v,'status'=>1]);
					}
				}
			}
		
			return redirect()->back()->with('product_id',$request->product_id)->with('message','Product Created Successfully');
             
	}
	public function removeVariant(Request $request){
		
		$var_count=ProductVariant::where('id',$request->id)->delete();
		VariantValues::where('variant_id',$request->id)->delete();	
		
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function productAdditional(Request $request,$id){
		$product=Products::with('Brand')->find($id);
		$attributes = Attributes::where('status',1)->get();
		//$sizes = SizeMaster::get();
		$sizes = All_Size_Master::get();
		$taxes = Taxes::get();
		$features = \App\features::get();
		$material_care = MaterialCare::all();
		$keywords = \App\Keyword::where('tableName','product')->where('idItem',$id)->first();
        if(!$keywords){
			
			$keyw=$product->product_name.','.$product->Brand->brand_name.','.getCateNameById($product->category_id).','.getCateNameById($product->sub_cate).','.getCateNameById($product->sub_sub_cate);
			\App\Keyword::create(['keywords'=>$keyw,'tableName'=>'product','idItem'=>$id]);
			$keywords = \App\Keyword::where('idItem',$id)->first();
		}
        $size_fit = SizeFit::all();
		$product_features=array();
        $profeatures=\App\ProductFeature::select('feature_values')->where('product_id',$id)->get();
		foreach($profeatures as $ft){
			$product_features[]=$ft->feature_values;
		}
		$productsizeguide=\App\ProductSizeGuide::where('product_id',$id)->get();
		$productsizeguide_count=\App\ProductSizeGuide::where('product_id',$id)->distinct()->get(['master_label']);
		
		//echo '<pre>';print_r( $product_features);die;
		 $title= array('pageTitle' => 'Additional Info');
         if(Auth::user()->can('products-edit') || Auth::user()->can('products-view'))
        {
		return view('admin.product.adittional_info',$title,compact('attributes','features','product','taxes','sizes','material_care','keywords','size_fit','product_features','productsizeguide','productsizeguide_count'));
		}
        return redirect()->back();
	}
	public function getFeaturesValueById(Request $request){
		//echo '<pre>';print_r($request->all());
		$values=\App\FeatureValue::where('feature_id',$request->id)->get();
		return json_encode($values);
		
	}
	public function productRelated(Request $request,$id){
		$product=Products::with('Brand')->find($id);
		$attributes = Attributes::where('status',1)->get();
		$sizes = SizeMaster::get();
		$taxes = Taxes::get();
		$cate_id = Products::select('category_id')->find($id);
      
        //$related_products = Category::where('parent_id','=',$cate_id->category_id)->get();
        $related_products = Products::where('id','!=',$id)->where('status',1)->where('category_id',$cate_id->category_id)->get();
        //  dd($related_products);
		 $title= array('pageTitle' => 'Related Products');
         if(Auth::user()->can('products-edit') || Auth::user()->can('products-view'))
        {
		return view('admin.product.related_products',$title,compact('attributes','product','taxes','sizes','related_products'));
		}
        return redirect()->back();
	}
	public function additionalSave(Request $request,$id){
		
		//echo '<pre>';print_r($request->all());die;
		
	$productsizeguide=\App\ProductSizeGuide::where('product_id',$id)->get();
		if(!empty($productsizeguide)){
			\App\ProductSizeGuide::where('product_id',$id)->delete();
		}
			$label_count=$request->label_count;
			$size_name=$request->size_name;
			$master_label=$request->master_label;
			$value_name=$request->value_name;
			$ij=0;
			if(!empty($size_name)){
			foreach($size_name as $size){
				if($size!=''){
				for($ik=0;$ik<$label_count;$ik++){
					\App\ProductSizeGuide::create(['product_id'=>$id,'all_size_master_value_id'=>$request->optradio,'size_name'=>$size,'master_label'=>$master_label[$ij],'value_name'=>$value_name[$ij]]);
					$ij++;
				}
			}
			}
				
				
			}
		if(isset($request->return_allowed)){
			$return=$request->return_allowed;
		}else{
			$return=0;
		}
		if(isset($request->exchange_allowed)){
			$exchange=$request->exchange_allowed;
		}else{
			$exchange=0;
		}
		//echo '<pre>';print_r($request->features);
		if(!empty($request->features)){
			$features=implode(',',$request->features);
		}else{
			$features='';
		}
		if(!empty($request->feature_values)){
			foreach($request->feature_values as $val){
				$feature_id=\App\FeatureValue::where('id',$val)->first()->feature_id;
				\App\ProductFeature::create(['product_id'=>$id,'feature_id'=>$feature_id,'feature_values'=>$val]);
			}
			
		}
		if(empty($request->all()['material_care'])){
			$m_care='';
		}else{
			$m_care=implode(",",$request->all()['material_care']);
		}
		if(empty($request->all()['size_fit'])){
			$s_fit='';
		}else{
			$s_fit=implode(",",$request->all()['size_fit']);
		}
		//echo '<pre>';print_r($request->feature_values);die;
		$data=array('features'=>$features,'igst'=>$request->taxes,'keywords'=>$request->terms,'igst'=>$request->taxes,'return_allowed'=>$return,'exchange_allowed'=>$exchange,'size_guid'=>$request->optradio,'material_care'=>$m_care,'size_fit'=>$s_fit,'specifications'=>$request->specifications,);
		Products::where('id',$id)->update($data);
		
		$all_size_master_id =$request->master_id;
if(!empty($all_size_master_id)){
        for ($i=0; $i < count($all_size_master_id); $i++) { 
            # code...

            $sizeid = $all_size_master_id[$i];
            // $chest = $request->Chest[$i];  
            // $front_length = $request->Front_Length[$i];  
            // $across_shoulder = $request->Across_Shoulder[$i]; 
            if(!empty($request->Chest)){
                $chest = $request->Chest[$i];
            }
            else{
                $chest="";
            }
            if(!empty($request->Front_Length)){
                $front_length = $request->Front_Length[$i];
            }
            else{
                $front_length="";
            }
            if(!empty($request->Across_Shoulder)){
                $across_shoulder = $request->Across_Shoulder[$i];
            }
            else{
                $across_shoulder="";
            }
            if(!empty($request->Fit_Waist)){
                $fit_waist = $request->Fit_Waist[$i];
            }
            else{
                $fit_waist="";
            }
            if(!empty($request->Inseam_Length)){
                $inseam_length = $request->Inseam_Length[$i];
            }
            else{
                $inseam_length="";
            }
            if(!empty($request->Rise)){
                $rise = $request->Rise[$i];
            }
            else{
                $rise="";
            }
            if(!empty($request->Fit_Bust)){
                $fit_bust = $request->Fit_Bust[$i];
            }
            else{
                $fit_bust="";
            }
            if(!empty($request->Outseam_Length)){
                $outseam_length = $request->Outseam_Length[$i];
            }
            else{
                $outseam_length="";
            }
            if(!empty($request->Fit_Hip)){
                $fit_hip = $request->Fit_Hip[$i];
            }
            else{
                $fit_hip="";
            }
            if(!empty($request->Foot_Length)){
                $foot_length = $request->Foot_Length[$i];
            }
            else{
                $foot_length="";
            }

              
            // $inseam_length = $request->Inseam_Length[$i];  
            // $rise = $request->Rise[$i];  
            // $fit_bust = $request->Fit_Bust[$i];  
            // $outseam_length = $request->Outseam_Llength[$i];  
            // $hips = $request->Hips[$i];  
            // $foot_length = $request->Foot_Length[$i];  
            // dd($chert);  
            // $chest = implode(',', $chert);

        $size['product_id']=$id;
        $size['all_size_master_value_id']=$sizeid;
        $size['chest']=$chest;
        $size['front_length']=$front_length;
        $size['across_shoulder']=$across_shoulder;
        $size['fit_waist']=$fit_waist;
        $size['inseam_length']=$inseam_length;
        $size['rise']=$rise;
        $size['fit_bust']=$fit_bust;
        $size['fit_hip']=$fit_hip;
        $size['outseam_length']=$outseam_length;
        // $size['hips']=$hips;
        $size['foot_length']=$foot_length;
        

        Product_Master_Size::create($size);
		
		
		
	

        }
}
        
        return redirect()->back()->with('message','Product updated successfully');
		
	}
	
	public function productpackaging(Request $request,$id){
        // dd($request);
        $product=Products::with('Brand')->find($id);

        $attributes = Attributes::where('status',1)->get();

        $sizes = SizeMaster::get();

        $taxes = Taxes::get();

        $cate_id = Products::select('category_id')->find($id);

       

        //$related_products = Category::where('parent_id','=',$cate_id->category_id)->get();

        $related_products = Products::where('id','!=',$id)->where('status',1)->get();

         $title= array('pageTitle' => 'Packaging Info');
        if(Auth::user()->can('products-edit') || Auth::user()->can('products-view'))
        {
        return view('admin.product.packaging',$title,compact('attributes','product','taxes','sizes','related_products'));
        }
        return redirect()->back();
        

    }

    public function packagingSave(Request $request,$id){
            // dd($request);
        $data=array('dimensions'=>$request->dimensions,'width'=>$request->width,'breadth'=>$request->breadth,'height'=>$request->height,'carton'=>$request->carton,'package_width'=>$request->package_width,'package_breadth'=>$request->package_breadth,'package_height'=>$request->package_height);

        Products::where('id',$id)->update($data);           

        return redirect()->back()->with('message','Packaging updated successfully');
    }
    public function destroy($id)
    {
        Products::where('id',$id)->delete(); 
        return redirect()->back()->with('message','Product Deleted Successfully');
    }
	
	public function getBrandBySeller(Request $request){
		//echo '<pre>';print_r($request->all());die;
		$arr=array();
		$brands=Brand::where('seller_id',$request->seller_id)->where('status',1)->get();
		if(!empty($brands)){
			foreach($brands as $k=>$brand){
				$arr[$k]['id']=$brand->id;
				$arr[$k]['text']=$brand->brand_name;
				
			}
		}
		return json_encode($arr); 
	}
	public function getSubCateByCategory(Request $request){
		
		
		/*if(is_array($request->cate_id)){
			//echo '<pre>';print_r($request->cate_id);die;
			$cates=Category::whereIn('parent_id',$request->cate_id)->get();
		}else{ 
		
		}*/
		$arr=array();
		$cates=Category::where('parent_id',$request->cate_id)->get();
		if(!empty($cates)){
			foreach($cates as $k=>$cat){
				$array1=array();
				$sub=Category::where('parent_id',$cat->id)->get();
				foreach($sub as $k1=>$ca){
					$array1[$k1]['id']=$ca->id;
					$array1[$k1]['text']=$ca->name;
				}
				$arr[$k]['id']=$cat->id;
				$arr[$k]['text']=$cat->name;
				$arr[$k]['sub_cate']=$array1;
				
			}
		}
		
		return json_encode($arr); 
	}
	public function getProductByParentCategory(Request $request){
		
		$arr=array();
		$cates=Products::where('category_id',$request->cate_id)->get();
		if(!empty($cates)){
			foreach($cates as $k=>$cat){
				/*$sub=Category::where('parent_id',$cate->id)->where('status',1)->get();
				foreach($sub as $ca){
					
				}*/
				$arr[$k]['id']=$cat->id;
				$arr[$k]['text']=$cat->product_name;
				
			}
		}
		
		return json_encode($arr); 
	}
	public function allVariations(Request $request, $product_id){
		
		$variants=ProductVariant::with(['Attributes','Products'])->where('product_id',$product_id)->get();
		$title= array('pageTitle' => 'Product Variant');
		
		return view('admin.product.variants',$title,compact('variants','product_id'));
	}
	public function variantCreate(Request $request, $product_id){
		
		$variants=Attributes::get();
		$title= array('pageTitle' => 'Add Variant');
		
		return view('admin.product.create_variant',$title,compact('variants','product_id'));
	}
	public function variantStore(Request $request){
		
		$create=ProductVariant::create(['product_id'=>$request->product_id,'attribute_id'=>$request->variant_id,'status'=>1]);
		
		if($create){
		return redirect()->back()->with('success','Product Variant created successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	
	}
	
	public function allVariationValues(Request $request, $var_id){
		
		$values=VariantValues::with(['Attributes'])->where('attribute_id',$var_id)->get();
		$title= array('pageTitle' => 'Product Variant Values');
		
		return view('admin.product.variant_values',$title,compact('values','var_id'));
	}
	
	public function variantValueCreate(Request $request, $var_id){
		
		$values=AttributeValue::where('attribute_id',$var_id)->get();
		$title= array('pageTitle' => 'Add Variant Value');
		
		return view('admin.product.create_variantvalues',$title,compact('values','var_id'));
	}
	
	public function variantValueStore(Request $request){
	
		$pv=ProductVariant::where('id',$request->variant_id)->first();
		//echo '<pre>';print_r($request->all());die;
		if(!empty($request->values)){
			foreach($request->values as $v){
			$create=VariantValues::create(['product_id'=>$pv->product_id,'variant_id'=>$request->variant_id,'attribute_id'=>$pv->attribute_id,'value_id'=>$v,'status'=>1]);
			}
		}
		if($create){
		return redirect()->back()->with('success','Product Variant created successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	
	}
	
	public function savecheckbox(Request $request)
	{
		$arr=array();
	     //$check=DB::table('checkbox')->where('sessionid',Session::getId())->where('checkbox_val',$request->id)->get();
		 $check=\App\HomeSponsor::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {
	  /* DB::table('checkbox')->insert(array(
	        'checkbox_val'=>$request->id,
	        'sessionid'=>Session::getId(),
	        'type'=>'Product',
	        
	        ));*/
			\App\HomeSponsor::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{
	       // DB::table('checkbox')->where('sessionid',Session::getId())->where('checkbox_val',$request->id)->delete();
	        \App\HomeSponsor::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function saveHomeProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\Single::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\Single::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\Single::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	public function saveHomeTorner(Request $request)
	{
		$arr=array();	    
		 $check=\App\HeadTurner::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\HeadTurner::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\HeadTurner::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	public function saveHomeTotRecommend(Request $request)
	{
		$arr=array();	    
		 $check=\App\HomeRecommend::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\HomeRecommend::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\HomeRecommend::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	public function savebestdealProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\HomeBestdealProduct::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\HomeBestdealProduct::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\HomeBestdealProduct::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	function fashionproductProducts(Request $request){
    
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        
        
        
        $totalData = Products::where('category_id',2)->get()->count();          
		  
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
      
						 
						  if(empty($request->input('search.value')))
        {            
             $institutes = Products::where('category_id',2)->with(['Brand'])                        
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
          $institutes =  Products::where('id','LIKE',"%{$search}%")
                            ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                            ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                                $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                            })->orderBy($order,$dir)->get();
							
							
							$totalFiltered = Products::where('id','LIKE',"%{$search}%")
                                ->orWhere('sku', 'LIKE',"%{$search}%")
                                ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                                $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                            })->count();
						
							
           
							 
        }
		
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=FashionSingle::where('product_id',$institute->id)->first();
         
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                  
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
     
     function foodsliderproduct(Request $request){
    
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        
        
        
        $totalData = Products::where('category_id',19)->get()->count();          
		  
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
      
						 
						  if(empty($request->input('search.value')))
        {            
             $institutes = Products::where('category_id',19)->with(['Brand'])                        
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
          $institutes =  Products::where('id','LIKE',"%{$search}%")
                            ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                            ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                                $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                            })->orderBy($order,$dir)->get();
							
							
							$totalFiltered = Products::where('id','LIKE',"%{$search}%")
                                ->orWhere('sku', 'LIKE',"%{$search}%")
                                ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                                $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                            })->count();
						
							
           
							 
        }
		
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=\App\FoodSlider::where('product_id',$institute->id)->first();
         
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                  
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	 function beautyproductProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',3)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
        
        
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=BeautySingle::where('product_id',$institute->id)->first();
				
				// $nestedData['select_count']=BeautySingle::where('product_id',$institute->id)->first();
				
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	 public function saveFashionProducts(Request $request)
	{ 
		$arr=array();	    
		 $check=\App\FashionSingle::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionSingle::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionSingle::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function saveFoodslider(Request $request)
	{ 
		$arr=array();	    
		 $check=\App\FoodSlider::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FoodSlider::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FoodSlider::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function saveFashioncategory(Request $request)
	{ 
	   // dd($request);
		$arr=array();	    
		 $check=\App\FashionTopCategory::where('category_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionTopCategory::create(['category_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionTopCategory::where('category_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function deletefashionProduct()
	{
	    $updateSlider=\App\FashionSingle::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function deletefoodslider()
	{
	    $updateSlider=\App\FoodSlider::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletebeautysingle()
	{
	    $updateSlider=\App\BeautySingle::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function deletebeautyturners()
	{
	    $updateSlider=\App\BeautyTurner::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletebeautyRecommends()
	{
	    $updateSlider=\App\BeautySponsor::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletebeautyTOTRecommends()
	{
	    $updateSlider=\App\BeautyRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
		public function deletebeautyBesties()
	{
	    $updateSlider=\App\BeautyBesties::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletebeautyTrending()
	{
	    $updateSlider=\App\BeautyTrending::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
		public function deletebeautyDues()
	{
	    $updateSlider=\App\BeautyDues::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
		public function deletebeautyMisses()
	{
	    $updateSlider=\App\BeautyMisses::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
	public function deletebeautyKids()
	{
	    $updateSlider=\App\BeautyKids::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
		public function deletefoodTurners()
	{
	    $updateSlider=\App\FoodTurner::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletefoodRecommends()
	{
	    $updateSlider=\App\FoodSponsor::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletefoodsellcate()
	{
	    $updateSlider=\App\FoodTopCategory::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletefoodbestdeal()
	{
	    $updateSlider=\App\FoodTopCategory::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletefoodTotRecommends()
	{
	    $updateSlider=\App\FoodRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
			public function deletefoodBesties()
	{
	    $updateSlider=\App\FoodBesties::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
				public function deletefoodTrending()
	{
	    $updateSlider=\App\FoodTrending::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
		public function deletefoodDues()
	{
	    $updateSlider=\App\FoodDues::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
			public function deletefoodMisses()
	{
	    $updateSlider=\App\FoodMisses::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
			public function deletefoodKids()
	{
	    $updateSlider=\App\FoodKids::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletehomesingle()
	{
	    $updateSlider=\App\Single::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletehomeTurners()
	{
	    $updateSlider=\App\HeadTurner::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletehomeSponsor()
	{
	    $updateSlider=\App\HomeSponsor::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletehometopsell()
	{
	    $updateSlider=\App\HomeTopCategory::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletehomeDeal()
	{
	    $updateSlider=\App\HomeBestdealProduct::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletehomeRecommends()
	{
	    $updateSlider=\App\HomeRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletebeautytopsell()
	{
	    $updateSlider=\App\BeautyTopCategory::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
		public function deletebeautytopsellcategory()
	{
	    $updateSlider=\App\BeautyBestDeal::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionRecommends()
	{
	    $updateSlider=\App\FashionRecommend::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionBesties()
	{
	    $updateSlider=\App\FashionBesties::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionTrending()
	{
	    $updateSlider=\App\FashionTrending::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionCategory()
	{
	    $updateSlider=\App\HomeTopCategory::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function deletefashionDues()
	{
	    $updateSlider=\App\FashionDues::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionMisses()
	{
	    $updateSlider=\App\FashionMisses::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionKids()
	{
	    $updateSlider=\App\FashionKids::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function deletefashionSponsor()
	{
	    $updateSlider=\App\FashionSponsor::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Product delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	 public function saveBeautyProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\BeautySingle::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\BeautySingle::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\BeautySingle::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	
	
	function fashionbestiesProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->get()->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::where('category_id',2)->with(['Brand'])
        //             ->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        
        
        
        
        if(empty($request->input('search.value')))
        {            
             $institutes = Products::where('category_id',2)->with(['Brand'])                        
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
          $institutes =  Products::where('id','LIKE',"%{$search}%")
                            ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
    $q->orWhere('brand_name', 'LIKE',"%{$search}%");
})->orderBy($order,$dir)->get();
							
							
							$totalFiltered = Products::where('id','LIKE',"%{$search}%")
                             ->orWhere('sku', 'LIKE',"%{$search}%")
->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
    $q->orWhere('brand_name', 'LIKE',"%{$search}%");
})->count();
						
							
           
							 
        }
        
        
        
        
        
        
        
        
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=FashionBesties::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	  public function saveFashionBestiesProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\FashionBesties::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionBesties::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionBesties::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	 
	 function fashionduesProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
        
        
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=FashionDues::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	  public function saveFashionDuesProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\FashionDues::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionDues::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionDues::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	
	 function fashionKidsProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=FashionKids::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	  public function saveFashionKidsProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\FashionKids::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionKids::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionKids::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	 
	 function fashionMissesProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
        
        
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=FashionMisses::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	  public function saveFashionMissesProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\FashionMisses::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionMisses::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionMisses::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	
	 function fashionTrendingProducts(Request $request){
 
		//echo '<pre>';print_r($request->all());die;
       $columns = array( 
            0 =>'id', 
            1 =>'product_name',
            2 =>'model_name',
            3 =>'price',
           
        );  
        $totalData = Products::where('category_id',2)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        // $institutes = Products::with(['Brand'])->offset($start)
        //                  ->limit($limit)
        //                  ->orderBy($order,$dir)
        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',2)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }
                    
        $data = array();
        if(!empty($institutes))
        {
			
            foreach ($institutes as $key=>$institute)
            {
				
                
               
				$check1=FashionTrending::where('product_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['product_name'] = $institute->product_name;
                $nestedData['model_name'] = $institute->Brand->brand_name;
                $nestedData['price'] = $institute->mrp;
                
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
	 
	  public function saveFashionTrendingProducts(Request $request)
	{
		$arr=array();	    
		 $check=\App\FashionTrending::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionTrending::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionTrending::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function saveproductGallery(Request $request){
		$arr=array();	    
		 $check=\App\ProductGallery::where('product_id',$request->product_id)->where('image_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\ProductGallery::create(['product_id'=>$request->product_id,'image_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Images Added Successfully!!'];
	    }else{	     
	        \App\ProductGallery::where('image_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Images Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	public function placeOrderProductGallery(Request $request){
		//echo '<pre>';print_r($request->all());die;
		//$request->id;
		$array=$request->places;
		
		if(!empty($request->id )){
			foreach($request->id as $key=>$id){
				//$array[$key];
				\App\ProductGallery::where('id',$id)->update(['place_order'=>$array[$key]]);
			}
			
		}
		/*$arr=array();	    
		 $check=\App\ProductGallery::where('product_id',$request->product_id)->where('image_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\ProductGallery::create(['product_id'=>$request->product_id,'image_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Images Added Successfully!!'];
	    }else{	     
	        \App\ProductGallery::where('image_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Images Removed Successfully!!'];
	    }
	    return json_encode($arr);*/
		die;
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
        $collection=Products::where('id',$request->cid)->first();
         $tag_ids=json_decode($collection->tags);
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
            if(Auth::user()->can('products-edit'))
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
        $collection=Products::where('id',$request->collection_id)->first();
        if(isset($collection->tags) && $collection->tags!=null){
            $tag_ids=json_decode($collection->tags);
            $ids_array = explode(',',$tag_ids);
            if( in_array( $request->id,$ids_array) )
            {
                if(count($ids_array)==1){
                    Products::where('id',$request->collection_id)->update(['tags'=>null]);
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
                $ids=json_decode($collection->tags).','.$request->id;
                $arr=['status'=>true,'message'=>'Tag Added Successfully!!'];
            }
            $ids_to_save= json_encode($ids);
            Products::where('id',$request->collection_id)->update(['tags'=>$ids_to_save]);
        }else{
            Products::where('id',$request->collection_id)->update(['tags'=>$id]);
            $arr=['status'=>true,'message'=>'Tag Added Successfully!!'];
        }
        

      return json_encode($arr);
     }
     
     public function saveBrandOfDay(Request $request)
    {   
        // dd($request);
        // $product_id = $request->product_id;
        $arr=array();
        
         $check=\App\Related_products::where('related_products_id',$request->id)->first();
         if(empty($check))
        {
     
            \App\Related_products::create(['related_products_id'=>$request->id,'product_id'=>$request->product_id]);
            $arr=['status'=>true,'message'=>'Related Products Added Successfully!!'];
        }else{
          
            \App\Related_products::where('related_products_id',$request->id)->delete();
            $arr=['status'=>false,'message'=>'Related Products Removed Successfully!!'];
        }
        return json_encode($arr);
    }
	
	
	
	
	function beautybestiesProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',3)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\BeautyBesties::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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


    public function saveBeautyBestiesProducts(Request $request)

    {

        $arr=array();       

         $check=\App\BeautyBesties::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyBesties::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\BeautyBesties::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }


	 
    function beautyTrendingProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',3)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\BeautyTrending::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

    public function saveBeautyTrendingProducts(Request $request)

    {

        $arr=array();       

         $check=\App\BeautyTrending::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyTrending::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\BeautyTrending::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }


    function beautyduesProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',3)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\BeautyDues::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

    public function saveBeautyDuesProducts(Request $request)

    {

        $arr=array();       

         $check=\App\BeautyDues::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyDues::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\BeautyDues::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }

    

    

    function beautyKidsProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',3)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\BeautyKids::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

    public function saveBeautyKidsProducts(Request $request)

    {

        $arr=array();       

         $check=\App\BeautyKids::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyKids::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\BeautyKids::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }

    

     

     function beautyMissesProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',3)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',3)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\BeautyMisses::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

      public function saveBeautyMissesProducts(Request $request)

    {

        $arr=array();       

         $check=\App\BeautyMisses::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\BeautyMisses::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\BeautyMisses::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }










    function foodbestiesProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',19)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\FoodBesties::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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


    public function saveFoodBestiesProducts(Request $request)

    {

        $arr=array();       

         $check=\App\FoodBesties::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodBesties::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\FoodBesties::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }


     
    function foodTrendingProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',19)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\FoodTrending::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

    public function saveFoodTrendingProducts(Request $request)

    {

        $arr=array();       

         $check=\App\FoodTrending::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodTrending::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\FoodTrending::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }


    function foodduesProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',19)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\FoodDues::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

    public function saveFoodDuesProducts(Request $request)

    {

        $arr=array();       

         $check=\App\FoodDues::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodDues::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\FoodDues::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }

    

    

    function foodKidsProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',19)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\FoodKids::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

    public function saveFoodKidsProducts(Request $request)

    {

        $arr=array();       

         $check=\App\FoodKids::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodKids::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\FoodKids::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }

    

     

     function foodMissesProducts(Request $request)
    {

 

        //echo '<pre>';print_r($request->all());die;

       $columns = array( 

            0 =>'id', 

            1 =>'product_name',

            2 =>'model_name',

            3 =>'price',

           

        );  

        $totalData = Products::where('category_id',19)->count();            

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        $start = $request->input('start');

        $order = $columns[$request->input('order.0.column')];

        $dir = $request->input('order.0.dir');

            

        // $institutes = Products::with(['Brand'])->offset($start)

        //                  ->limit($limit)

        //                  ->orderBy($order,$dir)

        //                  ->get();
        
        
        if(empty($request->input('search.value')))
                         {            
                           $institutes = Products::where('category_id',19)->with(['Brand'])                        
                           ->offset($start)
                           ->limit($limit)
                           ->orderBy($order,$dir)
                           ->get();
                       }else {
                        $search = $request->input('search.value'); 
                        
                        $institutes =  Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")->offset($start)->limit($limit)
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->orderBy($order,$dir)->get();
                        
                        
                        $totalFiltered = Products::where('id','LIKE',"%{$search}%")
                        ->orWhere('sku', 'LIKE',"%{$search}%")
                        ->orWhere('product_name', 'LIKE',"%{$search}%")->whereHas('Brand', function($q) use($search){
                            $q->orWhere('brand_name', 'LIKE',"%{$search}%");
                        })->count();
                        
                        
                        
                        
                    }

        $data = array();

        if(!empty($institutes))

        {

            

            foreach ($institutes as $key=>$institute)

            {

                

                

               

                $check1=\App\FoodMisses::where('product_id',$institute->id)->first();

                //echo $check;die;

              //  if($check>0)

                if($check1)

                {

                

                $nestedData['id'] = '<input data-name="'.$institute->product_name.'" class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';

                

                }else{

                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 

                    

                }

                $nestedData['product_name'] = $institute->product_name;

                $nestedData['model_name'] = $institute->Brand->brand_name;

                $nestedData['price'] = $institute->mrp;

                

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

     

      public function saveFoodMissesProducts(Request $request)

    {

        $arr=array();       

         $check=\App\FoodMisses::where('product_id',$request->id)->get()->count();

         if($check==0)

        {     

            \App\FoodMisses::create(['product_id'=>$request->id]);

            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];

        }else{       

            \App\FoodMisses::where('product_id',$request->id)->delete();

            $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];

        }

        return json_encode($arr);

    }
	
	
	
	public function getsizeList(Request $request){

        //echo '<pre>';print_r($request->all());die;

        $arr=array();

        // $brands=All_Size_Master_Value::where('id',$request->collection_id)->get();
        $brands=All_Size_Master_Value::where('all_size_master_id',$request->id)->get();

        // $brands=explode(',', $brands);
        // $userData['data'] = $brands;
        // dd($userData);
        // if(!empty($brands)){

        //     foreach($brands as $k=>$brand){

        //         // $arr[$k]['id']=$brand->id;

        //         $arr[$k]['text']=$brand;

                

        //     }

        // }
        
        // return json_encode($userData);
        return json_encode(array('data'=>$brands));
        

    }
    
     public function export(Request $request) 
    {
        // $this->validate($request,[
        //     'from' => 'required',
        //     'to' => 'required',
           
        // ],
        // [
        //     'from.required' => 'Select From date.',
        //     'to.required' => 'Select To date.',
        // ]);

        // $from = $request->from;
        // $to = $request->to;
        // dd('ok');
        return Excel::download(new ProductExport(), 'Product-reports.xlsx');

    }
    
    public function import(){
        $title = array('pageTitle' => 'Import Product');
       
       if(Auth::user()->can('products-add'))
        {

        return view('admin.product.import',$title);
        
        }
        return redirect()->back();
        
    }

    public function importProducts(Request $request) {
        $request->validate([
            'csv_file' => 'required'
        ]);
        Excel::import(new ProductsImport, request()->file('csv_file'));
        return back()->with('success', 'Products imported successfully.');
    }
    
    public function exportguide(Request $request) 
    {

        return Excel::download(new ProductImportGuideExport(), 'Product Import Guide Sheet.xlsx');
    }
	
	
	
	
	
	
}
