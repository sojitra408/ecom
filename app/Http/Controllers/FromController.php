<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Validator;
use Mail;
use Auth;
use File;
use App\Models\UserForm;

class FromController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	  
	 protected $email=null;
	 public function __construct(UserForm $userform)
	 {
	  $this->middleware('auth:web');
	   $this->userform=$userform;
	 
	  
	 }
   public function SaveCompanyDetails(Request $request)
  {
     $this->userform->SaveCompanyDetails($request);
 	return redirect()->back()->with('success', 'Company Details uploaded Successfully');  
	 }
	
	 public function UpdateCompanyDetails(Request $request)
  {
    $this->userform->UpdateCompanyDetails($request);
 	return redirect()->back()->with('success', 'Company Details updated Successfully');  
 }
 
  public function SaveBankDetails(Request $request)
  {
  
   			 $directory =date('Y') . '/' . date('m');
			 $directorySave ='storage/app/public/images/'.$directory;
			 if(!is_dir($directorySave))
			 {
			 File::makeDirectory($directorySave, $mode = 0777, true, true);
			 }
			  $path ='public/images/'.$directory;
      
         if ($files = $request->file('cheque')) {
		   $image = $request->cheque->store($path); 
		  $this->userform->SaveBankDetails($request,$image);
			 }
			 
			  
             
            
    
 	return redirect()->back()->with('success', 'Bank Details uploaded Successfully');  
	 }
	
	 public function UpdateBankDetails(Request $request)
  {
    $this->userform->UpdateBankDetails($request);
 	return redirect()->back()->with('success', 'Bank Details updated Successfully');  
 }
 
 
 
  public function savefounder(Request $request)
  {
   /* $this->validate($request,[
            
            'founder_email' => 'required|string|email|max:255|unique:founder',
              'founder_mobile' => 'required|string|min:10|max:10|unique:founder'
            
        ]);*/
    $id=$this->userform->savefounder($request);
	if($id>0)
 	return redirect()->back()->with('success', 'Founder detail saved Successfully');  
	else
	 	return redirect()->back()->with('error_msg', 'Founder email exist!');  

	
 }
 
 public function updatefounder(Request $request)
  {
   /* $this->validate($request,[
            
            'founder_email' => 'required|string|email|max:255|unique:founder',
              'founder_mobile' => 'required|string|min:10|max:10|unique:founder'
            
        ]);*/
    $id=$this->userform->updatefounder($request);
 	if($id==1)
 	return redirect('founder.html')->with('success', 'Founder detail updated Successfully');  
	else
	 	return redirect('founder.html')->with('error_msg', 'Founder email exist!');   
 }
 
  public function saveBrand(Request $request)
  {
    $this->validate($request,[
            
            'brand_name' => 'required|string|max:255|unique:brand_details',
			 'category' => 'required',
             
            
        ]);
    $this->userform->saveBrand($request);
 	return redirect()->back()->with('success', 'Brand details saved Successfully!');  
 }
 
  public function updateBrand(Request $request)
  {
    $this->validate($request,[
            
           
			 'category' => 'required',
             
            
        ]);
    $this->userform->updateBrand($request);
 	return redirect('brand-details.html')->with('success', 'Brand details updated Successfully!');  
 }
 
 public function gstvalidate(Request $request)
  {
  $this->validate($request,[
            
            'gst_no' => 'required|string|min:15|max:15|unique:company_details'
            
            
        ]);
   $msg= $this->userform->gstvalidate($request);  

  	return redirect()->back()->with('success', $msg);  
	 }
	
	 
	
	
   
	  
	
