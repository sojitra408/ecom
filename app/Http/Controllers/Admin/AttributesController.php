<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Attributes;
use App\AttributeValue;

use App\Models\admin\Languages;
use App\Models\admin\admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\admin\Setting;

use App\Models\admin\Images;
use Auth;
class AttributesController extends Controller
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
 
	
    $title = array('pageTitle' => 'Attributes');
    
    if(Auth::user()->can('attributes') || Auth::user()->can('attributes-add') || Auth::user()->can('attributes-edit') || Auth::user()->can('attributes-view') || Auth::user()->can('attributes-delete'))
{
        
    return view("admin.attributes.index",$title);
}
return redirect()->back();

  }


 

  public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Attribbute');
 	//	$seller = Seller::all();

   if(Auth::user()->can('attributes-add'))
{
        
    return view("admin.attributes.create",$title);//,compact('seller'));;
}
return redirect()->back();
  }

 public function store(Request $request){	 
	
	     
	 $request->validate([
	  'attributes_name' => 'required|unique:attributes',
      
    ]);
	if($request->status==NULL) { $stat=0; } else { $stat=1; }

     
	
	$create =Attributes::create([ 'attributes_name'=>$request->attributes_name,'status' => $stat]);
		if($create){
			if(!empty($request->attr_value)){
				foreach($request->attr_value as $attr){
					if($attr !=''){
				AttributeValue::create(['attribute_id'=>$create->id,'value_name'=>$attr,'status'=>1]);
					}
				}
				
			}
		return redirect()->back()->with(["success"=>"Attribbute Saved Successfully!"]);
	  }else{
		  return redirect()->back()->with(["error"=>"Something Wrong!"]);
	  }
 
}

  function attributeList(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'attributes_name',
            2 =>'status',
            3 =>'created_at',
            4 =>'action'

          
        );  
        $totalData = Attributes::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Attributes::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Attributes::where('id','LIKE',"%{$search}%")
                            ->orWhere('attributes_name', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Attributes::where('id','LIKE',"%{$search}%")
                             ->orWhere('attributes_name', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['attributes_name'] = $institute->attributes_name;
			

                $nestedData['status'] = ($institute->status==1)?'Active':'Deactive';
                $nestedData['created_at'] = date('d M Y | h:i A',strtotime($institute->created_at));
                // $nestedData['action'] = '<a href="'.route('attributes.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a href="'.route('attributes.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2" onclick="return confirm('."'Are you sure Want Delete?'".')">Delete</a>';
      

                if(Auth::user()->can('attributes-edit') || Auth::user()->can('attributes-view'))
                {
                    $nestedDataEdit = '<a href="'.route('attributes.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp;';
                }
                else
                {
                    $nestedDataEdit ='';
                }
                if(Auth::user()->can('attributes-delete'))
                {
                    $nestedDataDelete = '<a href="'.route('attributes.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2" onclick="return confirm('."'Are you sure Want Delete?'".')">Delete</a>';
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

 /**/
 
  public function destroy($id)
    {

        $Project = Attributes::where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Attribute Deleted Successfully.']);
    }

    public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Attribute');

        $project = Attributes::find($id);
        $values = AttributeValue::where('attribute_id',$id)->get();
        //print_r($project);die;

        if(Auth::user()->can('attributes-edit') || Auth::user()->can('attributes-view'))
{
        
        return view('admin.attributes.edit',$title, compact('project','values'));
}
return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $request->validate([
	  'attributes_name' => 'required|unique:attributes,attributes_name,'.$id,

        ]);
	if($request->status==NULL) { $stat=0; } else { $stat=1; }


        $tax=Attributes::find($id);
        $color_code='';
		$update=Attributes::where('id',$id)->update([ 'attributes_name'=>$request->attributes_name,'status' => $stat]);
        if($update){
				if(!empty($request->attr_value)){
					$already=AttributeValue::where('attribute_id',$id)->get();
					$arr=array();
					foreach($already as $ald){
							$arr[]=$ald->id;
					}
					$attr_ids=$request->attr_id;
					$arrd=array_diff($arr,$attr_ids);
					foreach($arrd as $a){
						AttributeValue::where('id',$a)->delete();
					}
				foreach($request->attr_value as $k=>$attr){
					if($attr !=''){
						if(!empty($request->color_code)){
							$color_code=$request->color_code[$k];
						}
						if($attr_ids[$k]==''){
							AttributeValue::create(['attribute_id'=>$id,'value_name'=>$attr,'color_code'=>$color_code,'status'=>1]);
						}else{
							AttributeValue::where('id',$attr_ids[$k])->update(['value_name'=>$attr,'color_code'=>$color_code,'status'=>1]);
						}
					}
				}
				
			}
        return redirect()->back()->with(['message' => 'Attribute Updated Successfully.']);
		}else{
			 return redirect()->back()->with(["error"=>"Something Wrong!"]);
		}
    }
	
  

  /**/ 
    public function delete(Request $request){
	$objcategory = new NewCategories();
      $deletecategory = $objcategory->deleterecord($request);
      $message = Lang::get("labels.CategoriesDeleteMessage");
      return redirect()->back()->withErrors([$message]);
    }
}
