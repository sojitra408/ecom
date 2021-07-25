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

use App\Category;
use App\Attributes;
use App\features;
 

class MenuManagementController extends Controller

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
	  $data = menu::where('parent_id', '=', 0)->get();
      if(Auth::user()->can('menu-management'))
      {

	  return view('admin.manage-menu.category_order',$title,compact('data','list'));
      }
      return redirect()->back();
	 }
	 public function categoryOrderSubmit(Request $request){
		//echo '<pre>';print_r($request->all());die;
		$name=$request->name;
		if(!empty($request->id)){
			foreach($request->id as $k=>$id){
				if(isset($name[$k])){
					 menu::where('id',$id)->update(['order_id'=>$name[$k]]);
				}
				
			}
		}
	  
	  return redirect()->back()->with(["success"=>"Menu Saved Successfully!"]);
	 }
    
	public function manageMenu(){
	
	 $title 			  = 	array('pageTitle' => 'manage menu');

     $data = menu::where('parent_id', '=', 0)->get();
    /*
    $category = "";
    $Categorys = Category::where('parent_id', '=', 0)->get();

        $tree='<ul id="browser" class="m-0 p-0 filetree"><li class="tree-view"></li>';

        foreach ($Categorys as $Category) {
                
             $tree .='<li class=""><span><i class=" fas fa-folder-open"></i> '.$Category->name.'</span> '; 
              if(isset($Category->banner) && $Category->banner!='' ){ 
              $tree .= '<span> <img width="25" height="25" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/'.getSliderMediaById($Category->banner).'"> </span>';
              }
              $tree .= ' <a href="'.url('admin/category?id='.$Category->id).'">Edit</a>';
                $Category->childs=Category::where('parent_id',  $Category->id)->get();
             if(!empty($Category->childs)) {

                $tree .=$this->childView($Category);

            }

        }

        $tree .='<ul>';

        // return $tree;

        $title = array('pageTitle' => 'Category');



        $lastid = Category::latest()->first();

        if(!empty($lastid))

        {

          $lastid = Category::latest()->first()->id;

        }

        //dd($lastid->id);
        $attributes= Attributes::where('status', '=', 1)->get();
  $features= features::get();

       // $list = Category::get(); 
        if(isset($_GET['id'])){ 
          $title = array('pageTitle' => 'Edit Category'); 
          $category = DB::table('categories')->find($_GET['id']);
        }
        */
	 // return view('admin.manage-menu.manage-menu',$title,compact('data','tree','list'));
	 $title = array('pageTitle' => 'Menu Manager');
	 $list = Category::get(); 
     if(Auth::user()->can('menu-management'))
      {

	  return view('admin.manage-menu.manage-menu',$title,compact('data','list'));
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
      return view('admin.manage-menu.create',$title);

      }
      return redirect()->back();
         

    }

    public function createsub(){
    
     $title               =     array('pageTitle' => 'manage menu');
    
        $menus = menu::all();

        if(Auth::user()->can('menu-management'))
      {

      return view('admin.manage-menu.submenu',$title,compact('menus'));
      }
      return redirect()->back();
         

    }

    public function save(Request $request){
    
    $request->validate([

           // 'name' => 'required',
            'select_category' => 'required',

        ], [

          //  'name.required' => 'Main Menu Is Required.',
            'select_category.required' => 'Select Category Is Required.',

        ]);


    $data['name']=$request->submenu;
    $data['parent_id']=$request->mainmenu;
    // $data['url']=$request->url;
   $data['select_category']=$request->select_category;
   
   
   
    menu::create($data);
   
    return redirect()->back()->with(["success"=>"Menu Saved Successfully!"]);
         

    }

    public function savesub(Request $request){
    
    $request->validate([

            'submenu' => 'required',
            'select_category' => 'required',
            

        ], [

            'submenu.required' => 'Sub Menu Is Required.',
            'select_category.required' => 'Select Category Is Required.',
            

        ]);
     

    //  $request->validate([
    //   'submenu' => 'required',
    //   'mainmenu' => 'required',
      
      
    // ]);

    $parent = $request->mainmenu;

    $data['name']=$request->submenu;
    $data['parent_id']=$parent;
    $data['select_category']=$request->select_category;
   
   

    menu::create($data);
   
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

    $tax= menu::find($id);
    // dd($tax);
    $tax->name=$request->name;
    $tax->banner=$request->banner_image;
    $tax->icon=$request->thumbnail_image;
    $tax->url=$request->url;
    //$tax->select_category=$request->select_category;
    $tax->save();
   
    return redirect()->back()->with(["success"=>"Menu Update Successfully!"]);
         

    }

    public function delete($id){
    
   

    // $tax= menu::find($id);
     // dd($id);
    $deleteData=menu::where('id',$id)->orwhere('parent_id',$id)->delete();
    
    return redirect()->back()->with(["success"=>"Menu Delete Successfully!"]);
         

    }
    
      
	 	
	

}