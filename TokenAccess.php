<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenAccess
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {    $token='7qSLoQSLI9uWelaI2zeYmMlnLW4OiGIA67yEqKkw4DCPBQfQNw';
      if(!$request->header('Authorization')){
      return response()->json(['success' => false,    'status' => 401, 'message' => 'unauthorized'], 401);
     }else{
         if($request->header('Authorization') !== $token){
                return response()->json(['success' => false,    'status' => 401, 'message' => 'unauthorized'], 401);
      }
    }
     return $next($request);
  }
}
