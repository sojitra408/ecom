<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Validator;
use App\SMSApi;
use Mail;
use Hash;
use Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Reader\IReader;
	use PhpOffice\PhpSpreadsheet\Writer\IWriter;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use Symfony\Component\HttpFoundation\StreamedResponse;
	use PhpOffice\PhpSpreadsheet\Writer as Writer;

class FrontController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	  
	 protected $email=null;
	 public function __construct()
	 {
	 
	 
	  
	 }
	 public function generateExcel()
	{
	$result=DB::table('register')->orderBy('id','desc')->get()->toArray();
	 
	
	 
	
	$c=5;
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	
    $spreadsheet->getActiveSheet()->mergeCells('D1:E1');	
	  $sheet->setCellValue('D1', 'Vendor Registration');
	    
	  
	    	
		
		
	  $spreadsheet->getActiveSheet()->getStyle('D1')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
	 $spreadsheet->getActiveSheet()->getStyle('D2')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
	
	 
	  
 	
	$sheet->getColumnDimension('A')->setAutoSize(false);
    $sheet->getColumnDimension('A')->setWidth(15);
	  $sheet->setCellValue('A'.$c, 'Date');
	  
	 $sheet->setCellValue('B'.$c, "Name");
	$sheet->getColumnDimension('B')->setAutoSize(false);
    $sheet->getColumnDimension('B')->setWidth(25); 
	  
	$sheet->setCellValue('C'.$c, "Email");
	$sheet->getColumnDimension('C')->setAutoSize(false);
    $sheet->getColumnDimension('C')->setWidth(25);
	 
	
	$sheet->setCellValue('D'.$c, "Phone");
	$sheet->getColumnDimension('D')->setAutoSize(false);
    $sheet->getColumnDimension('D')->setWidth(25);
	
	$sheet->setCellValue('E'.$c, "Brand");
	$sheet->getColumnDimension('E')->setAutoSize(false);
    $sheet->getColumnDimension('E')->setWidth(25);
	
	$sheet->setCellValue('F'.$c, 'Company');
	$sheet->getColumnDimension('F')->setAutoSize(false);
    $sheet->getColumnDimension('F')->setWidth(25);
	 
 
	
	
	
	 
	
	$index=$c+1;
	
	 
			 
			 foreach( $result as $key => $entry)
			 {
			 
			  $sheet->setCellValue('A'.$index, $entry->created_at);
			  $spreadsheet->getActiveSheet()->getStyle('A'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			  
			  $sheet->setCellValue('B'.$index,$entry->name);
			$spreadsheet->getActiveSheet()->getStyle('B'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			  
			 $sheet->setCellValue('c'.$index,$entry->email);
			$spreadsheet->getActiveSheet()->getStyle('c'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('D'.$index, $entry->mobile);
			$spreadsheet->getActiveSheet()->getStyle('D'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('E'.$index, $entry->brand);
			$spreadsheet->getActiveSheet()->getStyle('E'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('F'.$index, $entry->company);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
		 
			 
			   
		 
			 
			 $index++;
			 }
	

$writer = new Writer\Xls($spreadsheet);

        $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="registreation.xls"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response;




    
	
	 
	
	}
   public function index(Request $request)
  {
        
			  
 

 
		
	return view('index');	 
         
		  
    }
	
	 public function thanks(Request $request)
  {
        
			  
 

 
		
	return view('thanks');	 
         
		  
    }
	
	
   
	  public function registerpage()
 	 {
 	 return view('registerpage');
 	 }
	
	 public function formNext(Request $request)
 	{
	
	session(['entity'=>$request->entity]);
	session(['turnover'=>$request->turnover]);
	session(['company'=>$request->company]);
    return 1;
 
    }
	
	 public function postRegisterSession(Request $request)
 	{
	
 
  	$this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:register|max:500',
             'mobile' => 'required|max:12|unique:register',
			  'website' => 'required'
        ]);
        
         
            session(['name'   =>   $request->name]);
			session(['email'=>$request->email]);
			 session(['mobile'   =>$request->mobile]);
			 session(['website'=>$request->website]);
			  session(['brand'=>$request->brand]);
             session(['insta'=>$request->instagram]);
			 session(['entity'=>$request->entity]);
			  session(['turnover' =>$request->turnover]);
			session(['company'=>$request->company]);
		  
		  
		 
        
        
		return redirect()->back()->with('success', 'Registred Successfully!');   
    }
	
	 
	
	public function sendEmailOTP(Request $request)
 	{ 
	   $checkemail=DB::table('users')->where('email',$request->email)->get();
	  
	   $checkbrand=DB::table('brand_details')->where('brand_name',$request->brand)->get();
	   $chkemailotp=0;
	   
	   
	   if(count($checkemail) >0  &&  count($checkbrand) >0)
	   {
	     $response=array('status'=>3);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		if(count($checkemail) >0)
	   {
	     $response=array('status'=>2);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		 
		if(count($checkbrand) >0)
	    {
	     $response=array('status'=>4);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		
		//send mail otp
	 $this->email=$request->email;
	  $otp=$this->generateNumericOTP(4);
	  session(['email'=>$request->email]);
	   session(['brand'=>$request->brand]);
	  session(['name'=>$request->name]);
	  session(['emailotp'=>$otp]);
	  $message='Welcome';
 				$data=[
 				'OTP' =>$otp ,
 				 ];
	  
	   Mail::send('mail.otp', $data, function($message) {

         $message->to( $this->email, 'Thisthat')
 		->subject('Its Your Secret Password!');

         $message->from('postmaster@mg.thisorthat.in','Support This Or That');

      });
	  $chkemailotp=1;
	   $checkotp=DB::table('tbl_otp')->where('session_id',session()->getId())->where('type','Email')->get();
	    if(count ($checkotp)==0)
	   {
	    DB::table('tbl_otp')->insertGetId([
            'session_id'   => session()->getId(),
			'otp'=>$otp,
			 'type'   =>'Email'
		  ]);
		  }else{
		   DB::table('tbl_otp')->where('session_id', session()->getId())->where('type','Email')->update([
            
			'otp'=>$otp
			 
		  ]);
		  } 
		  
		  // send mobile 
	 
		  
		  if($chkemailotp==1)
		  {
		  $checkDtata= DB::table('register')
		   ->where('session_id', session()->getId())
		    ->where('email',$request->email)
		   ->whereDate('created_at', '<=', date('Y-m-d'))->get();
		   if(count($checkDtata)==0)
		   {
		     DB::table('register')->insertGetId([
			  'entity'=>$request->entity,
			  'turnover' =>$request->turnover,
			 'company_old'=>$request->company,
            'name'   =>   $request->name,
			'email'=>$request->email,
			   'brand'=>$request->brand,
			  'session_id'=>session()->getId(),
			  'user_ip'=>$_SERVER['REMOTE_ADDR']
             
		  ]);
		  }else{
		   DB::table('register')
		    
			->where('email',$request->email)
		    ->where('session_id', session()->getId())
			->update([
			 'entity'=>$request->entity,
			  'turnover' =>$request->turnover,
			 'company_old'=>$request->company,
              'name'   =>   $request->name,
			  'company'=>$request->website,
			  'brand'=>$request->brand
			   
             
		  ]);
		  }
		  }
	   
	    $response=array('status'=>0);
		
		 return response()->json($response); 
		
	
	}
	
	public function postCheckEmail(Request $request)
 	{ 
	   $checkemail=DB::table('users')->where('email',$request->email)->get();
	   $checkmobile=DB::table('users')->where('mobile',$request->mobile)->get();
	   $checkbrand=DB::table('brand')->where('brand_name',$request->brand)->get();
	   $chkemailotp=0;
	   $chkmobileotp=0;
	   
	   if(count($checkemail) >0 && count($checkmobile) >0 &&  count($checkbrand) >0)
	   {
	     $response=array('status'=>3);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		if(count($checkemail) >0)
	   {
	     $response=array('status'=>2);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		if(count($checkmobile) >0)
	   {
	     $response=array('status'=>1);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		if(count($checkbrand) >0)
	    {
	     $response=array('status'=>4);
		 return response()->json($response); 
		 
		 exit(0);
		 
	    }
		
		//send mail otp
	 $this->email=$request->email;
	  $otp=$this->generateNumericOTP(4);
	  session(['email'=>$request->email]);
	  session(['emailotp'=>$otp]);
	  $message='Welcome';
 				$data=[
 				'OTP' =>$otp ,
 				 ];
	  
	   Mail::send('mail.otp', $data, function($message) {

         $message->to( $this->email, 'Thisthat')
 		->subject('Its Your Secret Password!');

         $message->from('postmaster@mg.thisorthat.in','Support This Or That');

      });
	  $chkemailotp=1;
	   $checkotp=DB::table('tbl_otp')->where('session_id',session()->getId())->where('type','Email')->get();
	    if(count ($checkotp)==0)
	   {
	    DB::table('tbl_otp')->insertGetId([
            'session_id'   => session()->getId(),
			'otp'=>$otp,
			 'type'   =>'Email'
		  ]);
		  }else{
		   DB::table('tbl_otp')->where('session_id', session()->getId())->where('type','Email')->update([
            
			'otp'=>$otp
			 
		  ]);
		  } 
		  
		  // send mobile 
		  
	  $checkmobile=DB::table('tbl_otp')->where('session_id',session()->getId())->where('type','Mobile')->get();
	  $api= new SMSApi();
	  $otpmobile=$this->generateNumericOTP(4);
	  $msg="Dear customer, your OTP for registration is $otpmobile . It expires in 10 mins. Please write to partner@thisorthat.in for queries.";
	   $api->sendSMS($request->mobile,$msg);
	   $chkmobileotp=1;
	   session(['mobile'=>$request->mobile]);
	   if(count ($checkmobile)==0)
	   {
	    DB::table('tbl_otp')->insertGetId([
            'session_id'   => session()->getId(),
			'otp'=>$otpmobile,
			 'type'   =>'Mobile'
		  ]);
		  }else{
		   DB::table('tbl_otp')->where('session_id', session()->getId())->where('type','Mobile')->update([
            
			'otp'=>$otp
			 
		  ]);
		  }
		  
		  if($chkmobileotp==1 && $chkemailotp==1)
		  {
		  $checkDtata= DB::table('register')
		   ->where('session_id', session()->getId())
		   ->where('mobile',$request->mobile)
		   ->where('email',$request->email)
		   ->whereDate('created_at', '<=', date('Y-m-d'))->get();
		   if(count($checkDtata)==0)
		   {
		     DB::table('register')->insertGetId([
			  'entity'=>$request->entity,
			  'turnover' =>$request->turnover,
			 'company_old'=>$request->company,
            'name'   =>   $request->name,
			'email'=>$request->email,
			 'mobile'   =>$request->mobile,
			 'company'=>$request->website,
			  'brand'=>$request->brand,
			  'session_id'=>session()->getId(),
			  'user_ip'=>$_SERVER['REMOTE_ADDR']
             
		  ]);
		  }else{
		   DB::table('register')
		    ->where('mobile',$request->mobile)
			->where('email',$request->email)
		    ->where('session_id', session()->getId())
			->update([
			 'entity'=>$request->entity,
			  'turnover' =>$request->turnover,
			 'company_old'=>$request->company,
              'name'   =>   $request->name,
			  'company'=>$request->website,
			  'brand'=>$request->brand
			   
             
		  ]);
		  }
		  }
	   
	    $response=array('status'=>0);
		
		 return response()->json($response); 
		
	
	}
	
	public function otpVerify(Request $request)
 	{
	$chkEmail=0;
	$chkMobile=0;
	 $checkMobile= DB::table('tbl_otp')->where('type','Mobile')->where('session_id',session()->getId())->get();
	 if(count($checkMobile)>0)	
	 { 
	  if($checkMobile[0]->otp==$request->otpmobile)
	  {
	   session(['mobileVerified'=>1]);
	   $response=array('status'=>1);
	   $chkMobile=1;
	  }
	  } 
	  
	 $check= DB::table('tbl_otp')->where('type','Email')->where('session_id',session()->getId())->get();
	 if(count($check)>0)	
	 { 
	  if($check[0]->otp==$request->otpemail)
	  {
	   session(['emailVerified'=>1]);
	   $response=array('status'=>1);
	   $chkEmail=1;
	  }
	  }
	  
	 if($chkEmail==1 && $chkMobile ==1)
	 {
	 	session(['name'=>$request->name]);
		session(['company'=>$request->company]);
		session(['brand'=>$request->brand]);
		return response()->json($response); 
		
	}else{
	 $response=array('status'=>0);
	return response()->json($response); 
	}
    
        
		    
    }
	
	public function resetsession(Request $request)
 	{
	 session(['name'=>'']);
		session(['company'=>'']);
		session(['emailotp'=>'']);
		session(['mobileotp'=>'']);
		 session(['email'=>'']);
		session(['mobile'=>'']);
		session(['brand'=>'']); 
		session(['emailVerified'=>'']); 
			session(['mobileVerified'=>'']); 
		$request->session()->regenerate(); 
		return redirect('register.html'); 
	}
	
	public function otpVerifyMobile(Request $request)
 	{
	 
	  $check= DB::table('tbl_otp')->where('type','Mobile')->where('session_id',session()->getId())->get();
	 if(count($check)>0)	
	 { 
	  if($check[0]->otp==$request->otp)
	  {
	   session(['mobileVerified'=>1]);
	  session(['mobileotp'=>'']); 
	   if(session('mobileVerified')==1 && session('emailVerified')==1)
		{
	   $response=array('status'=>1,'otp'=>$request->otp,'verify'=>1);
	   }else{
	   	   $response=array('status'=>1,'otp'=>$request->otp,'verify'=>0);
	   }
	  }
	  }else{
	   session(['mobileVerified'=>0]);
	   $response=array('status'=>0,
	   					'otp'=>session('mobileotp'),
						'verify'=>0
	  );
	  }
	  
	 
		  
		  
		return response()->json($response); 
        
        
		    
    }
	
	public function otpVerifyEmail(Request $request)
 	{
	  $response=array();
	  $check= DB::table('tbl_otp')->where('type','Email')->where('session_id',session()->getId())->get();
	 if(count($check)>0)	
	 { 
	  if($check[0]->otp==$request->otp)
	  {
	   session(['emailVerified'=>1]);
	   session(['emailotp'=>'']);
	    if(session('mobileVerified')==1 && session('emailVerified')==1)
		{
	   $response=array('status'=>1,'otp'=>$request->otp,'verify'=>1);
	   }else{
	   	   $response=array('status'=>1,'otp'=>$request->otp,'verify'=>0);
	   }
	  }
	  }else{
	   session(['emailVerified'=>0]);
	  
	   $response=array('status'=>0,
	   					'otp'=>session('mobileotp'),
						'verify'=>0
	  );
	  }
	  
	 
		  
		  
		return response()->json($response); 
        
        
		    
    }
	
	
	public function sendMobileOTP(Request $request)
 	{
	
	
	  $check=DB::table('users')->where('mobile',$request->mobile)->get();
	  $checkbrand=DB::table('brand_details')->where('brand_name',$request->brand)->get();
	 if(count($check)>0)
	 { 
	 $response=array('status'=>1);
	
	 }else{
	 
	  if(count($checkbrand)==0)
	{
	
	   $check=DB::table('tbl_otp')->where('session_id',session()->getId())->where('type','Mobile')->get();
	  $api= new SMSApi();
	  $otp=$this->generateNumericOTP(4);
	  $msg="Dear customer, your OTP for registration is $otp . It expires in 10 mins. Please write to partner@thisorthat.in for queries.";
	   $api->sendSMS($request->mobile,$msg);
	   session(['mobile'=>$request->mobile]);
	    session(['mobileotp'=>$otp]);
	     session(['brand'=>$request->brand]);
	    session(['name'=>$request->name]);
	   if(count ($check)==0)
	   {
	    DB::table('tbl_otp')->insertGetId([
            'session_id'   => session()->getId(),
			'otp'=>$otp,
			 'type'   =>'Mobile'
		  ]);
		  }else{
		   DB::table('tbl_otp')->where('session_id', session()->getId())->where('type','Mobile')->update([
            
			'otp'=>$otp
			 
		  ]);
		  }
	   
	    $response=array('status'=>0);
		 
		 
	}else{
	$response=array('status'=>2);
	}
	  
	}	  
		  
		return response()->json($response); 
        
        
		    
    }
	
	public function postCheckMobile(Request $request)
 	{
	
	
	  $check=DB::table('users')->where('mobile',$request->mobile)->get();
	  $checkbrand=DB::table('brand')->where('brand_name',$request->brand)->get();
	 if(count($check)>0)
	 { 
	 $response=array('status'=>1);
	
	 }else{
	 
	  if(count($checkbrand)==0)
	{
	
	   $check=DB::table('tbl_otp')->where('session_id',session()->getId())->where('type','Mobile')->get();
	  $api= new SMSApi();
	  $otp=$this->generateNumericOTP(6);
	  $msg="Dear customer, your OTP for registration is $otp . It expires in 10 mins. Please write to partner@thisorthat.in for queries.";
	   $api->sendSMS($request->mobile,$msg);
	   session(['mobile'=>$request->mobile]);
	   if(count ($check)==0)
	   {
	    DB::table('tbl_otp')->insertGetId([
            'session_id'   => session()->getId(),
			'otp'=>$otp,
			 'type'   =>'Mobile'
		  ]);
		  }else{
		   DB::table('tbl_otp')->where('session_id', session()->getId())->where('type','Mobile')->update([
            
			'otp'=>$otp
			 
		  ]);
		  }
	   
	    $response=array('status'=>0);
		 
		 
	}else{
	$response=array('status'=>2);
	}
	  
	}	  
		  
		return response()->json($response); 
        
        
		    
    }
	
	
	
	 public function postRegister(Request $request)
 	{
	
	
 	$this->validate($request,[
            
             'email' => 'required|email|unique:users|max:500',
             'mobile' => 'required|max:10|unique:users',
			 'brand'=>'required|unique:brand_details',
			  
        ]);
   
        
         $id=  DB::table('users')->insertGetId([
            'name'   =>   $request->name,
			'email'=>$request->email,
			 'mobile'   =>$request->mobile,
			 'website'=>$request->website,
			  'brand'=>$request->brand,
             'insta'=>$request->instagram,
			 'entity'=>$request->entity,
			  'turnover' =>$request->turnover,
			 'company'=>$request->company,
			 'password'=>Hash::make($request->password),
			  'password_val'=>$request->password,
			   'user_ip'=>$_SERVER['REMOTE_ADDR']
			 //'otp'=>$request->mobileOTP
		  ]);
		  
		  if($id)
		  {
		 
		  DB::table('brand_details')->insertGetId([
            'brand_name'   =>   $request->brand,
			'user_id'=>$id
			 
		  ]);
		   session(['entity'=>'']);
	session(['turnover'=>'']);
	session(['company'=>'']);
	session(['mobileotp'=>'']);
	session(['emailotp'=>'']);
	session(['emailVerified'=>'']);
	$request->session()->regenerate(); 
	
		  }
		  
		 
        
        
		 return redirect('/thanks')->with('success', 'Registered Successfully!'); 
		  
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
	
public function getIp(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
}	 
	
	
 
}//class
