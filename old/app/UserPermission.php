<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use Session; 
class UserPermission extends Authenticatable
{
    use Notifiable;
 protected $table = 'user_permission';
     

public static function hasPermission($user_id,$permission){

$permissionChk = DB::table('user_permission as c')->select('c.*')
				->where('user_id',$user_id)
				->first();
				 
				  $permissionArray=array();
				  $permissionArray=@explode(',',$permissionChk->permission); 
				  
				  
				
	if(count($permissionArray)==0)
	{ 
	 
	return false;
	
	}elseif(in_array($permission,$permissionArray)){
 
	return true;
	}else{
	 
	return false;
	}
	
	


} 


   
}