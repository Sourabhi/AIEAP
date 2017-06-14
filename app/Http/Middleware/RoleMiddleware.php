<?php

namespace aieapV1\Http\Middleware;

use Closure;
use Auth;
use \aieapV1\Models\Role;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {   
        if(Auth::check())

            { if(!$request->user()->hasRole($role))
                {//return response ("--------Sorry!----Insufficient Permission ---------Please go back to the 'Home Page'","401");
                return redirect('index')->with('warning','--------Sorry!----Insufficient Permission ---------');
    
                } 
              
             return $next($request);
            }
            
        return redirect('login');
    }
        

}

