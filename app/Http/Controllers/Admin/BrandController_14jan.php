<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Brand;
 use App\Seller;

use App\Models\admin\Languages;
use App\Models\admin\admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\admin\Setting;

use App\Models\admin\Images;

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
    
    return view("admin.brand.index",$title);
  }


 

  public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Brand');
 		$seller = Seller::all();

   
    return view("admin.brand.create",$title,compact('seller'));;
  }

 public function store(Request $request){
	 //Validator::make($request->all(), [      
	 $request->validate([
      'seller_id' => 'required',
	  'brand_name' => 'required|unique:brand',
      
    ]);
		if($request->status==NULL) { $stat=0; } else { $stat=1; }

//  $brandd =  Brand::where('brand_name',"{$request->brand_name}")->get();
 //if (count($brandd)==0){
/*$id=  DB::table('brand')->insertGetId([
            'brand_name'   =>   $request->brand_name,
			'seller_id'	=> $request->seller_id,
			'status' => $stat,			
	  ]);*/
	  $data['brand_name']=$request->brand_name;
	  $data['seller_id']=$request->seller_id;
	 if ($request->hasFile("banner")) { 
            $image = $request->file("banner");  

                $ext = $image->getClientOriginalExtension(); //get extention of file
                // Get Mime type of the file, to store mediaType in DB
            $mineType = $image->getMimeType();
            $mType = explode("/", $mineType); 

                $mediaSize = $image->getSize(); //File size

            $mediaName = time() * rand() . "." . $ext; 

            $destinationPath = public_path('/uploads/banner/');
            $path_upload=$image->move($destinationPath,$mediaName); 
            if($path_upload){ 
                  
                  $data['banner']=$mediaName;
            }
        } 

        if ($request->hasFile("thumbnail")) { 
            $image = $request->file("thumbnail");  

                $ext = $image->getClientOriginalExtension(); //get extention of file
                // Get Mime type of the file, to store mediaType in DB
            $mineType = $image->getMimeType();
            $mType = explode("/", $mineType); 

                $mediaSize = $image->getSize(); //File size

            $mediaName1 = time() * rand() . "." . $ext; 

            $destinationPath1 = public_path('/uploads/thumbnail/');
            $path_upload1=$image->move($destinationPath1,$mediaName1); 
            if($path_upload1){ 
                 
				  $data['thumbnail']=$mediaName1;
            }
        } 
			Brand::create($data);
   
    return redirect()->back()->with(["success"=>"Brand Saved Successfully!"]);
 /*}
 else
	return redirect()->back()->with(["error_msg"=>"Brand already there!"]);*/
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

         $title = array('pageTitle' => 'Edit Brand');
 		$seller = Seller::all();

        $project = DB::table('brand')->find($id);
        //print_r($project);die;
        return view('admin.brand.edit',$title, compact('project','seller'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
	      'seller_id' => 'required',
	  'brand_name' => 'required|unique:brand,brand_name,'.$id,

        ]);
	if($request->status==NULL) { $stat=0; } else { $stat=1; }


        $tax=Brand::find($id);
        
        $tax->brand_name=$request->get("brand_name");
		        $tax->seller_id=$request->get("seller_id");
        $tax->status=$stat;//request->get("tax_percentage");
        $tax->save();

        return redirect()->back()->with(['message' => 'Brand Updated Successfully.']);
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
                
                $nestedData['id'] = $key+1;
                $nestedData['brand_name'] = $institute->brand_name;
				$sellername =  Seller::where('id',$institute->seller_id)->first();
 
               $nestedData['seller_name'] = $sellername->seller_name;
            //    $nestedData['seller_name'] = 'jghui';

                $nestedData['status'] = $institute->status;
                $nestedData['created_at'] = $institute->created_at;
              $nestedData['action'] = '<a href="'.route('brand.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a href="'.route('brand.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2">Delete</a>';//<a href="'.route("deleteImage",$institute->filename).'" class="del"> Remove</a>';
        
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

 
 
 
  

   
    public function delete(Request $request){
	$objcategory = new NewCategories();
      $deletecategory = $objcategory->deleterecord($request);
      $message = Lang::get("labels.CategoriesDeleteMessage");
      return redirect()->back()->withErrors([$message]);
    }
}
