<?php

namespace App\Http\Controllers;

 
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\NewCategories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use App\Product;
use App\Models\UserForm;
 
use DB;
class UserController extends Controller
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
	 
	
	 public function myaccount()
    {
        $company_data=array();
		$user_files=array();
		$company_data=DB::table('company_details')->where('user_id',Auth::user()->id)->get();
         $title 			  = 	array('pageTitle' => 'User Account');
        return   view('users.dashboard',$title)->with(['company_data'=>$company_data,'user_files'=>$this->userform]);
    }
    public function bankDetails()
    {
        $company_data=array();
		$user_files=array();
		$bank_data=DB::table('bank_details')->where('user_id',Auth::user()->id)->get();
         $title 			  = 	array('pageTitle' => 'Bank Details');
        return   view('users.bankDetails',$title)->with(['bank_data'=>$bank_data,'user_files'=>$this->userform]);
    }
	 public function brandDetails()
    {
        $company_data=array();
		$user_files=array();
		$brand_details=DB::table('brand_details')->where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
         $title 			  = 	array('pageTitle' => 'Brand Details');
        return   view('users.brandDetails',$title)->with(['brand_data'=>$brand_details,'user_files'=>$this->userform]);
    }
	 public function founder()
    {
        $company_data=array();
		$user_files=array();
		$founder_data=DB::table('founder')->where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
         $title 			  = 	array('pageTitle' => 'Founder Details');
        return   view('users.founder',$title)->with(['founder_data'=>$founder_data,'user_files'=>$this->userform]);
    }
    
    public function documentation()
    {
        $company_data=array();
		$user_files=array();
		$status=0;
		$company_data=DB::table('company_details')->where('user_id',Auth::user()->id)->get();
		$fileupload_status=DB::table('user_file_upload')->where('user_id',Auth::user()->id)->get();
		 if(count($fileupload_status)>0)
		 $status=$fileupload_status[0]->upload_status;
		 else
		 $staus=0;
         $title 			  = 	array('pageTitle' => 'User Account');
        return   view('users.documentation',$title)->with(['company_data'=>$company_data,'user_files'=>$this->userform,'fileupload_status'=>$status]);
    }
    
    public function companyDetails()
    {
        $company_data=array();
		$user_files=array();
		$company_data=DB::table('company_details')->where('user_id',Auth::user()->id)->get();
         $title 			  = 	array('pageTitle' => 'Company Details');
        return   view('users.company',$title)->with(['company_data'=>$company_data,'user_files'=>$this->userform]);
    }
	 
	
	 
}
