<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class SuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->IsSuper()){
                return $next($request);
            }
        }
        return redirect()->route('home')->with('warning',"You don't have access to that section"); 
    }
}
