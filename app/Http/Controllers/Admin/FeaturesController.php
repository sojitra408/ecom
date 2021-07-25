<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Features;
use App\FeatureValue;
use Auth;

class FeaturesController extends Controller
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
        
        $title            =     array('pageTitle' => 'All Features');

        $features = Features::orderBy('id', 'DESC')->get();

        if(Auth::user()->can('features-master'))
        {
        return view('admin.features.index',$title,compact('features'));

        }
        return redirect()->back();

    }
    
    public function create(Request $request){
 
    $title = array('pageTitle' => 'Add Features');
 
   if(Auth::user()->can('features-master'))
        {

    return view("admin.features.create",$title);
        }
        return redirect()->back();
  }
      
  public function store(Request $request){
	
    $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name Is Required.',
           
        ]);
 
      $create =Features::create(['name'=>$request->name]);
		if($create){
			if(!empty($request->attr_value)){
				foreach($request->attr_value as $attr){
				FeatureValue::create(['feature_id'=>$create->id,'value_name'=>$attr,'status'=>1]);
				}
				
			}
		return redirect()->back()->with(["success"=>"Features Saved Successfully!"]);
	  }else{
		  return redirect()->back()->with(["error"=>"Something Wrong!"]);
	  }
  }

public function edit($id)
    {
        //$page_name='project';

         $title = array('pageTitle' => 'Edit Feature');

        $project = Features::find($id);
        $values = FeatureValue::where('feature_id',$id)->get();
        //print_r($project);die;

        if(Auth::user()->can('features-master'))
        {

        return view('admin.features.edit',$title, compact('project','values'));
        }
        return redirect()->back();
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
	  'name' => 'required',

        ]);
	if($request->status==NULL) { $stat=0; } else { $stat=1; }


        $tax=Features::find($id);
        
		$update=Features::where('id',$id)->update([ 'name'=>$request->name]);
        if($update){
				if(!empty($request->attr_value)){
					$already=FeatureValue::where('feature_id',$id)->get();
					$arr=array();
					foreach($already as $ald){
							$arr[]=$ald->id;
					}
					$attr_ids=$request->attr_id;
					$arrd=array_diff($arr,$attr_ids);
					foreach($arrd as $a){
						FeatureValue::where('id',$a)->delete();
					}
				foreach($request->attr_value as $k=>$attr){
					if($attr !=''){
						if($attr_ids[$k]==''){
							FeatureValue::create(['feature_id'=>$id,'value_name'=>$attr,'status'=>1]);
						}else{
							FeatureValue::where('id',$attr_ids[$k])->update(['value_name'=>$attr,'status'=>1]);
						}
					}
				}
				
			}
        return redirect()->back()->with(['message' => 'Feature Updated Successfully.']);
		}else{
			 return redirect()->back()->with(["error"=>"Something Wrong!"]);
		}
    }
	
	public function destroy(Request $request, $id){
		$delete=Features::where('id',$id)->delete();
		if($delete){
		return redirect()->back()->with(['message' => 'Feature Updated Successfully.']);
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
