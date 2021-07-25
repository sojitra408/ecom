<?php

namespace App\Http\Controllers\Admin;

use App\User;

 

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

 use DB;

use Session;

use Mail;

use Redirect;

use Lang;

 use Validator;

use Hash;

use Excel;

use Carbon\Carbon; 



class AdminController extends Controller



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

    

    

     

    

	public function home(){

	

	 $title 			  = 	array('pageTitle' => Lang::get("labels.title_dashboard"));

	 $total_product = DB::table('products')->count();
	 $total_completed_order = DB::table('orders')->where('order_status', '=' ,'3')->count();
	 $total_order = DB::table('orders')->count();
	 $total_user = DB::table('users')->count();
	 
	 
// 	 $count_order_month = DB::table('orders')->selectRaw('DATE(order_date) as date,COUNT(*) as total_order')->groupBy('date')->where('order_status','=',3)->whereMonth('order_date', '=',Carbon::now()->subMonth()->month)->get();
	 
	 $count_order_month = DB::table('orders')->selectRaw('DATE(order_date) as date,COUNT(*) as total_order')->groupBy('date')->whereMonth('order_date', '=',Carbon::now()->subMonth()->month)->get();
	 
	 $count_cancle_order_month = DB::table('orders')->selectRaw('DATE(order_date) as date,COUNT(*) as total_order')->groupBy('date')->where('order_status','=',2)->whereMonth('order_date', '=',Carbon::now()->subMonth()->month)->get();
	 
// 	dd($count_order_month);
	
	  return view('admin.dashboard',$title,compact('total_product','total_completed_order','total_order','total_user','count_order_month','count_cancle_order_month'));

	  // return view('admin.dashboard',$title);

		 



    }

	

	public function not_found(){

	

	 $title 			  = 	array('pageTitle' => 'Permission Denied');

	

	  return view('admin.not_found',$title);

		 



    }

	

	public function logout(){

	



	 Auth::logout('admin');

	 session()->regenerate();

	return redirect('login/admin');

	}

	

	 

	

	 public function falseregistration(){

	

	$result=DB::table('register')->orderBy('id','desc')->get();



	 $title = 	array('pageTitle' => 'False Registration');

	

	  return view('admin.falseregistration',$title)->with('result',$result);

	}

	

 

	 

	 public function registration(){

	

	$result=DB::table('users')->orderBy('id','desc')->get();



	 $title = 	array('pageTitle' => 'Registration');

	

	  return view('admin.registration',$title)->with('result',$result);

	}

	

	 public function brand(){

	

 



	 $title = 	array('pageTitle' => 'Brand List');

	

	  return view('admin.brand.index',$title);

	}

	 

	 	 public function leads(){

	 	     

	 	      $curl = curl_init();

    

    curl_setopt_array($curl, array(

      CURLOPT_URL => "https://www.facebook.com/ads/lead_gen/export_csv/?id=291045008396574&type=form&from_date=1482698431&to_date=1482784831",

      CURLOPT_RETURNTRANSFER => true,

      CURLOPT_ENCODING => "",

      CURLOPT_MAXREDIRS => 10,

      CURLOPT_TIMEOUT => 0,

      CURLOPT_FOLLOWLOCATION => true,

      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

      CURLOPT_CUSTOMREQUEST => "GET",

      

      

    ));

	 $response = curl_exec($curl);

    

    curl_close($curl);

	echo  $response;

     $arr=json_decode($response, true); 

	$result=DB::table('brand as b')

	->select('b.*','u.name')->join('users as u','b.user_id','u.id')->orderBy('b.id','desc')->get();



	 $title = 	array('pageTitle' => 'Leads List');

	

	  return view('admin.leads',$title)->with('result',$result);

	}

	 

	  public function createPassword(Request $request){

	  

	  $password=$this->passwordGen(6);

	

	 

	 

	 DB::table('users')->where('id',$request->id)->update([

	 'password'=>Hash::make($password),

	 'password_val'=>$password

	 ]);

	 return redirect('admin/registration')->with('message','Password Generate successfully!');

	}

	

	

	 

	 

	public function passwordGen($length) {



    $vowels = 'AEIOU';



    $consonants = '0123456789BCDFGHJKLMNPQRSTVWXZ';



    $idnumber = '';



    $alt = time() % 2;



    for ($i = 0;$i < $length;$i++) {



        if ($alt == 1) {



            $idnumber.= $consonants[(rand() % strlen($consonants)) ];



            $alt = 0;



        } else {



            $idnumber.= $vowels[(rand() % strlen($vowels)) ];



            $alt = 1;



        }



    }



    



    return $idnumber;



}

	 

	

	



}