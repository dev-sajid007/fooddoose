<?php
namespace App\Http\Middleware;
use Auth;
use Closure;
class CorsMiddleware
{
public function handle($request, Closure $next)
{ 
return $next($request)
->header('Access-Control-Allow-Origin', '*')
      ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
      ->header('Access-Control-Allow-Headers',' Origin, Content-Type,X-Auth-Token, Accept, Authorization, X-Request-With')
      ->header('Access-Control-Allow-Credentials',' true')
// ->header('Access-Control-Allow-Origin', '*')
// ->header('Access-Control-Allow-Methods',"PUT,POST,DELETE,GET,OPTIONS")
->header('Access-Control-Allow-Headers',"Accept,Authorization,Content-Type")
;

// $response = $next($request);
//         $response->header('Access-Control-Allow-Origin', '*');
//         $response->header('Access-Control-Allow-Methods', '*');

//         return $response;
}
}