<?php

namespace App\Http\Middleware\product;

use Closure;
use DB;
use Auth;
use App\UserPermission;

class not_allowed
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
	
	 
	if( $this->permission->hasPermission(Auth('admin')->user()->id,'view_product')==true)
		{
		return $next($request);
		}else{
		return  redirect('/admin/not_allowed');
		}
      
    }
}
