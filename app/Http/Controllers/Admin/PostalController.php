<?php
namespace App\Http\Controllers\Admin;
use App\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Postalcode;
use App\Http\Requests;
 use DB;
use Session;
use Mail;
use Redirect;
use Lang;
 use Validator;
use Hash;
use Excel;
 

class PostalController extends Controller

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
    
    
     
    
	public function index(){
	
	 $title 			  = 	array('pageTitle' => 'Postal Code');

     if(Auth::user()->can('postalcode-management')||Auth::user()->can('postalcode-management-add')||Auth::user()->can('postalcode-management-edit')||Auth::user()->can('postalcode-management-view')||Auth::user()->can('postalcode-management-delete'))
     {
	  return view('admin.postal.index',$title);

     }
	  return redirect()->back(); 
		 

    }
    
    	public function create(Request $request){
	
	 $title 			  = 	array('pageTitle' => 'Postal Code');

     if(Auth::user()->can('postalcode-management-add'))
     {

	  return view('admin.postal.create',$title);
     }
      return redirect()->back();
	
		 

    }
    	 
    	public function edit(Request $request){
	
	 $title 			  = 	array('pageTitle' => 'Postal Code');
	   $project = Postalcode::find($request->id);
        $values = Postalcode::where('id',$request->id)->get();
        //print_r($project);die;

        if(Auth::user()->can('postalcode-management-edit')||Auth::user()->can('postalcode-management-view'))
     {

        return view('admin.postal.edit',$title, compact('project','values'));
     }
      return redirect()->back();
	
	  
		 

    }
    
     public function store(Request $request){	 
	
	     
	 $request->validate([
	  'postalcode' => 'required',
      
    ]);
 
	if($request->status==NULL) { $stat=0; } else { $stat=1; }
     
	$postalcode=@explode(',',$request->postalcode);
	if(isset($postalcode) && count($postalcode)>0)
	{
	    
	    for($i=0;$i<count($postalcode);$i++)
	    {
	
  	$create =Postalcode::create([ 'postalcode'=>$postalcode[$i],'status' => $stat,'postcode_type' => $request->postcode_type]);
	    }
	
	}
		if($create){
		 
		return redirect()->back()->with(["success"=>"Postalcode Saved Successfully!"]);
	  }else{
		  return redirect()->back()->with(["error"=>"Something Wrong!"]);
	  }
 
}

public function delete(Request $request){	 
	
	     
 DB::table('postal_code')->where('id',$request->id)->delete();
		 
		return redirect()->back()->with(["success"=>"Postalcode Deleted Successfully!"]);
	  
 
}

public function update(Request $request){	 
	
		if($request->status==NULL) { $stat=0; } else { $stat=1; }     
 DB::table('postal_code')->where('id',$request->id)->update(array(
     "postalcode"=>$request->postalcode,
      "postcode_type"=>$request->postcode_type,
       "status"=>$stat
     
     ));
		 
		return redirect()->back()->with(["success"=>"Postalcode updated Successfully!"]);
	  
 
}
    	 
    
      function postalList(Request $request){
 
       $columns = array( 
            0 =>'id', 
            1 =>'postalcode',
            2 =>'status',
            3 =>'postcode_type',
            4 =>'action'

          
        );  
        $totalData = Postalcode::count();            
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $institutes = Postalcode::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 
 
            $institutes =  Postalcode::where('id','LIKE',"%{$search}%")
                            ->orWhere('postalcode', 'LIKE',"%{$search}%")
 
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
 
            $totalFiltered = Postalcode::where('id','LIKE',"%{$search}%")
                             ->orWhere('postalcode', 'LIKE',"%{$search}%")
                             ->orWhere('postcode_type', 'LIKE',"%{$search}%")
 
 
                             ->count();
        }
        $data = array();
        if(!empty($institutes))
        {
            foreach ($institutes as $key=>$institute)
            {
                
                $nestedData['id'] = $key+1;
                $nestedData['postalcode'] = $institute->postalcode;
			

                $nestedData['status'] = ($institute->status==1)?'Active':'Deactive';
                $nestedData['postcode_type'] =$institute->postcode_type ;
               // $nestedData['action'] = '<a href="'.route('postal.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a   href="'.route('postal.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2">Delete</a>';


               if(Auth::user()->can('postalcode-management-edit')|| Auth::user()->can('postalcode-management-view'))
                {
                    $nestedDataEdit = '<a href="'.route('postal.edit',$institute->id).'" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp;';
                }
                else
                {
                    $nestedDataEdit ='';
                }
                if(Auth::user()->can('postalcode-management-delete'))
                {
                    $nestedDataDelete = '<a   href="'.route('postal.delete',$institute->id).'" class="btn btn-danger btn-sm mr-2">Delete</a>';
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
	 
	 
	
	

}