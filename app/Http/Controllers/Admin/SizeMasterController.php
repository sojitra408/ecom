<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Features;
use App\FeatureValue;

use App\All_Size_Master;
use App\All_Size_Master_Value;
use Auth;

class SizeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function __construct()
     {
 
     
     }
    public function index()
    {$seller=array();
        
        $title            =     array('pageTitle' => 'All Size Master');

        $features = All_Size_Master::orderBy('id', 'DESC')->get();

        if(Auth::user()->can('size-master')||Auth::user()->can('size-master-add')||Auth::user()->can('size-master-edit')||Auth::user()->can('size-master-view')||Auth::user()->can('size-master-delete'))
        {

        return view('admin.size_master.index',$title,compact('features'));
        }
        return redirect()->back();

    }
    
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Size Master');
 
        if(Auth::user()->can('size-master-add'))
        {

    return view("admin.size_master.create",$title);
        }
        return redirect()->back();
  }
      
  public function store(Request $request){
	// dd($request);
    $request->validate([
            'name' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Name Is Required.',
            'image.required' => 'Image Is Required.',
           
        ]);
        
        $p_img=$request->image;
        
          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;
 
      $create =All_Size_Master::create(['name'=>$request->name,'image'=>$pimageName]);
		if($create){
			if(!empty($request->attr_value)){
				foreach($request->attr_value as $attr){
					if(isset($attr)&& $attr!=''){
				All_Size_Master_Value::create(['all_size_master_id'=>$create->id,'value_name'=>$attr,'status'=>1]);
					}
				}
				
			}
            /*if(!empty($request->attr_value2)){
                foreach($request->attr_value2 as $attr){
                All_Size_Master_Value::where('all_size_master_id',$create->id)->update(['value_name2'=>$attr,'status'=>1]);
                }
                
            }
            if(!empty($request->attr_value3)){
                foreach($request->attr_value3 as $attr){
                All_Size_Master_Value::where('all_size_master_id',$create->id)->update(['value_name3'=>$attr,'status'=>1]);
                }
                
            }
            if(!empty($request->attr_value4)){
                foreach($request->attr_value4 as $attr){
                All_Size_Master_Value::where('all_size_master_id',$create->id)->update(['value_name4'=>$attr,'status'=>1]);
                }
                
            }
            if(!empty($request->attr_value5)){
                foreach($request->attr_value5 as $attr){
                All_Size_Master_Value::where('all_size_master_id',$create->id)->update(['value_name5'=>$attr,'status'=>1]);
                }
                
            }
            if(!empty($request->attr_value6)){
                foreach($request->attr_value6 as $attr){
                All_Size_Master_Value::where('all_size_master_id',$create->id)->update(['value_name6'=>$attr,'status'=>1]);
                }
                
            }*/
		return redirect()->back()->with(["success"=>"Size Master Saved Successfully!"]);
	  }else{
		  return redirect()->back()->with(["error"=>"Something Wrong!"]);
	  }
  }

