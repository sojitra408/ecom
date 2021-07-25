<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
     
        public function handle($request, Closure $next, $guard = null)
        {
           
            if ($guard == "customer" && Auth::guard($guard)->check()) {
                return redirect('/dashboard');
            }
            /*if (Auth::guard($guard)->check()) {
                return redirect('/home');
            }*/

            return $next($request);
        }

         
    
}
