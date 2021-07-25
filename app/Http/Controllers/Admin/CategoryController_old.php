<?php



namespace App\Http\Controllers\Admin;



use App\Models\admin\role;

use App\Models\admin\Languages;

use App\Models\admin\admin;

 

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use App\Models\admin\Setting;



use App\Models\admin\Images;



use App\Category;



class CategoryController_old extends Controller

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

	 

    public function display(){

	$objcategory = new NewCategories();

	

    $title = array('pageTitle' => 'Category');

    $categories = $objcategory->paginator();

    return view("admin.category.index",$title)->with('categories', $categories);

  }

  

   public function index(){



    $Categorys = Category::where('parent_id', '=', 0)->get();

        $tree='<ul id="browser" class="m-0 p-0 filetree"><li class="tree-view"></li>';

        foreach ($Categorys as $Category) {

          //<span><i class=" fas fa-folder-open"></i> Parent</span> <a href="">Create</a>

             $tree .='<li class=""><span><i class=" fas fa-folder-open"></i>'.$Category->name.'</span>  <a href="'.url('admin/category?id='.$Category->id).'">Edit</a>';

             if(count($Category->childs)) {

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

        $data = Category::get();



        return view('admin.category.index',$title,compact('tree','lastid','data'));

 

	

    // $title = array('pageTitle' => 'Category');

    

    // return view("admin.category.index",$title);

  }



  public function childView($Category){                 

            $html ='<ul>';

            foreach ($Category->childs as $arr) {

                if(count($arr->childs)){

                $html .='<li class=""><span><i class="fas fa-minus-circle"></i></i>'.$arr->name.'</span> <a href="'.route('category.edit',$arr->id).'">Edit</a>';                  

                        $html.= $this->childView($arr);

                    }else{

                        $html .='<li class=""><span><i class="fas fa-leaf"></i></i>'.$arr->name.'</span><a href="'.route('category.edit',$arr->id).'">Edit</a>';                                 

                        $html .="</li>";

                    }

                                   

            }

            

            $html .="</ul>";

            return $html;

    }







  public function categorycreate(Request $request){



    $request->validate([

            'name' => 'required'

        ], [

            'name.required' => 'Name Is Required.',

        ]);



        $Category=new Category();

        $Category->name=$request->get("name");

        $Category->parent_id=empty($input['parent_id']) ? 0 : $input['parent_id'];

        $Category->save();

        //City::create($request->all());

        return redirect()->route('admin.category')->with(['message' => 'Category Added Successfully.']);

  

  }



  public function subcategorycreate(Request $request){



    $request->validate([

            'name' => 'required',

            'select_category' => 'required',

        ], [

            'name.required' => 'Name Is Required.',

            'select_category.required' => 'Select Category.',

        ]);



        $Category=new Category();

        $Category->name=$request->get("name");

        $Category->parent_id=$request->get("select_category");

        $Category->save();

        //City::create($request->all());

        return redirect()->route('admin.category')->with(['message' => 'Sub Category Added Successfully.']);

  

  }


public function edit(Request $request){

    $id = $request->id;

    $title = array('pageTitle' => 'Edit Category');

    $category = DB::table('categories')->find($id);
        
    return view('admin.category.edit',$title, compact('category'));
    
    //return view('admin.category.edit',$title);

  

  //echo $request->id;die;

   }


   public function catdelete($id)
    {

        $Project = DB::table('categories')->where('id',$id)->orwhere('parent_id',$id)->delete();
        //$Project->delete();
        return redirect()->route('admin.category')->with(['message' => 'Category Deleted Successfully.']);
    }

   public function catupdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            
            
        ], [
            'name.required' => 'Name Is Required.',
            
            
        ]);


        $tax=Category::find($id);
        
        $tax->name=$request->get("name");
        
        $tax->save();

        return redirect()->route('admin.category')->with(['message' => 'Category Updated Successfully.']);
    }










  public function filter(Request $request){

  $objcategory = new NewCategories();

 

    $title = array('pageTitle' =>'Category');

    $categories = $objcategory->filter($request);

    return view("admin.category.index", $title)->with(['categories'=> $categories, 'name'=> $request->FilterBy, 'param'=> $request->parameter]);

  }



  public function create(Request $request){

  $objcategory = new NewCategories();

   $unit=DB::table('unit')->orderBy('unit','ASC')->get();

    $title = array('pageTitle' => 'Add Category');

 

  $images = new Images;

    $allimage = $images->getimages();

  

   

    $categories = $objcategory->recursivecategories();



    $parent_id = 0;

    $option = '<option value="0">  Leave As Parent</option>';



      foreach($categories as $parents){

        $option .= '<option value="'.$parents->categories_id.'">'.$parents->categories_name.'</option>';



          if(isset($parents->childs)){

            $i = 1;

            $option .= $this->childcat($parents->childs, $i, $parent_id);

          }



      }



    $result['categories'] = $option;

    return view("admin.category.create",$title)->with('result', $result)->with('allimage', $allimage)->with('unit',$unit);

  }



  public function childcat($childs, $i, $parent_id){

  $objcategory = new NewCategories();

  

    $contents = '';

    foreach($childs as $key => $child){

      $dash = '';

      for($j=1; $j<=$i; $j++){

          $dash .=  '-';

      }

      //print(" <i>   ".$i." chgild");  echo '<pre>'.print_r($childs, true).'</pre>';

      if($child->categories_id==$parent_id){

        $selected = 'selected';

      }else{

        $selected = '';

      }



      $contents.='<option value="'.$child->categories_id.'" '.$selected.'>'.$dash.$child->categories_name.'</option>';

      if(isset($child->childs)){



        $k = $i+1;

        $contents.= $this->childcat($child->childs,$k,$parent_id);

      }

      elseif($i>0){

        $i=1;

      }



    }

    return $contents;

  }



  public function insert(Request $request){

  $objcategory = new NewCategories();



        $date_added	= date('y-m-d h:i:s');

        $result = array();



        //get function from other controller

        $languages = $this->varseting->getLanguages();



        $categoryName = $request->categoryName;

        $parent_id = $request->parent_id;



        $uploadImage = $request->image_id;

        $uploadIcon  =$request->image_id;

        $categories_status  = $request->categories_status;

		$unit  = $request->unit;



        $categories_id = $objcategory->insert($uploadImage,$date_added,$parent_id,$uploadIcon,$categories_status,$unit);

        $slug_flag = false;



        //multiple lanugauge with record

        foreach($languages as $languages_data){

            $categoryName= 'categoryName';

            //slug

            if($slug_flag==false){

                $slug_flag=true;

                $slug = $request->$categoryName;

                $old_slug = $request->$categoryName;

                $slug_count = 0;

                do{

                    if($slug_count==0){

                        $currentSlug = $this->varseting->slugify($old_slug);

                    }else{

                        $currentSlug = $this->varseting->slugify($old_slug.'-'.$slug_count);

                    }

                    $slug = $currentSlug;

                    $checkSlug = $objcategory->checkSlug($currentSlug);

                    $slug_count++;

                }

                  while(count($checkSlug)>0);

                  $updateSlug = $objcategory->updateSlug($categories_id,$slug);

                }

            $categoryNameSub = $request->$categoryName;

            $languages_data_id = $languages_data->languages_id;

            $subcatoger_des = $objcategory->insertcategorydescription($categoryNameSub,$categories_id,$languages_data_id);

        }



        $categories =  $objcategory->subcategorydes();

        $result['categories'] = $categories;

        $message = 'Category Addedd Successfully!';

        return redirect()->back()->withErrors([$message]);

  }



