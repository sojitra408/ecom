<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = array('pageTitle' => 'Forgot');

        //$homes = Auth::user();
   
        return view("admin.forgotpassword",$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = array('pageTitle' => 'Create');

        //$homes = Auth::user();
   
        $users=DB::table('admins')->find(Auth::id());

        return view("admin.profile",$title,compact('users'));
        // return view("admin.changePassword",$title);
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            
            'email' => 'required',
    
        ]);


        $data = DB::table('admins')->select('id','email','password')->where('email',$request->email)->first();
        
        
        
        // $encrypted = Crypt::encrypt($data->password);
        // dd($encrypted->password);
        

        if (!empty($data)) {


            $random_number = mt_rand(100000, 999999);

            $home=Admin::find($data->id);


            $home->password   = bcrypt($random_number);
            $home->save();

            $this->usermail=$data->email;
            $password=$random_number;

 
            Mail::send('mail.passwordreset', array('password' =>$password), function($message) {
                $message->to('sojitra408@gmail.com' , 'TOT Admin')->subject
                    ('TOT Admin Password Recovery');
                // $message->to($this->usermail , 'TOT')->subject
                //     ('TOT world Password Recovery');
                $message->from('no-reply@thisorthat.in','TOT');
            });

            
            // The passwords not matches
            // return redirect()->back()->withErrors(["message" => "Your current password does not matches."]);
            return redirect()->back()->with([
                'status' => 'success',
                'msg' => 'email send successfully']);
                
            //return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }
        else{
            return redirect()->back()->with([
                'status' => 'danger',
                'msg' => 'Your email is not register']);
        }


    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',
           'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        if(isset($request->password) && $request->password!=''){
                $this->validate($request,[
                
                'password' => 'required|confirmed',
                 
            ]);
                
                $password=bcrypt($request->password);
                $data['password']=$password;
                // $data['password_val']=$request->password;
             }
            
            $data['name']=$request->first_name;
            // $data['role_id']=$request->role;
            // $data['last_name']=$request->last_name;
            // $data['name']=$request->first_name . ' '.$request->last_name;
            // $data['email']=$request->email;
            // $data['active']=$active;               
            // $data['mobile']=$request->phone;            
            // $data['city']=$request->city;
            // $data['state']=$request->state ;
            // $data['gender']=$request->gender;
            // $data['dob']=date('Y-m-d',strtotime($request->dob));
            
            
            $update=admin::where('id',$id)->update($data);
            return json_encode(array('success'=>true,'message'=>'Profile Updated Successfully'),200);
            return redirect()->back()->with('message','Profile Updated Successfully');
        // $data = DB::table('admins')->select('id','email','password')->where('email',$request->email)->first();
        // $this->validator($request->all())->validate();

        // if (!empty($data)) 
        // {

        //     $admin=Admin::find($data->id);
        
        //     $admin->password=Hash::make($request->password);

        //     $admin->save();

        //     return redirect()->back()->with([
        //             'status' => 'success',
        //             'msg' => 'password create successfully']);
        // }
        // else
        // {
        //     return redirect()->back()->with([
        //         'status' => 'danger',
        //         'msg' => 'Your email is not register']);
        // }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyOtp(Request $request)
    {
        
        $user = DB::table('admins')->select('id','email','password')->where('id',$request->id)->first();
        $pass = Hash::check($request->otp, $user->password);
        // dd($pass);
        if($user == true)
        {
            
                
                $password=bcrypt($request->password);
                $data['password']=$password;
            
                $data['name']=$request->first_name;
           
            
            
            $update=admin::where('id',$request->id)->update($data);
            return json_encode(array('success'=>true,'message'=>'Profile Updated Successfully'),200);
            return redirect()->back()->with('message','Profile Updated Successfully');
       
            
            
            
        }
       // return redirect()->back()->with('message','Otp does not match'); 
        return json_encode(array('success'=>false,'message'=>'Otp does not match'),401);
        
        
    }
    
    public function sendOtp(Request $request)
    {
        $data = DB::table('admins')->select('id','email','password')->where('id',Auth::id())->first();

        $random_number = mt_rand(100000, 999999);

            $home=Admin::find($data->id);

            $home->password   = bcrypt($random_number);
            $home->save();

            $this->usermail=$home->email;
            $password=$random_number;
        
        Mail::send('mail.passwordreset', array('password' =>$password), function($message) {
                // $message->to($this->usermail , 'TOT')->subject
                //     ('TOT world Password Recovery');
            $message->to('sojitra408@gmail.com' , 'TOT Admin')->subject
                    ('TOT Admin Password Recovery');
                $message->from('no-reply@thisorthat.in','TOT');
            });

        
    
      
      return json_encode(array('success'=>true,'otp'=>$password),200);
      
    }
}
