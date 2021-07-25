<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\Products; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Collection; 

use App\Models\admin\Product; 
use App\Blog;
use App\Blogcategory;
use App\CollectionGallery;
use App\Http\Requests;
 use DB;
use Session;
use Mail;
use Redirect;
use Lang;
 use Validator;
use Hash;
use Excel;
use App\tags;
use Illuminate\Support\Str;
 

class CollectionsController extends Controller

{

    /**

     * Show the profile for the given user.

     *

     * @param  int  $id

     * @return View

     */
 
    public function __construct()
        {
           
    		$this->middleware('auth:admin');
      
    
    }
        
        
     
    
	public function manageCollections(){
	
	 $title 			  = 	array('pageTitle' => 'manage collections');
	 $collections=Collection::all();

     if(Auth::user()->can('collections')||Auth::user()->can('collections-add')||Auth::user()->can('collections-edit')||Auth::user()->can('collections-view')||Auth::user()->can('collections-delete'))
     {

	  return view('admin.manage-collection.manage-collection',$title,compact('collections','title'));
     }
     return redirect()->back();
		 

    }
    public function addCollection(){
	
	  $title = array('pageTitle' => 'add collections');

      if(Auth::user()->can('collections-add'))
     {
	  return view('admin.manage-collection.add-collection',$title);

     }
     return redirect()->back();

		 

    }
    public function saveCollection(Request $request){
	
	   $request->validate([
      'name' => 'required',
	  'description' => 'required',
	  'collection_type' => 'required',
	  'expiry_date' => 'required',
      
    ]);
    //   Collection::create($request->all());
    $data['name']=$request->name;
    $data['slug']=Str::slug($request->name, '-');
    $data['collection_type']=$request->collection_type;
    $data['expiry_date']=$request->expiry_date;
	$data['description']=$request->description;
// 	$data['status']=$request->status?true:false;
	Collection::create($data);
	  return redirect()->route('admin.manage.collection')->with(['message' => 'Collection Added Successfully.']);
		 

    }
      
      public function editCollection($id){
    //   $product= Product::all();          
	
	  $title = array('pageTitle' => 'edit collections');
	  $collection=Collection::where('id',$id)->first();
	  $galleries=CollectionGallery::where('collection_id',$id)->get();

      if(Auth::user()->can('collections-edit')||Auth::user()->can('collections-view'))
     {

	  return view('admin.manage-collection.edit-collection',$title,compact('collection','galleries'));
     }
     return redirect()->back();
		 

    }
     public function updateCollection(Request $request,$id){
    $request->validate([
      'name' => 'required',
	  'description' => 'required',
	  'expiry_date' => 'required',
      
    ]);
    $data['name']=$request->name;
    $data['slug']=Str::slug($request->name, '-');
    // $data['collection_type']=$request->collection_type;
    $data['expiry_date']=$request->expiry_date;
	$data['description']=$request->description;
	$data['status']=$request->status?true:false;
	Collection::where('id',$id)->update($data);
	return redirect()->route('admin.manage.collection')->with(['message' => 'Collection Updated Successfully.']);
		 

    }
    
    public function deleteCollection($id){
        $collection = Collection::find($id)->delete();
        return redirect()->route('admin.manage.collection')->with(['message' => 'Collection Deleted Successfully.']);
    }
    
    function collectionList(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'name',
			2 =>'collection_type',
            3 =>'status',
            4 =>'expiry_date',
			5 =>'action'
          
        );  
        $totalData = Collection::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Collection::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Collection::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Collection::where('id','LIKE',"%{$search}%")
                             ->orWhere('name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['name'] = $institute->name;
                $nestedData['collection_type'] = $institute->collection_type;
				// $sellername =  Seller::where('id',$institute->seller_id)->first();
				// 	if(!empty($sellername)){
    //           $nestedData['seller_name'] = $sellername->seller_name;
				// 	}else{
				// 		$nestedData['seller_name'] ='';
				// 	}
            //    $nestedData['seller_name'] = 'jghui';

                $nestedData['status'] = ($institute->status==1)?'Active':'Deactive';
                $nestedData['expiry_date'] = date('d M Y | h:i A',strtotime($institute->expiry_date));
              $nestedData['action'] = '<a href="'.route('admin.edit.collection',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a href="'.route('admin.delete.collection',$institute->id).'" class="btn btn-danger btn-sm mr-2">Delete</a>';//<a href="'.route("deleteImage",$institute->filename).'" class="del"> Remove</a>';
        
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
     
     	function productList(Request $request){
 
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
            
        $institutes = Products::with(['Brand'])->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        $collection=Collection::where('id',$request->cid)->first();
         $product_ids=json_decode($collection->product_ids);
            $ids_array = explode(',',$product_ids);
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

            if(Auth::user()->can('collections-edit'))
            {


                if($check1==true)
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                }
            else
            {
                $nestedData['id']='';
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
     public function saveCollectionProduct(Request $request){
        $arr=array();	  
        $id= json_encode($request->id);
        $collection=Collection::where('id',$request->collection_id)->first();
        if(isset($collection->product_ids) && $collection->product_ids!=null){
            $product_ids=json_decode($collection->product_ids);
            $ids_array = explode(',',$product_ids);
            if( in_array( $request->id,$ids_array) )
            {
                if(count($ids_array)==1){
                    $collection->update(['product_ids'=>null]);
                    $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
                    return json_encode($arr);
                }else{
                    $key = array_search($request->id, $ids_array);
                    if (false !== $key) {
                        unset($ids_array[$key]);
                    }
                    $ids= implode(",",$ids_array);
                    // $ids=json_decode($emplode_ids);
                    $arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
                }
            }else{
                $ids=json_decode($collection->product_ids).','.$request->id;
                $arr=['status'=>true,'message'=>'Product Added Successfully!!'];
            }
            $ids_to_save= json_encode($ids);
            $collection->update(['product_ids'=>$ids_to_save]);
        }else{
            $collection->update(['product_ids'=>$id]);
            $arr=['status'=>true,'message'=>'Product Added Successfully!!'];
        }
        

// 		 $check=\App\FashionSingle::where('product_id',$request->id)->get()->count();
// 	     if($check==0)
// 	    {	  
// 			\App\FashionSingle::create(['product_id'=>$request->id]);
// 			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
// 	    }else{	     
// 	        \App\FashionSingle::where('product_id',$request->id)->delete();
// 			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
// 	    }
	    return json_encode($arr);
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
        $collection=Collection::where('id',$request->cid)->first();
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
            if(Auth::user()->can('collections-edit')){
                if($check1==true)
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]" checked="checked" onClick="checkboxSelectTag(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="product_id[]"   onClick="checkboxSelectTag(this.value)" value="'.$institute->id.'">'; 
                    
                }
            }
            else
            {
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
        $collection=Collection::where('id',$request->collection_id)->first();
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
        

// 		 $check=\App\FashionSingle::where('product_id',$request->id)->get()->count();
// 	     if($check==0)
// 	    {	  
// 			\App\FashionSingle::create(['product_id'=>$request->id]);
// 			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
// 	    }else{	     
// 	        \App\FashionSingle::where('product_id',$request->id)->delete();
// 			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
// 	    }
	    return json_encode($arr);
     }
	 	
	public function savecollectionGallery(Request $request){
		$arr=array();	    
		 $check=\App\CollectionGallery::where('collection_id',$request->brand_id)->where('image_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\CollectionGallery::create(['collection_id'=>$request->brand_id,'image_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Image Added Successfully!!'];
	    }else{	     
	        \App\CollectionGallery::where('collection_id',$request->brand_id)->where('image_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Image Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}

}