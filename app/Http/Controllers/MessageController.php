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
class MessageController extends Controller
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
	 
	
	public function createTicket()

	{
  $message=array();
		 
		 
			 
         $title 			  = 	array('pageTitle' => 'Create Ticket ');
        return   view('users.create-ticket',$title);
       
	 

	}
	
	public function tikcet()

	{
  $message=array();
		 
		$ticket=DB::table('ticket')->where('user_id',Auth::user()->id)->get();
			 
         $title 			  = 	array('pageTitle' => 'Message Board');
        return   view('users.messaging',$title)->with(['ticket'=>$ticket]);
       
	 

	}
	
	public function postcreateTicket(Request $request)

	{
	if($request->hasFile('file'))
	{
	    $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName().'.'.$image->extension();
        $image->move(public_path('message/'),$imageName);
		
		}
	 $id=DB::table('ticket')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				 'department'=>$request->department,
    				'subject'=>$request->subject,
					'ticketID'=>$this->generateNumericOTP(6),
					'question'=>$request->question,
					'filename'=>$imageName
    			 	 
                   
    				
    		  ]);
  return redirect(route('page.messaging'))->with('success', 'Ticket Created Successfully');  
       
	 

	}
	
	
	//
	public function closedMessage(Request $request)

	{
	 $id=DB::table('ticket')->where('id',$request->id)->update([
                	 
					'status'=>1,
				 
    		  ]);
  return redirect()->back()->with('success', 'Message Posted Successfully');  
       
	 

	}
	
	public function showMessage(Request $request)

	{
  $message=array();
		 
		   $message=DB::table('message_board')->where('user_id',Auth::user()->id)->where('ticket_id',$request->id)->get();
		    $ticket=DB::table('ticket')->where('id',$request->id)->first();
		   $ticket_id=$request->id;
			 
         $title 			  = 	array('pageTitle' => 'Message Board');
        return   view('users.messaging-show',$title)->with(['message'=>$message,'ticket_id'=>$ticket_id,'ticket'=>$ticket]);
       
	 

	}
	
	public function replyMessage(Request $request)

	{
  $message=array();
		 
		   $message=DB::table('message_board')->where('user_id',Auth::user()->id)->where('ticket_id',$request->id)->get();
		   $ticket_id=$request->id;
			 
         $title 			  = 	array('pageTitle' => 'Message Board');
        return   view('users.messaging-reply',$title)->with(['message'=>$message,'ticket_id'=>$ticket_id]);
       
	 

	}
	
	public function messaging(Request $request)

	{
  $message=array();
		 
		$message=DB::table('message_board')->where('user_id',Auth::user()->id)->where('ticket_id',$request->id)->get();
			$message=DB::table('message_board')->where('user_id',Auth::user()->id)->where('ticket_id',$request->id)->get();
         $title 			  = 	array('pageTitle' => 'Message Board');
        return   view('users.messaging',$title)->with(['message'=>$message]);
       
	 

	}
	public function postMessage(Request $request)

	{
	 $id=DB::table('message_board')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				 'message_text'=>$request->message_text,
    				'sentBy'=>'User',
					'ticket_id'=>$request->ticket_id
    			 	 
                   
    				
    		  ]);
  return redirect()->back()->with('success', 'Message Posted Successfully');  
       
	 

	}
	
	public function generateNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 
	
	
	 
}
