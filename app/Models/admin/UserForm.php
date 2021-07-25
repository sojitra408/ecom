<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use Session; 
class UserForm extends Authenticatable
{
     
 
    
 

public function getUserFormData($id)
{
 $result=array();
 $company_data=DB::table('company_details as d')->select('d.*','u.name','u.email','u.mobile')
 			->join('users as u','d.user_id','u.id')->where('d.user_id',$id)->get();
 $result['company_data']=$company_data;
 return $result;
}
public function getUserFile($type,$id)
{
  $user_files=DB::table('user_files')->where('user_id',$id)->where('type',$type)->get();
 
  
 if(count($user_files)>0)
 return $user_files;
 else
 return $user_files='';
 
}
 
   
}//class