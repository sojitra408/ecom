<?php
namespace App\Http\Controllers\Admin;
use App\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Blog;
use App\Blogcategory;
use App\Http\Requests;
 use DB;
use Session;
use Mail;
use Redirect;
use Lang;
 use Validator;
use Hash;
use Excel;
use App\menu;
use App\Brand_Menu;
use App\Category;
use App\Attributes;
use App\features;
use App\Brand;
 

class BrandMenuController extends Controller

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
        
        
     public function categoryOrder(){
		 $title = array('pageTitle' => 'Category Menu Order');
	 $list = Category::get(); 
	  $data = Brand_Menu::where('parent_id', '=', 0)->get();
      if(Auth::user()->can('menu-management'))
      {

	  return view('admin.manage-menu.brand_category_order',$title,compact('data','list'));
      }
      return redirect()->back();
	 }
	 public function categoryOrderSubmit(Request $request){
		//echo '<pre>';print_r($request->all());die;
		$name=$request->name;
		if(!empty($request->id)){
			foreach($request->id as $k=>$id){
				if(isset($name[$k])){
					 Brand_Menu::where('id',$id)->update(['order_id'=>$name[$k]]);
				}
				
			}
		}
	  
	  return redirect()->back()->with(["success"=>"Menu Saved Successfully!"]);
	 }
    
	public function manageMenu(){
	
	 $title 			  = 	array('pageTitle' => 'manage menu');

     $data = Brand_Menu::where('parent_id', '=', 0)->get();
    
	 $title = array('pageTitle' => 'Menu Manager');
	 $list = Category::get(); 

     if(Auth::user()->can('menu-management'))
      {

	  return view('admin.manage-menu.brand_manage-menu',$title,compact('data','list'));
      }
      return redirect()->back();
		 

    }

    public function childView($Category){                 

            $html ='<ul>';

            foreach ($Category->childs as $arr) {

                if(!empty($arr->childs)){

                $html .='<li class=""><span><i class="fas fa-minus-circle"></i></i>'.$arr->name.'</span>'; 
                  if(!empty($arr->banner)){ 
                  $html .= '<span><img style="height:20px;" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/'.getSliderMediaById($arr->banner).'"></span>';
                  }
                  $html .= '<a href="'.url('admin/category?id='.$arr->id).'">Edit</a>';                  

                        $html.= $this->childView($arr);

                    }else{

                        $html .='<li class=""><span><i class="fas fa-leaf"></i></i>'.$arr->name.'</span>'; 
                        if(!empty($arr->banner)){ 
                        $html .= '<span><img style="height:20px;" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/'.getSliderMediaById($arr->banner).'"></span>';
                        }
                        $html .= '<a href="'.url('admin/category?id='.$arr->id).'">Edit</a>';                                 

                        $html .="</li>";

                    }

                                   

            }

            

            $html .="</ul>";

            return $html;

    }

    public function create(){

        
    
     $title               =     array('pageTitle' => 'manage menu');

     if(Auth::user()->can('menu-management'))
      {

      return view('admin.manage-menu.brand_create',$title);
      }
      return redirect()->back();
    
         

    }

    public function createsub(){
    
     $title               =     array('pageTitle' => 'manage menu');
    
        $menus = Brand_Menu::all();

        if(Auth::user()->can('menu-management'))
      {

      return view('admin.manage-menu.brand_submenu',$title,compact('menus'));
      }
      return redirect()->back();
         

    }

    public function save(Request $request){
    
    $request->validate([

           // 'name' => 'required',
            'select_category' => 'required',

        ], [

          //  'name.required' => 'Main Menu Is Required.',
            'select_category.required' => 'Select Brand Is Required.',

        ]);


    $data['name']=$request->submenu;
    $data['parent_id']=$request->mainmenu;
   $data['select_category']=$request->select_category;
   
   
   
    Brand_Menu::create($data);
   
    return redirect()->back()->with(["success"=>"Menu Saved Successfully!"]);
         

    }

    public function savesub(Request $request){
    
    $request->validate([

            'submenu' => 'required',
            'select_category' => 'required',
            

        ], [

            'submenu.required' => 'Sub Menu Is Required.',
            'select_category.required' => 'Select Brand Is Required.',
            

        ]);
     

    $parent = $request->mainmenu;

    $data['name']=$request->submenu;
    $data['parent_id']=$parent;
    $data['select_category']=$request->select_category;
   
   

    Brand_Menu::create($data);
   
    return redirect()->back()->with(["success"=>"Sub Menu Saved Successfully!"]);
         

    }

    public function edit(Request $request,$id){
    
    $request->validate([

            'name' => 'required',
          //  'select_category' => 'required',

        ], [

            'name.required' => 'Main Menu Is Required.',
           // 'select_category.required' => 'Select Category Is Required.',

        ]);
    // dd($request->id);

    $tax= Brand_Menu::find($id);
    // dd($tax);
    $tax->name=$request->name;
    $tax->banner=$request->banner_image;
    $tax->icon=$request->thumbnail_image;
    $tax->url=$request->url;
    $tax->urlsecond=$request->urlsecond;
    // $tax->select_category=$request->select_category;
    $tax->save();
   
    return redirect()->back()->with(["success"=>"Menu Update Successfully!"]);
         

    }

    public function delete($id){
    
   

    // $tax= menu::find($id);
     // dd($id);
    $deleteData=Brand_Menu::where('id',$id)->orwhere('parent_id',$id)->delete();
    
    return redirect()->back()->with(["success"=>"Menu Delete Successfully!"]);
         

    }
    
      
	 	
	

}