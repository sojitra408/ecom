<?php
namespace App\Models;
    
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Support\Facades\Auth;
    use DB;
    use App\User;
    use Session; 
    class UserForm extends Authenticatable
    {
         
     
        
    public function SaveCompanyDetails($request)
    {
    $id=DB::table('company_details')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				'type_of_entity'=>$request['type_of_entity'],
    			 	'company_name'   =>$request['company_name'],
    			 	'cnn_no'=>$request['cnn_no'],
    			 	'date_of_incorporation'=>$request['date_of_incorporation'],
                  	'line_1'=>$request['line_1'],
    			  	'line_2' =>$request['line_2'],
    			  	'line_3'=>$request['line_3'],
    				'landmark'=>$request['landmark'],
    				'district'=>$request['district'],
    				'city'=>$request['city'],
    				'state'=>$request['state'],
    				'pin'=>$request['pin'],
    				'fy_1_amount'=>$request['fy_1_amount'],
    				'fy_2_amount'=>$request['fy_2_amount'],
    				'fy_3_amount'=>$request['fy_3_amount'],
    				'pan_no'=>$request['pan_no'],
    				'tan_no'=>$request['tan_no'],
    				'u_aadhar'=>$request['u_aadhar'],
    				'start_up_no'=>$request['start_up_no'],
    				'company_linkedin'=>$request['company_linkedin'],
    				
    		  ]);
    
    return $id;
    }
    
    public function SaveBankDetails($request,$cheque)
    {
    $account='';
    if($request['account_type']=='Other')
    $account=$request['other_acc'];
    else
    $account=$request['account_type'];
    
    $id=DB::table('bank_details')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				'cheque_doc'=>$cheque,
    				'account_name'=>$request['account_name'],
    				'bank_name'=>$request['bank_name'],
    			 	'account_type'   =>$account,
    			 	'branch_address'=>$request['branch_address'],
    			 	'ifsc_code'=>$request['ifsc_code']
                   
    				
    		  ]);
    
    return $id;
    }
    
    public function UpdateBankDetails($request)
    {
    $id=DB::table('company_details')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				'type_of_entity'=>$request['type_of_entity'],
    			 	'company_name'   =>$request['company_name'],
    			 	'cnn_no'=>$request['cnn_no'],
    			 	'date_of_incorporation'=>$request['date_of_incorporation'],
                  	'line_1'=>$request['line_1'],
    			  	'line_2' =>$request['line_2'],
    			  	'line_3'=>$request['line_3'],
    				'landmark'=>$request['landmark'],
    				'district'=>$request['district'],
    				'city'=>$request['city'],
    				'state'=>$request['state'],
    				'pin'=>$request['pin'],
    				'fy_1_amount'=>$request['fy_1_amount'],
    				'fy_2_amount'=>$request['fy_2_amount'],
    				'fy_3_amount'=>$request['fy_3_amount'],
    				'pan_no'=>$request['pan_no'],
    				'tan_no'=>$request['tan_no'],
    				'u_aadhar'=>$request['u_aadhar'],
    				'start_up_no'=>$request['start_up_no'],
    				'company_linkedin'=>$request['company_linkedin'],
    				
    		  ]);
    
    return $id;
    }
    
    public function savefounder($request)
    {
    $founder= DB::table('founder')->where('user_id',Auth::user()->id)->where('founder_email',$request['founder_email'])->get();
    if(count($founder)==0)
    {
    $id=DB::table('founder')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				'founder_name'=>$request['founder_name'],
    			 	'founder_email'   =>$request['founder_email'],
    			 	'founder_mobile'=>$request['founder_mobile']
    		  ]);
			  session(['founder_name'=>'']);
	session(['founder_email'=>'']);
	session(['founder_mobile'=>'']);
    
    return $id;
    }else{
	session(['founder_name'=>$request['founder_name']]);
	session(['founder_email'=>$request['founder_email']]);
	session(['founder_mobile'=>$request['founder_mobile']]);
    return 0;
    
    }
    }
     
    
    public function saveBrand($request)
    {
    $id=DB::table('brand_details')->insertGetId([
                	'user_id'   =>   Auth::user()->id,
    				'brand_name'=>$request['brand_name'],
    			 	'brand_site'   =>$request['brand_site'],
    			 	'brand_insta'=>$request['brand_insta'],
    				'brand_fb'=>$request['brand_fb'],
    				'brand_link'=>$request['brand_link'],
    				'brand_youtube'=>$request['brand_youtube'],
    				'category'=>$request['category'],
    		  ]);
    
    return $id;
    }
    public function updateBrand($request)
    {
    $id=DB::table('brand_details')->where('user_id',Auth::user()->id)->where('id',$request['id'])->update([
                	 
    				 
    			 	'brand_site'   =>$request['brand_site'],
    			 	'brand_insta'=>$request['brand_insta'],
    				'brand_fb'=>$request['brand_fb'],
    				'brand_link'=>$request['brand_link'],
    				'brand_youtube'=>$request['brand_youtube'],
    				'category'=>$request['category'],
    		  ]);
    
    return $id;
    }
    
    
    public function updatefounder($request)
    {
     
     $founder= DB::table('founder')->where('user_id',Auth::user()->id)->where('founder_email',$request['founder_email'])->where('id','!=',$request['id'])->get();
     if(count($founder)==0)
     {
    		  DB::table('founder')->where('user_id',Auth::user()->id)->where('id',$request['id'])->update([
                
    			'founder_name'=>$request['founder_name'],
    			 	'founder_email'   =>$request['founder_email'],
    			 	'founder_mobile'=>$request['founder_mobile'],
    			 
    			 
    		  ]);
    		  return 1;
    		  }else{
    		  
    		  return 0;
    
    		  }
    
    }
    
    public function gstvalidate($request)
    {
       
      $gst_no=$request['gst_no']; 
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://preprod.aadhaarapi.com/verify-gst-lite",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\n    \"gstin\":\"$gst_no\",\n    \"consent\":\"Y\",\n    \"consent_text\":\"rttr trtr trtrt trtre eeree reree ree\"\n} ",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "qt_api_key: 453e7c9a-435f-4a9f-8d93-9c8036cbad59",
        "qt_agency_id: 939bfa63-d284-4a51-a557-2a3594981666"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
     $arr=json_decode($response, true); 
    
    if(isset($arr['statusCode']) && $arr['statusCode']==422){
    
    return $msg='Please enter a valid GSTIN';
    
    } 
    
    else if($arr['response_code']==102)
    {
    return $msg='Invalid ID number or combination of inputs';
    exit(0);
    
    }
    else if($arr['response_code']==103)
    {
    return $msg='No records found for the given ID or combination of inputs';
    exit(0);
    
    }else if($arr['response_code']==101 && $arr['transaction_status']==1){
    
    $pan_no = substr($arr['result']['gstin'],2,10);
    
    if($arr['result']['ctb']=='Limited Liability Partnership')
    	$company_type_id=1;
		else if($arr['result']['ctb']=='Private Limited Company')
		$company_type_id=2;
	    else if($arr['result']['ctb']=='Public Limited Company')
	    $company_type_id=3;
        else
        $company_type_id=0;
	  
	  if($company_type_id==0)
	  {
	  return $msg='Oops! Only the following types of entities can sell products on This or That <ul><li>Limited Liability Partnership</li>
<li>Private Limited Company</li>
<li>Public Limited Company</li></ul>';
	  exit(0);
	  }
    
    $id=DB::table('company_details')->insertGetId([
                	 'user_id'   =>   Auth::user()->id,
    				 'company_name'   =>$arr['result']['tradeNam'],
    			 	 'company_type'   =>$arr['result']['ctb'],
    				 'company_type_id'   =>$company_type_id, 
    				 'contact_name'   =>$arr['result']['lgnm'], 
    			 	'date_of_incorporation'=>$arr['result']['rgdt'],
                  	'line_1'=>$arr['result']['pradr']['addr']['bnm'],
    			  	'line_2' =>$arr['result']['pradr']['addr']['bno'],
    			  	'line_3'=>$arr['result']['pradr']['addr']['st'],
    				'landmark'=>$arr['result']['pradr']['addr']['loc'],
    				'district'=>$arr['result']['pradr']['addr']['dst'],
    				'state'=>$arr['result']['pradr']['addr']['stcd'],
    				'pin'=>$arr['result']['pradr']['addr']['pncd'],
    				 'pan_no'=>$pan_no,
    				 'gst_no'=>$arr['result']['gstin'],
    				'tan_no'=>$request['tan_no'],
    				'u_aadhar'=>$request['u_aadhar'],
    				'start_up_no'=>$request['start_up_no'],
    				 
    				
    		  ]);
    		  
    
    return $msg='Verification Success!';
    
    }else{
    return $msg='Wrong inputs! Try later';
    }
    
    }
    
     
    
    public function UpdateCompanyDetails($request)
    {
    if($request['city']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['city'=>$request['city']]);
    if($request['tan_no']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['tan_no'=>$request['tan_no']]);
    if($request['cnn_no']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['cnn_no'=>$request['cnn_no']]);
    if($request['start_up_no']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['start_up_no'=>$request['start_up_no']]);
    if($request['msme_no']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['msme_no'=>$request['msme_no']]);
    if($request['type_of_msme']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['type_of_msme'=>$request['type_of_msme']]);
    
    
    if($request['line_1']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['line_1'=>$request['line_1']]);
    if($request['line_2']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['line_2'=>$request['line_2']]);
    if($request['line_3']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['line_3'=>$request['line_3']]);
    if($request['district']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['district'=>$request['district']]);
    
    if($request['state']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['state'=>$request['state']]);
    if($request['pin']!='')
    DB::table('company_details')->where('user_id',Auth::user()->id)->update(['pin'=>$request['pin']]);
    
    $data=DB::table('company_details')->where('user_id',Auth::user()->id)->get();
    if(isset($data) && count($data)>0)
    {
    if($data[0]->pin!='' && $data[0]->state!='' && $data[0]->district!='' && $data[0]->line_3!='' && $data[0]->line_2!='' && $data[0]->line_1!='' && $data[0]->type_of_msme!='' && $data[0]->msme_no!='' && $data[0]->start_up_no!='' && $data[0]->cnn_no!='' && $data[0]->tan_no!='' && $data[0]->city!='')
    {
     DB::table('company_details')->where('user_id',Auth::user()->id)->update([
                	 
    				'update_status'=>1
    				 
    				
    		  ]);
    		  }
    		  
    	}
    
    return 1;
    }
    
    public function getUserFile($type)
    {
     $user_files=DB::table('user_files')->where('user_id',Auth::user()->id)->where('type',$type)->get();
     
     if(count($user_files)>0)
     return $user_files;
     else
     return $user_files='';
     
    }
     
       
    }