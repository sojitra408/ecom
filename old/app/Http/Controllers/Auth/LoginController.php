<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;
use DB;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/myaccount.html';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
        {
             $this->middleware('guest')->except('logout');
             $this->middleware('guest:web')->except('logout');
        }
	 
	
	
	public function showCustomerLoginForm()
    {   
       $title 			  = 	array('pageTitle' => 'User Login');
		//echo 'l';die;
        return view('users.login',$title);
    }
	
	 
	
	public function logout(Request $request)
{
    $this->guard('web')->logout();

    $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect('/login.html');
}
	
	 

    public function customerLogin(Request $request)
    {
	
	
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
		
		/*if($this->hasTooManyLoginAttempts($request))
		{
		$this->fireLockoutEvent($request);
		return $this->sendLockoutResponse($request);
		
		}*/
  
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

		 
           return redirect()->intended('/myaccount.html');
        }
        return back()->with('loginError', 'Invalid username or password');
    }
	
	public function mycart()
	{
	return $result=DB::table('cart')->where([
					['session_id', '=', Session::getId()],
					 ['is_order', '=', 0]
				])->get();
	}
	
	
}
