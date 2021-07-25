<?php

namespace App\Http\Middleware\user;

use Closure;
use DB;
use Auth;
use App\UserPermission;


class create_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	 public $permission=null;
    public function handle($request, Closure $next)
    {
	$this->permission= new UserPermission;
	
	 
	if( $this->permission->hasPermission(Auth('admin')->user()->id,'create_user')==true)
		{
		return $next($request);
		}else{
		return  redirect('/admin/home')->with('permission_message','You dont have permission to access this page!Please contact admin.');
		}
      
    }
}
