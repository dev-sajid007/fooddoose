<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class merchant_middleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $super_admin = DB::table('users')->where('id', Auth::user()->id)
                ->first();
            if ($super_admin->user_type == 'merchant') {
                if ($super_admin->status == 1) {
                    return $next($request);
                } elseif ($super_admin->status == 2) {
                    Auth::logout();
                    return redirect('/merchant')->with('warning', 'your account is not approve yet. please contact with administrator');
                } elseif ($super_admin->status == 3) {
                    Auth::logout();
                    return redirect('/merchant')->with('warning', 'Your account has a major critical issue. Please contact the administrator');
                }
            } else {
                Auth::logout();
                return redirect('/merchant')->with('warning', 'Invalid Attempt. please contact support');
            }
        } else {
            Auth::logout();
            return redirect('/merchant')->with('warning', 'please log in first');
        }
    }
}
