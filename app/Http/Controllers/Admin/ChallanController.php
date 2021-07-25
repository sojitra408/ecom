<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\Company;
use App\Models\admin\Challan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Challan $challan)
	 {
	 $this->challan=$challan;
	 
	 }
    public function display()
    {
         $challan = $this->challan->getAllChallan();
		$title 			  = 	array('pageTitle' => 'Challan List');
        return view('admin.challan.index',$title)->with('challan',$challan);
    }
	
	 public function edit(Request $request)
    { 
	
	DB::table('challan')->where('id', '=', $request->id)->update(['is_seen' => 1 ]);
		
          $result = $this->challan->getAllChallanById($request->id);
		$title 			  = 	array('pageTitle' => 'Challan Edit');
        return view('admin.challan.edit',$title)->with('result',$result);
    }
	
	 public function view(Request $request)
    { 
	
	DB::table('challan')->where('id', '=', $request->id)->update(['is_seen' => 1 ]);
		
         $result = $this->challan->getAllChallanById($request->id);
		$title 			  = 	array('pageTitle' => 'Challan View');
        return view('admin.challan.edit',$title)->with('result',$result);
    }
	
	
	
	 public function removeItemChallan(Request $request)
    { 
	
	 
	DB::table('challan_details')->where('id', '=', $request->id)->delete();
		
         return 1;
    }
	
	 
	
	 

     
}