public function getsub(Request $request)

{

$subcat= DB::table('categories as c')->select('c.*','cd.categories_name')->join('categories_description as cd','c.categories_id','cd.categories_id')->where('c.parent_id',$request->parentID)->get();



 

$option="";

if(count($subcat))

{

foreach($subcat as $c)

{

$option.="<option value='".$c->categories_id."'>".$c->categories_name."</option>";

}

}else{

$option.="<option value='".$request->parentID."'>Same Parent</option>";



}



return $option;

}



 

 

  



   public function update(Request $request){

   $objcategory = new NewCategories();



     $title = array('pageTitle' => 'Edit Sub Categories');

     $result = array();

     $result['message'] = 'Category has been updated successfully';

     $last_modified 	=   date('y-m-d h:i:s');

     $parent_id = $request->parent_id;

     $categories_id = $request->id;

     $categories_status  = $request->categories_status;



     //get function from other controller

     $languages = $this->varseting->getLanguages();

     $extensions = $this->varseting->imageType();



     //check slug

     if($request->old_slug!=$request->slug){

         $slug = $request->slug;

         $slug_count = 0;

         do{

             if($slug_count==0){

                 $currentSlug = $this->varseting->slugify($request->slug);

             }else{

                 $currentSlug = $this->varseting->slugify($request->slug.'-'.$slug_count);

             }

             $slug = $currentSlug;

             $checkSlug = DB::table('categories')->where('categories_slug',$currentSlug)->where('categories_id','!=',$request->id)->get();

             $slug_count++;

         }

         while(count($checkSlug)>0);

     }else{

         $slug = $request->slug;

     }

     if($request->image_id!==null){

         $uploadImage = $request->image_id;

     }else{

         $uploadImage = $request->oldImage;

     }



     if($request->image_icone !==null){

         $uploadIcon = $request->image_icone;

     }	else{

         $uploadIcon = $request->oldIcon;

     }

$unit = $request->unit;

     $updateCategory = $objcategory->updaterecord($categories_id,$uploadImage,$uploadIcon,$last_modified,$parent_id,$slug,$categories_status,$unit);



     foreach($languages as $languages_data){

       $categories_name = 'category_name';

       $checkExist = $objcategory->checkExit($categories_id,$languages_data);

         $categories_name = $request->$categories_name;

         if(count($checkExist)>0){

           $category_des_update = $objcategory->updatedescription($categories_name,$categories_id);

       }else{

           $updat_des = $objcategory->insertcategorydescription($categories_name,$categories_id, $languages_data->languages_id);

       }

     }



     $message = 'Categorie Update';

     return redirect()->back()->withErrors([$message]);

    }



    public function delete(Request $request){

	$objcategory = new NewCategories();

      $deletecategory = $objcategory->deleterecord($request);

      $message = Lang::get("labels.CategoriesDeleteMessage");

      return redirect()->back()->withErrors([$message]);

    }

}

