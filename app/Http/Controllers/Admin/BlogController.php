<?php



namespace App\Http\Controllers\Admin;



use App\Models\admin\role;

use App\Models\admin\Languages;

use App\Models\admin\admin;

use App\Attributes;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use App\Models\admin\Setting;



use App\Models\admin\Images;


 
use App\BlogCategory;
use App\Blog;
use App\tags; 
use Illuminate\Support\Str;
use Auth;

class BlogController extends Controller

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

	public function getSubCateByCategory(Request $request){
		
		
		/*if(is_array($request->cate_id)){
			//echo '<pre>';print_r($request->cate_id);die;
			$cates=Category::whereIn('parent_id',$request->cate_id)->get();
		}else{ 
		
		}*/
		$arr=array();
		$cates=BlogCategory::where('parent_id',$request->cate_id)->get();
		if(!empty($cates)){
			foreach($cates as $k=>$cat){
				$array1=array();
				$sub=BlogCategory::where('parent_id',$cat->id)->get();
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
		$cates=Blog::where('cat_id',$request->cate_id)->get();
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
	 

     public function create()
    {
		$title = array('pageTitle' => 'Blog Create');
		$categories=BlogCategory::where('parent_id',0)->get();
	 
        if(Auth::user()->can('post-list'))
       {

            return view('admin.blog.create',$title,compact('categories'));
            
       }
       return redirect()->back();  
          
    }
     public function index()
    {
		$title = array('pageTitle' => 'Blog Create');
	 
	   if(Auth::user()->can('post-list'))
       {

            return view('admin.blog.index',$title);
       }
       return redirect()->back();
       
          
    }
	
	 public function store(Request $request)
    {   
	 
 $request->validate([
	  'blog_title' => 'required',
      
    ]);
 
	if($request->status==NULL) { $stat=0; } else { $stat=1; }
     
	$postalcode=@explode(',',$request->postalcode);
        // dd($request);
            $data=array(
                 
                'category_id'=>$request->category,
				 'subcategory_id'=>@implode(',',$request->subcategory),
                'blog_title'=>$request->blog_title,
                'slug'=>Str::slug($request->blog_title, '-'),
                'short_des'=>$request->short_des,
				 'description'=>$request->description,
				  'tags'=>$request->tags,
				  'read_time'=>$request->read_time,
				  'added_date'=>$request->added_date,
				  'tag_ids'=>'"' . @implode(',',$request->product_id). '"',
                'status'=>$stat,
                
            ); 
            $datap=Blog::create($data); 
			return redirect()->back()->with('message','Post Created Successfully');
        
        
        // tags,pack_type,weight,base_unit,gross_weight,length,breadth,height,master_carton,master_cartonL,
// master_cartonB,master_cartonH,net_weight,,kewwords,meta_desc,status,trash,product_images,updated_at
        //return redirect(route('product.display'))->with('message','Product Created Successfully');
    }
    
    
      function blogList(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'blog_title',
            2=>'featured_image',
            3 =>'status',
            4 =>'action'
           

          
        );  
        $totalData = Blog::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Blog::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Blog::where('id','LIKE',"%{$search}%")
                            ->orWhere('blog_title', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Blog::where('id','LIKE',"%{$search}%")
                             ->orWhere('blog_title', 'LIKE',"%{$search}%")
                            
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['blog_title'] = $institute->blog_title;
			
 $nestedData['featured_image'] = $institute->featured_image;
                $nestedData['status'] = ($institute->status==1)?'Active':'Deactive';
                
               // $nestedData['action'] = '<a href="'.route('blog.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a   href="'.route('blog.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2">Delete</a>';
      

                if(Auth::user()->can('post-list'))
                {
                    $nestedDataEdit = '<a href="'.route('blog.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp;';
                }
                else
                {
                    $nestedDataEdit ='';
                }
                if(Auth::user()->can('brands-delete'))
                {
                    $nestedDataDelete = '
              <a   href="'.route('blog.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2">Delete</a>';
                }
                else
                {
                    $nestedDataDelete ='';
                }
               
                $nestedData['action'] ="$nestedDataEdit"."$nestedDataDelete";








         
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
	 
	  public function edit(Request $request,$id)
    {
		$title = array('pageTitle' => 'Blog Edit');
		$categories=BlogCategory::where('parent_id',0)->get();
		$project=Blog::where('id',$id)->first(); 
	 
	    $arr=array();

        $cates=BlogCategory::where('parent_id',$project->category_id)->get();

        if(!empty($cates)){

            foreach($cates as $k=>$cat){

                $array1=array();

                $sub=BlogCategory::where('parent_id',$cat->id)->get();

                foreach($sub as $k1=>$ca){

                    $array1[$k1]['id']=$ca->id;

                    $array1[$k1]['text']=$ca->name;

                }

                $arr[$k]['id']=$cat->id;

                $arr[$k]['text']=$cat->name;

                $arr[$k]['sub_cate']=$array1;

                

            }

        }

        $subcategories=$arr;
        
        if(Auth::user()->can('post-list'))
        {
            
            return view('admin.blog.edit',$title,compact('categories','project','subcategories'));
        }
       return redirect()->back();
          
    }
	public function update(Request $request)
    {   
	 
 $request->validate([
	  'blog_title' => 'required',
      
    ]);
 
	if($request->status==NULL) { $stat=0; } else { $stat=1; }
     
	
        
            $data=array(
                 
                // 'category_id'=>$request->category,
				 'subcategory_id'=>@implode(',',$request->blog_cat),
                'blog_title'=>$request->blog_title,
                'slug'=>Str::slug($request->blog_title, '-'),
                'short_des'=>$request->short_des,
				 'description'=>$request->description,
				  'tags'=>$request->tags,
				  'featured_image'=>$request->featured_image,
				  'horizontal_image'=>$request->horizontal_image,
				  'vertical_image'=>$request->vertical_image,
				  'read_time'=>$request->read_time,
				  'added_date'=>$request->added_date,
                'status'=>$stat,
                
            ); 
            $datap=Blog::where('id',$request->id)->update($data); 
			return redirect()->back()->with('message','Post Updated Successfully');
        
        
        // tags,pack_type,weight,base_unit,gross_weight,length,breadth,height,master_carton,master_cartonL,
// master_cartonB,master_cartonH,net_weight,,kewwords,meta_desc,status,trash,product_images,updated_at
        //return redirect(route('product.display'))->with('message','Product Created Successfully');
    }
    
    public function delete($id)
    {
        $Project = DB::table('blog')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Blog Deleted Successfully.']);
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
        if(!empty($request->cid)){
                $collection=Blog::where('id',$request->cid)->first();
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
            if(Auth::user()->can('post-list'))
            {

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
        }else{
         //        $collection=Blog::where('id',$request->cid)->first();
         // $tag_ids=json_decode($collection->tag_ids);
         //    $ids_array = explode(',',$tag_ids);
        // return $collections;
        $data = array();
        if(!empty($institutes))
        {
      
            foreach ($institutes as $key=>$institute)
            {
        $check1=false;
            // if( in_array( $institute->id,$ids_array) ) 
            // {
            //     $check1=true;
            // }
               
        // $check1=FashionSingle::where('product_id',$institute->id)->first();
        
                //echo $check;die;
              //  if($check>0)

                if(Auth::user()->can('post-list'))
            {        
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
        $collection=Blog::where('id',$request->collection_id)->first();
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
    
    /* BLOG MANAGEMENT -> BLOG LIST HOME */ 
    
    public function bloglisthome(){
        $pageTitle = array('pageTitle' => 'Home Blog List');
        $blogs = Blog::all();
        
        $blogSettingTable = 'homeblogsetting';
        $feature1 = DB::table($blogSettingTable)->where('type', 'feature1')->first();
        $feature2 = DB::table($blogSettingTable)->where('type', 'feature2')->first();
        
        $featuredBlogId1 = 1;
        $featuredBlogId2 = 1;
        
        if($feature1){
            $featuredBlogId1 = $feature1->blogId;
        }
        if($feature2){
            $featuredBlogId2 = $feature2->blogId;
        }
        
        if(Auth::user()->can('home-blog-list'))
        {

        return view('admin.blog.home', $pageTitle, compact('blogs', 'featuredBlogId1', 'featuredBlogId2'));   
        }
        return redirect()->back();
    }
    
    public function saveBlogListHome(Request $request){
        $featuredBlogId1 = intval($request->input('feature1'));
        $featuredBlogId2 = intval($request->input('feature2'));
        $query = array('message' => 'Featured Blog Updated Successfully', 'feature1idreceived' => $featuredBlogId1, 'feature2idreceived' => $featuredBlogId2);
        $blogSettingTable = 'homeblogsetting';
        
        $feature1 = DB::table($blogSettingTable)->where('type', 'feature1')->first();
        $feature2 = DB::table($blogSettingTable)->where('type', 'feature2')->first();
        
        // update featured blog 1 - create if not exists
        if(empty($feature1)){
            DB::table($blogSettingTable)->insert(
                array(
                    'type' => 'feature1',
                    'blogId' => $featuredBlogId1
                )
            );
        } else {
            DB::table($blogSettingTable)
                ->where('type', 'feature1')
                ->update(
                    array(
                        'blogId' => $featuredBlogId1
                    )
                );
        }
        
        // update featured blog 1 - create if not exists
        if(empty($feature2)){
            DB::table($blogSettingTable)->insert(
                array(
                    'type' => 'feature2',
                    'blogId' => $featuredBlogId2
                )
            );
        } else {
            DB::table($blogSettingTable)
                ->where('type', 'feature2')
                ->update(
                    array(
                        'blogId' => $featuredBlogId2
                    )
                );
        }
        
		return redirect()->back()->with($query);
    }
    
}

