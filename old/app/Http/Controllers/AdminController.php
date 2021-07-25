<?php
namespace App\Http\Controllers;

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
       
	 //	$this->middleware('auth:web');
  

}
    
	public function home(){
	
	 $title 			  = 	array('pageTitle' => Lang::get("labels.title_dashboard"));
	
	  return view('admin.dashboard',$title);
		 

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
	
	$result=DB::table('brand as b')
	->select('b.*','u.name')->join('users as u','b.user_id','u.id')->orderBy('b.id','desc')->get();

	 $title = 	array('pageTitle' => 'Brand List');
	
	  return view('users.brand',$title)->with('result',$result);
	}
	 
	 	 public function model(){
	
	$result=DB::table('brand as b')
	->select('b.*','u.name')->join('users as u','b.user_id','u.id')->orderBy('b.id','desc')->get();

	 $title = 	array('pageTitle' => 'Model List');
	
	  return view('users.model',$title)->with('result',$result);
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