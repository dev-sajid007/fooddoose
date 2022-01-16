<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Permissions
{

    public function handle($request, Closure $next,$data)
    {
        // dd($data);
        if (Auth::check()) {
            if(Auth::user()->id == 1){
                return $next($request);
            }
            if(Auth::user()->role_id == 0){
                return redirect()->route('home')->with('warning',"You don't have access to that section"); 
            }
            if (Auth::user()->sectionCheck($data)){
                return $next($request);
            }
        }
        return redirect()->route('home')->with('warning',"You don't have access to that section"); 
    } 
}
