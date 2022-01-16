<?php
namespace App\Http\Middleware;
use Closure;
use DB;
use Auth;
class rider_middleware
{
public function handle($request, Closure $next)
{ 
if(Auth::check())
{

$rider = DB::table('users')->where('id', Auth::user()->id)
->first();
if($rider->user_type=='rider'){
if($rider->status==1){
return $next($request);
}
elseif($rider->status==2){
Auth::logout();
return redirect('/rider')->with('warning','your account is not approve yet. please contact with administrator');
}
elseif($rider->status==3){
Auth::logout();
return redirect('/rider')->with('warning','Your account has a major critical issue. Please contact the administrator');
}
}
else{
Auth::logout();
return redirect('/rider')->with('warning','Invalid Attempt. please contact support');
}
}
else{
Auth::logout();
return redirect('/rider')->with('warning','please log in first');
}
}
}