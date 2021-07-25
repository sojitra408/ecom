<?php

namespace App\Http\Controllers\Admin;

 
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\NewCategories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use App\Product;
use App\Models\UserForm;
use App\ImageUpload; 
use DB;
use File;
use Aws\S3\S3MultiRegionClient;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use Mail;
use Redirect;
use Lang;
use Validator;
use Hash;
use Excel;
use Storage;
use Image;
class DropzoneFileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  
	 
	 
    
	 public function __construct(UserForm $userform)
	 {
	  
	   $this->userform=$userform;
	 
	  
	 }
	 
	
	 public function index()
    {
        	$images=DB::table('image_uploads')->orderBy('id','desc')->get();
         $title 			  = 	array('pageTitle' => 'Orders');
        return   view('users.image-upload',$title)->with(['images'=>$images]);
    }
     

// ------------------------ [ Upload Image ] --------------------------

    public function uploadImages(Request $request) {
        /*$month = date('m'); 
					$year = date('Y'); 
					$dir='public/images/product/'.$year.'/'.$month.'/';
					$path='public/images/product/'.$year.'/'.$month.'/';
					
					 if(!File::isDirectory($dir)){
			 		File::makeDirectory($dir, 0777, true, true);
			 		}
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName().'.'.$image->extension();
        $image->move(public_path('images/product/'.$year.'/'.$month.'/'),$imageName);
       
        
        
		DB::table('image_uploads')->insert(
     array(
            
            'image_name'   =>   $imageName,
			 'image_path'   =>   $path
     )
);*/

	$image = $request->file('image');
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = md5(time()).'_'.$image->getClientOriginalName();
        $normal = Image::make($image)->encode($extension);
        $large = Image::make($image)->resize(800, 800)->encode($extension);
        $medium = Image::make($image)->resize(600, 600)->encode($extension);
        $small = Image::make($image)->resize(300, 300)->encode($extension);  

        Storage::disk('s3')->put('products/normal/'.$filename, (string)$normal, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/normal/'.$filename)
        ]);
        
        $data=Storage::disk('s3')->url('products/normal/'.$filename);
        Storage::disk('s3')->put('products/large/'.$filename, (string)$large, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/large/'.$filename)
        ]);
        Storage::disk('s3')->put('products/medium/'.$filename, (string)$medium, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/medium/'.$filename)
        ]);
        Storage::disk('s3')->put('products/small/'.$filename, (string)$small, 'public');
		UploadImage::create([
            'filename' => basename($filename),
            'url' => Storage::disk('s3')->url('products/small/'.$filename)
        ]);
        
        return response()->json(["status" => "success", "data" => $data]);
    }

// --------------------- [ Delete image ] -----------------------------

    public function deleteImage(Request $request) {
        $image = $request->file('filename');
        $filename =  $request->get('filename').'.jpeg';
        ImageUpload::where('image_name', $filename)->delete();
        $path = public_path().'/images/product/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
    
	  
	
	 
}

 
 