public function action(Request $request)
    {
      
	   		 $directory =date('Y') . '/' . date('m');
			 $directorySave ='storage/app/public/images/'.$directory;
			 if(!is_dir($directorySave))
			 {
			 File::makeDirectory($directorySave, $mode = 0777, true, true);
			 }
			  $path ='public/images/'.$directory;
      
         if ($files = $request->file('fy_1_amount_doc')) {
		
		 
 
            $image = $request->fy_1_amount_doc->store($path);
			$this->checkFile($image,'fy_1_amount_doc',$request->financialyeardate1);
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
 
         if ($files = $request->file('fy_2_amount_doc')) {
		
		 
 
            $image = $request->fy_2_amount_doc->store($path);
			$this->checkFile($image,'fy_2_amount_doc',$request->financialyeardate2);
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		
		 if ($files = $request->file('fy_3_amount_doc')) {
		
		 
 
            $image = $request->fy_3_amount_doc->store($path);
			$this->checkFile($image,'fy_3_amount_doc',$request->financialyeardate3);
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		//////////////////////
		
		 if ($files = $request->file('pan_doc')) {
		
		 
 
            $image = $request->pan_doc->store($path);
			$this->checkFile($image,'pan_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		
		 if ($files = $request->file('tan_doc')) {
		
		 
 
            $image = $request->tan_doc->store($path);
			$this->checkFile($image,'tan_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		 if ($files = $request->file('gst_doc')) {
		
		 
 
            $image = $request->gst_doc->store($path);
			$this->checkFile($image,'gst_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		 if ($files = $request->file('moa_doc')) {
		
		 
 
            $image = $request->moa_doc->store($path);
			$this->checkFile($image,'moa_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		if ($files = $request->file('certificate_inco')) {
		
		 
 
            $image = $request->certificate_inco->store($path);
			$this->checkFile($image,'certificate_inco',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		
		 if ($files = $request->file('start_up_doc')) {
		
		 
 
            $image = $request->start_up_doc->store($path);
			$this->checkFile($image,'start_up_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		
		 if ($files = $request->file('msme_doc')) {
		
		 
 
            $image = $request->msme_doc->store($path);
			$this->checkFile($image,'msme_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		
		 if ($files = $request->file('moa_doc')) {
		
		 
 
            $image = $request->moa_doc->store($path);
			$this->checkFile($image,'moa_doc',$year='');
			 
			  
             
            return Response()->json([
                "success" => true,
                "image" => $image
            ]);
 
        }
		
		 
		
      
     
    }
	
	 

public function uploadStatus(Request $request)
{
$fileupload_status=DB::table('user_file_upload')->where('user_id',Auth::user()->id)->get();
 if(count($fileupload_status)==0)
 {
DB::table('user_file_upload')->insertGetId([
            'user_id'=>Auth::user()->id,
			'upload_status'=>1
			 
			 
		  ]);
		 }else{
 DB::table('user_file_upload')->where('user_id',Auth::user()->id)->update([
            
			'upload_status'=>0
			 
			 
		  ]);
		  }
		  return redirect()->back()->with('success', 'Updated Successfully!'); 
 
  

}	
	 
public function checkFile($image,$type,$year='')
{
 $check=DB::table('user_files')->where('user_id',Auth::user()->id)->where('type',$type)->get();
 if(count($check)>0)
 {
 
  
 File::delete('storage/app/'.$check[0]->image_path);
 DB::table('user_files')->where('user_id',Auth::user()->id)->where('type',$type)->update([
            
			'image_path'=>$image,
			'f_year'=>$year

			 
			 
		  ]);
 
 }else{
   DB::table('user_files')->insertGetId([
            'session_id'   =>Session::getId(),
			'user_id'   =>Auth::user()->id,
			'image_path'=>$image,
			'type'   =>$type,
			'f_year'=>$year
			 
		  ]);
 
 }

}

public function messaging()

	{
 $company_data=array();
		$user_files=array();
		$company_data=DB::table('company_details')->where('user_id',Auth::user()->id)->get();
         $title 			  = 	array('pageTitle' => 'Messaging');
        return   view('users.messaging',$title)->with(['company_data'=>$company_data,'user_files'=>$this->userform]);

	 

	}
	 
	
 
 	
 
}//class