public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Size Master');

        $project = All_Size_Master::find($id);
        $values = All_Size_Master_Value::where('all_size_master_id',$id)->get();
        //print_r($project);die;

                if(Auth::user()->can('size-master-edit')||Auth::user()->can('size-master-view'))
        {
        return view('admin.size_master.edit',$title, compact('project','values'));

        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
	  'name' => 'required',

        ]);
        
        
        $p_img=$request->image;

       

        if(!empty($p_img)){

          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

          $user=All_Size_Master::find($id);

          $user->image= $pimageName;

          $user->save();

        }
        
        
        
	if($request->status==NULL) { $stat=0; } else { $stat=1; }


        $tax=All_Size_Master::find($id);
        
		$update=All_Size_Master::where('id',$id)->update([ 'name'=>$request->name]);
        if($update){
			
			if(!empty($request->attr_value)){
				All_Size_Master_Value::where('all_size_master_id',$id)->delete();
				foreach($request->attr_value as $attr){
					if(isset($attr)&& $attr!=''){
				All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name'=>$attr,'status'=>1]);
					}
				}
				
			}
			/*	if(!empty($request->attr_value1)){
					$already=All_Size_Master_Value::where('all_size_master_id',$id)->get();
					$arr=array();
					foreach($already as $ald){
							$arr[]=$ald->id;
					}
					$attr_ids=$request->attr_id;
					$arrd=array_diff($arr,$attr_ids);
					foreach($arrd as $a){
						All_Size_Master_Value::where('id',$a)->delete();
					}
				foreach($request->attr_value1 as $k=>$attr){
					if($attr !=''){
						if($attr_ids[$k]==''){
							All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name'=>$attr,'status'=>1]);
						}else{
							All_Size_Master_Value::where('id',$attr_ids[$k])->update(['value_name'=>$attr,'status'=>1]);
						}
					}
				}
				
			}
            if(!empty($request->attr_value2)){
                    $already=All_Size_Master_Value::where('all_size_master_id',$id)->get();
                    $arr=array();
                    foreach($already as $ald){
                            $arr[]=$ald->id;
                    }
                    $attr_ids=$request->attr_id;
                    $arrd=array_diff($arr,$attr_ids);
                    foreach($arrd as $a){
                        All_Size_Master_Value::where('id',$a)->delete();
                    }
                foreach($request->attr_value2 as $k=>$attr){
                    if($attr !=''){
                        if($attr_ids[$k]==''){
                            All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name2'=>$attr,'status'=>1]);
                        }else{
                            All_Size_Master_Value::where('id',$attr_ids[$k])->update(['value_name2'=>$attr,'status'=>1]);
                        }
                    }
                }
                
            }
            if(!empty($request->attr_value3)){
                    $already=All_Size_Master_Value::where('all_size_master_id',$id)->get();
                    $arr=array();
                    foreach($already as $ald){
                            $arr[]=$ald->id;
                    }
                    $attr_ids=$request->attr_id;
                    $arrd=array_diff($arr,$attr_ids);
                    foreach($arrd as $a){
                        All_Size_Master_Value::where('id',$a)->delete();
                    }
                foreach($request->attr_value3 as $k=>$attr){
                    if($attr !=''){
                        if($attr_ids[$k]==''){
                            All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name3'=>$attr,'status'=>1]);
                        }else{
                            All_Size_Master_Value::where('id',$attr_ids[$k])->update(['value_name3'=>$attr,'status'=>1]);
                        }
                    }
                }
                
            }
            if(!empty($request->attr_value4)){
                    $already=All_Size_Master_Value::where('all_size_master_id',$id)->get();
                    $arr=array();
                    foreach($already as $ald){
                            $arr[]=$ald->id;
                    }
                    $attr_ids=$request->attr_id;
                    $arrd=array_diff($arr,$attr_ids);
                    foreach($arrd as $a){
                        All_Size_Master_Value::where('id',$a)->delete();
                    }
                foreach($request->attr_value4 as $k=>$attr){
                    if($attr !=''){
                        if($attr_ids[$k]==''){
                            All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name4'=>$attr,'status'=>1]);
                        }else{
                            All_Size_Master_Value::where('id',$attr_ids[$k])->update(['value_name4'=>$attr,'status'=>1]);
                        }
                    }
                }
                
            }
            if(!empty($request->attr_value5)){
                    $already=All_Size_Master_Value::where('all_size_master_id',$id)->get();
                    $arr=array();
                    foreach($already as $ald){
                            $arr[]=$ald->id;
                    }
                    $attr_ids=$request->attr_id;
                    $arrd=array_diff($arr,$attr_ids);
                    foreach($arrd as $a){
                        All_Size_Master_Value::where('id',$a)->delete();
                    }
                foreach($request->attr_value5 as $k=>$attr){
                    if($attr !=''){
                        if($attr_ids[$k]==''){
                            All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name5'=>$attr,'status'=>1]);
                        }else{
                            All_Size_Master_Value::where('id',$attr_ids[$k])->update(['value_name5'=>$attr,'status'=>1]);
                        }
                    }
                }
                
            }
            if(!empty($request->attr_value6)){
                    $already=All_Size_Master_Value::where('all_size_master_id',$id)->get();
                    $arr=array();
                    foreach($already as $ald){
                            $arr[]=$ald->id;
                    }
                    $attr_ids=$request->attr_id;
                    $arrd=array_diff($arr,$attr_ids);
                    foreach($arrd as $a){
                        All_Size_Master_Value::where('id',$a)->delete();
                    }
                foreach($request->attr_value6 as $k=>$attr){
                    if($attr !=''){
                        if($attr_ids[$k]==''){
                            All_Size_Master_Value::create(['all_size_master_id'=>$id,'value_name6'=>$attr,'status'=>1]);
                        }else{
                            All_Size_Master_Value::where('id',$attr_ids[$k])->update(['value_name6'=>$attr,'status'=>1]);
                        }
                    }
                }
                
            }*/
        return redirect()->back()->with(['message' => 'Size Master Updated Successfully.']);
		}else{
			 return redirect()->back()->with(["error"=>"Something Wrong!"]);
		}
    }
	
	public function destroy(Request $request, $id){
		$delete=All_Size_Master::where('id',$id)->delete();
		if($delete){
		return redirect()->back()->with(['message' => 'Size Master Updated Successfully.']);
		}else{
			 return redirect()->back()->with(["error"=>"Something Wrong!"]);
		}
	} 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
