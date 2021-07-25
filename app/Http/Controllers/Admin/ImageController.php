<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\admin\UploadImage;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Aws\S3\S3MultiRegionClient;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use DB;
use Session;
use Mail;
use Redirect;
use Lang;
use Validator;
use Hash;
use Excel;
use Storage;
use Image;
use App\Brand;
use App\BrandGallery;
use App\ProductGallery;
use App\CollectionGallery;

 

class ImageController extends Controller

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
    public function index()
    {
		$brands=\App\Brand::where('status',1)->get();
         $title = array('pageTitle' => 'Media Listing');
         if(Auth::user()->can('media'))
         {
        return view('admin.images.folder',$title,compact('brands'));

         }
         return redirect()->back();
    }
    
   public function slider()
    {
         $title = array('pageTitle' => 'Edit Slider Image');
         if(Auth::user()->can('media'))
         {

        return view('admin.images.slider',$title);
         }
         return redirect()->back();
    }
	public function category()
    {
         $title = array('pageTitle' => 'Edit Category Image');
         if(Auth::user()->can('media'))
         {

        return view('admin.images.category',$title);
         }
         return redirect()->back();
    }
	public function general()
    {
         $title = array('pageTitle' => 'Edit General Image');
         if(Auth::user()->can('media'))
         {
         	
        return view('admin.images.general',$title);
         }
         return redirect()->back();
    }
	public function brand(Request $request,$id)
    {
		$brands=\App\Brand::where('status',1)->get();
		$brandsingle=\App\Brand::where('id',$id)->first();
         $title = array('pageTitle' => 'Edit Brand Image');
		 $brand_id=$id;
		 if(Auth::user()->can('media'))
         {
         	
        return view('admin.images.brand',$title,compact('brandsingle','brands','brand_id'));
         }
         return redirect()->back();
    }


    public function store(Request $request)
    {
		
		$image = $request->file('file');
			$extension = $request->file('file')->getClientOriginalExtension();
			$filename = md5(time()).'_'.$image->getClientOriginalName();
			$normal = Image::make($image)->encode($extension);
			$large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  

			
			$brand_name = $request->folder;
			
			Storage::disk('s3')->put($brand_name.'/normal/'.$filename, (string)$normal, 'public');		
			Storage::disk('s3')->put($brand_name.'/large/'.$filename, (string)$large, 'public');		
			Storage::disk('s3')->put($brand_name.'/medium/'.$filename, (string)$medium, 'public');		
			Storage::disk('s3')->put($brand_name.'/small/'.$filename, (string)$small, 'public');
			$uploaded=UploadImage::create([
				'filename' => basename($filename),
				'url' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'normal' => Storage::disk('s3')->url($brand_name.'/normal/'.$filename),
				'large' => Storage::disk('s3')->url($brand_name.'/large/'.$filename),
				'medium' => Storage::disk('s3')->url($brand_name.'/medium/'.$filename),
				'small' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'folder' => $brand_name
			]);
			
			if($uploaded){
				$message = 'Images Upload Successfully!';
				return json_encode(['message'=>$message,'media'=>$uploaded]);
			}else{
			$message = 'Something Wrong!';

			return redirect()->back()->withErrors([$message]);
			}
		
		/*$image = $request->file('file');
        $extension = $request->file('file')->getClientOriginalExtension();
        $filename = md5(time()).'_'.$image->getClientOriginalName();
        $normal = Image::make($image)->encode($extension);
        $large = Image::make($image)->resize(800, 800)->encode($extension);
        $medium = Image::make($image)->resize(600, 600)->encode($extension);
        $small = Image::make($image)->resize(300, 300)->encode($extension);  

 
        Storage::disk('s3')->put('products/normal/'.$filename, (string)$normal, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/normal/'.$filename),
			  'type' => 'Normal'
        ]);
        Storage::disk('s3')->put('products/large/'.$filename, (string)$large, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/large/'.$filename),
			 'type' => 'Large'
        ]);
        Storage::disk('s3')->put('products/medium/'.$filename, (string)$medium, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/medium/'.$filename),
			 'type' => 'Medium'
        ]);
        Storage::disk('s3')->put('products/small/'.$filename, (string)$small, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/small/'.$filename),
			 'type' => 'Small'
        ]);*/
		
    }
	public function MenuImage(Request $request)
    {
		
   
        
			
			$image = $request->file('file');
			$extension = $request->file('file')->getClientOriginalExtension();
			$filename = md5(time()).'_'.$image->getClientOriginalName();
			$normal = Image::make($image)->encode($extension);
			$large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  

			
			$brand_name = 'menu';
			
			Storage::disk('s3')->put($brand_name.'/normal/'.$filename, (string)$normal, 'public');		
			Storage::disk('s3')->put($brand_name.'/large/'.$filename, (string)$large, 'public');		
			Storage::disk('s3')->put($brand_name.'/medium/'.$filename, (string)$medium, 'public');		
			Storage::disk('s3')->put($brand_name.'/small/'.$filename, (string)$small, 'public');
			$uploaded=UploadImage::create([
				'filename' => basename($filename),
				'url' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'normal' => Storage::disk('s3')->url($brand_name.'/normal/'.$filename),
				'large' => Storage::disk('s3')->url($brand_name.'/large/'.$filename),
				'medium' => Storage::disk('s3')->url($brand_name.'/medium/'.$filename),
				'small' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'folder' => $brand_name
			]);
			
			if($uploaded){
				$message = 'Images Upload Successfully!';
				return json_encode(['message'=>$message,'media'=>$uploaded]);
			}else{
			$message = 'Something Wrong!';

			return redirect()->back()->withErrors([$message]);
			}
		
    }
	
	public function BrandImage(Request $request)
    {
		$brand=Brand::find($request->brand_id);
		if(!empty($brand)){
			
   
        
			
			$image = $request->file('file');
			$extension = $request->file('file')->getClientOriginalExtension();
			$filename = md5(time()).'_'.$image->getClientOriginalName();
			$normal = Image::make($image)->encode($extension);
			$large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  

			
			$brand_name = preg_replace('/\s+/', '', $brand->brand_name);
			
			Storage::disk('s3')->put($brand_name.'/normal/'.$filename, (string)$normal, 'public');		
			Storage::disk('s3')->put($brand_name.'/large/'.$filename, (string)$large, 'public');		
			Storage::disk('s3')->put($brand_name.'/medium/'.$filename, (string)$medium, 'public');		
			Storage::disk('s3')->put($brand_name.'/small/'.$filename, (string)$small, 'public');
			$uploaded=UploadImage::create([
				'filename' => basename($filename),
				'url' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'normal' => Storage::disk('s3')->url($brand_name.'/normal/'.$filename),
				'large' => Storage::disk('s3')->url($brand_name.'/large/'.$filename),
				'medium' => Storage::disk('s3')->url($brand_name.'/medium/'.$filename),
				'small' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'folder' => $brand_name
			]);
			
			if($uploaded){
				$message = 'Images Upload Successfully!';
				return json_encode(['message'=>$message,'media'=>$uploaded]);
			}else{
			$message = 'Something Wrong!';

			return redirect()->back()->withErrors([$message]);
			}
		}else{
			$message = 'Something Wrong!';

        return redirect()->back()->withErrors([$message]);
		}
    }
	
	public function collectionImage(Request $request)
    {
		
			
			$image = $request->file('file');
			$extension = $request->file('file')->getClientOriginalExtension();
			$filename = md5(time()).'_'.$image->getClientOriginalName();
			$normal = Image::make($image)->encode($extension);
			$large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  

			
			$brand_name = 'collection';
			
			Storage::disk('s3')->put($brand_name.'/normal/'.$filename, (string)$normal, 'public');		
			Storage::disk('s3')->put($brand_name.'/large/'.$filename, (string)$large, 'public');		
			Storage::disk('s3')->put($brand_name.'/medium/'.$filename, (string)$medium, 'public');		
			Storage::disk('s3')->put($brand_name.'/small/'.$filename, (string)$small, 'public');
			$uploaded=UploadImage::create([
				'filename' => basename($filename),
				'url' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'normal' => Storage::disk('s3')->url($brand_name.'/normal/'.$filename),
				'large' => Storage::disk('s3')->url($brand_name.'/large/'.$filename),
				'medium' => Storage::disk('s3')->url($brand_name.'/medium/'.$filename),
				'small' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'folder' => $brand_name
			]);
			
			if($uploaded){
				$message = 'Images Upload Successfully!';
				return json_encode(['message'=>$message,'media'=>$uploaded]);
			}else{
			$message = 'Something Wrong!';

			return redirect()->back()->withErrors([$message]);
			}
		
    }
	
	public function BlogImage(Request $request)
    {
		
			
			$image = $request->file('file');
			$extension = $request->file('file')->getClientOriginalExtension();
			$filename = md5(time()).'_'.$image->getClientOriginalName();
			$normal = Image::make($image)->encode($extension);
			$large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  

			
			$brand_name = 'blogs';
			
			Storage::disk('s3')->put($brand_name.'/normal/'.$filename, (string)$normal, 'public');		
			Storage::disk('s3')->put($brand_name.'/large/'.$filename, (string)$large, 'public');		
			Storage::disk('s3')->put($brand_name.'/medium/'.$filename, (string)$medium, 'public');		
			Storage::disk('s3')->put($brand_name.'/small/'.$filename, (string)$small, 'public');
			$uploaded=UploadImage::create([
				'filename' => basename($filename),
				'url' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'normal' => Storage::disk('s3')->url($brand_name.'/normal/'.$filename),
				'large' => Storage::disk('s3')->url($brand_name.'/large/'.$filename),
				'medium' => Storage::disk('s3')->url($brand_name.'/medium/'.$filename),
				'small' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'folder' => $brand_name
			]);
			
			if($uploaded){
				$message = 'Images Upload Successfully!';
				return json_encode(['message'=>$message,'media'=>$uploaded]);
			}else{
			$message = 'Something Wrong!';

			return redirect()->back()->withErrors([$message]);
			}
		
    }
	
    public function show(Image $image)
    {
        return $image->url;
    }
   
    
     public function deleteImage(Request $request) { 
        $filename =  $request->filename;
        UploadImage::where('filename', $filename)->delete();
			Storage::disk('s3')->delete('products/normal/'.$filename, (string)$normal, 'public');
		        Storage::disk('s3')->delete('products/large/'.$filename, (string)$large, 'public');
        Storage::disk('s3')->delete('products/small/'.$filename, (string)$small, 'public');
		 Storage::disk('s3')->delete('products/medium/'.$filename, (string)$medium, 'public');
        $message ="Image deleted succesfully!";
      return redirect()->back()->withErrors($message);
       
    }
    
 function meadiaList(Request $request,$folder){
 
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',
            2 =>'folder',
            3 =>'img',
            4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$folder)->get()->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = UploadImage::where('folder',$folder)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  UploadImage::where('id','LIKE',"%{$search}%")
							->where('type','Small')
                            ->orWhere('url', 'LIKE',"%{$search}%")
 						    ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = UploadImage::where('id','LIKE',"%{$search}%") 
							->where('type','Small')
                             ->orWhere('url', 'LIKE',"%{$search}%") 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
               $nestedData['image_name'] = $institute->filename;
               $nestedData['folder'] = $institute->folder;
			  $brand_home_pic = preg_replace('/\s+/', '', $institute->folder); 
                 $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_home_pic.'/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="'.route("deleteImage",$institute->filename).'" class="del"> Remove</a>';
                
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
	
 function brandGallery(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'folder',           
            3 =>'img',
           // 4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
               // $nestedData['id'] = $key+1;
			   $check1=BrandGallery::where('image_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="image_id[]" checked="checked" onClick="checkboxSelectGallery(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="image_id[]"   onClick="checkboxSelectGallery(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 //$nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 
	 
	 function collectionGallery(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = 'collection';
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'folder',           
            3 =>'img',
           // 4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
               // $nestedData['id'] = $key+1;
			   $check1=CollectionGallery::where('collection_id',$request->brand_id)->where('image_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="image_id[]" checked="checked" onClick="checkboxgallerySelect(this.value)" value="'.$institute->id.'">';
                
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="image_id[]"   onClick="checkboxgallerySelect(this.value)" value="'.$institute->id.'">'; 
                    
                }
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 //$nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 
	 
	  function galleryModal(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
       $columns = array( 
            0 =>'id', 
            1 =>'place_order', 
            2 =>'image_name',           
            4 =>'folder',           
            4 =>'img',
           // 4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
               // $nestedData['id'] = $key+1;
			   $check1=ProductGallery::where('product_id',$request->variantId)->where('image_id',$institute->id)->first();
                //echo $check;die;
              //  if($check>0)
                if($check1)
                {
                
                $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="image_id[]" checked="checked"  onClick="checkboxSelect(this.value,'.$request->variantId.')" value="'.$institute->id.'">';
                $nestedData['place_order'] = '<input class="form-control place_order" type="number" name="place_order"  value="'.$check1->place_order.'">'; 
                }else{
                   $nestedData['id'] = '<input class="product-id-checked" type="checkbox" name="image_id[]" onClick="checkboxSelect(this.value,'.$request->variantId.')" value="'.$institute->id.'">'; 
                     $nestedData['place_order'] = '<input class="form-control place_order" type="number" name="place_order"  value="">'; 
                }
                              
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 //$nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 
	  function menubanner(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = 'menu';
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'folder',           
            3 =>'img',
            4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 function menuicon(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = 'menu';
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'folder',           
            3 =>'img',
            4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/normal/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 
	 
	 function meadiaList2(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'folder',           
            3 =>'img',
            4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/normal/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	  function meadiaList23(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'folder',           
            3 =>'img',
            4=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['folder'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image-var"> Select</a>';
                
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
	 function meadiaListBrandRight(Request $request){
 
 $brand=Brand::find($request->brand_id);
 $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               // $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->folder;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-rightimage"> Select</a>';
                
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
	 
	  function meadiaListBrandHome(Request $request){
 
 $brand=Brand::find($request->brand_id);
  $brand_name = preg_replace('/\s+/', '', $brand->brand_name);
       $columns = array( 
            0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action' 
        );  
        $totalData = UploadImage::where('folder',$brand_name)->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder',$brand_name)
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
               
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;               
                $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$institute->folder.'/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-homeimage"> Select</a>';
                
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
	 
	 
public function SliderImage(Request $request)
    {
		
			$image = $request->file('file');
			$extension = $request->file('file')->getClientOriginalExtension();
			$filename = md5(time()).'_'.$image->getClientOriginalName();
			$normal = Image::make($image)->encode($extension);
			$large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  

			
			$brand_name = 'slider';
			
			Storage::disk('s3')->put($brand_name.'/normal/'.$filename, (string)$normal, 'public');		
			Storage::disk('s3')->put($brand_name.'/large/'.$filename, (string)$large, 'public');		
			Storage::disk('s3')->put($brand_name.'/medium/'.$filename, (string)$medium, 'public');		
			Storage::disk('s3')->put($brand_name.'/small/'.$filename, (string)$small, 'public');
			$uploaded=UploadImage::create([
				'filename' => basename($filename),
				'url' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'normal' => Storage::disk('s3')->url($brand_name.'/normal/'.$filename),
				'large' => Storage::disk('s3')->url($brand_name.'/large/'.$filename),
				'medium' => Storage::disk('s3')->url($brand_name.'/medium/'.$filename),
				'small' => Storage::disk('s3')->url($brand_name.'/small/'.$filename),
				'folder' => $brand_name
			]);
			
			if($uploaded){
				$message = 'Images Upload Successfully!';
				return json_encode(['message'=>$message,'media'=>$uploaded]);
			}else{
			$message = 'Something Wrong!';

			return redirect()->back()->withErrors([$message]);
			}
		
    }	
 function mediaSlider(Request $request){
 
 //$brand=Brand::find($request->brand_id);
       $columns = array( 
            0 =>'id', 
            1 =>'url',
            2=>'action' 
        );  
        $totalData = UploadImage::where('folder','slider')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','slider')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;
               // $nestedData['url'] = $institute->url;
                 $nestedData['url'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 function mediaRightSlider(Request $request){
 
 //$brand=Brand::find($request->brand_id);
       $columns = array( 
            0 =>'id', 
            1 =>'url',
            2=>'action' 
        );  
        $totalData = UploadImage::where('folder','slider')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','slider')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['image_name'] = $institute->filename;
               // $nestedData['url'] = $institute->url;
                 $nestedData['url'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-rightimage"> Select</a>';
                
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
	 function categoryMedia(Request $request){
 
       $columns = array( 
             0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action'
        );  
        $totalData = UploadImage::where('folder','category')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','category')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
               // $nestedData['url'] = $institute->url;
			    $nestedData['image_name'] = $institute->filename;
                 $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-image"> Select</a>';
                
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
	 
	  function categoryMediaRight(Request $request){
 
       $columns = array( 
             0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action'
        );  
        $totalData = UploadImage::where('folder','category')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','category')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
               // $nestedData['url'] = $institute->url;
			    $nestedData['image_name'] = $institute->filename;
                 $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-rightimage"> Select</a>';
                
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
	 
	 public function categoryImage(Request $request)
    {
		
		
		$image = $request->file('file');
        $extension = $request->file('file')->getClientOriginalExtension();
        $filename = md5(time()).'_'.$image->getClientOriginalName();
        $normal = Image::make($image)->encode($extension);
        $large = Image::make($image)->resize(1690, 1690, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$medium = Image::make($image)->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);
			$small = Image::make($image)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension);  
 
        Storage::disk('s3')->put('category/normal/'.$filename, (string)$normal, 'public');		
        Storage::disk('s3')->put('category/large/'.$filename, (string)$large, 'public');		
        Storage::disk('s3')->put('category/medium/'.$filename, (string)$medium, 'public');		
        Storage::disk('s3')->put('category/small/'.$filename, (string)$small, 'public');
		$uploaded=UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('category/small/'.$filename),
            'normal' => Storage::disk('s3')->url('category/normal/'.$filename),
            'large' => Storage::disk('s3')->url('category/large/'.$filename),
            'medium' => Storage::disk('s3')->url('category/medium/'.$filename),
            'small' => Storage::disk('s3')->url('category/small/'.$filename),
			'folder' => 'category'
        ]);
		
		if($uploaded){
			$message = 'Images Upload Successfully!';
			return json_encode(['message'=>$message,'media'=>$uploaded]);
		}else{
		$message = 'Something Wrong!';

        return redirect()->back()->withErrors([$message]);
		}
    }
	
	public function getImageById(Request $request){

	
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/medium/'.$institute->filename.'" width="250" height="250" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	/* public function getBrandImageById(Request $request){

	$brand=Brand::find($request->brand_id);
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand->brand_name.'/small/'.$institute->filename.'" width="75" height="75" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }*/
	  public function getCategoryImageById(Request $request){

	
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/'.$institute->filename.'" width="75" height="75" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	 public function getBrandImageById(Request $request){

		$brand=Brand::find($request->brand_id);
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
			$brand_name = preg_replace('/\s+/', '', $brand->brand_name);
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_name.'/small/'.$institute->filename.'" width="150" height="150" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	 public function getMenubannerImageByid(Request $request){

		//$brand=Brand::find($request->brand_id);
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
			$brand_name = 'menu';
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_name.'/small/'.$institute->filename.'" width="150" height="150" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	 
	 public function getMenuThumbnailImageById(Request $request){

		//$brand=Brand::find($request->brand_id);
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
			$brand_name = 'menu';
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_name.'/small/'.$institute->filename.'" width="150" height="150" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	 
	  public function getBrandThumbnailImageById(Request $request){

		$brand=Brand::find($request->brand_id);
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
			$brand_name = preg_replace('/\s+/', '', $brand->brand_name);
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_name.'/small/'.$institute->filename.'" width="150" height="150" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	 public function getBrandHomeImageById(Request $request){

		$brand=Brand::find($request->brand_id);
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
			$brand_name = preg_replace('/\s+/', '', $brand->brand_name);
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_name.'/small/'.$institute->filename.'" width="150" height="150" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
	 
	
	 function meadiaListblogimage1(Request $request){
 
       $columns = array( 
             0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action'
        );  
        $totalData = UploadImage::where('folder','blogs')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','blogs')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
               // $nestedData['url'] = $institute->url;
			    $nestedData['image_name'] = $institute->filename;
                 $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/blogs/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-img1"> Select</a>';
                
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
	 
	  function meadiaListblogimage2(Request $request){
 
       $columns = array( 
             0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action'
        );  
        $totalData = UploadImage::where('folder','blogs')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','blogs')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
               // $nestedData['url'] = $institute->url;
			    $nestedData['image_name'] = $institute->filename;
                 $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/blogs/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-img2"> Select</a>';
                
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
	 
	  function meadiaListblogimage3(Request $request){
 
       $columns = array( 
             0 =>'id', 
            1 =>'image_name',           
            2 =>'img',
            3=>'action'
        );  
        $totalData = UploadImage::where('folder','blogs')->count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
                   
            $institutes = UploadImage::where('folder','blogs')
						 ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
               // $nestedData['url'] = $institute->url;
			    $nestedData['image_name'] = $institute->filename;
                 $nestedData['img'] = '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/blogs/small/'.$institute->filename.'" width="75" />';
                 $nestedData['action'] = '<a href="javascript:void(0)" data-imageid="'.$institute->id.'" class="select-img3"> Select</a>';
                
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
	 
	 public function getBlogImageById(Request $request){

		
        $institute= UploadImage::where('id',$request->id)->first();     
       
        if(!empty($institute))
        {
			$brand_name = 'blogs';
           $img= '<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/'.$brand_name.'/small/'.$institute->filename.'" width="150" height="150" />';
 
        }else{
			$img='';
		}
       
		echo $img;die;
		 
     }
}