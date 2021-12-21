<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
       ->header('Access-Control-Allow-Origin', '*')
       ->header('Access-Control-Allow-Methods','POST,GET,DELETE,OPTIONS,PATCH')
      ->header('Access-Control-Allow-Headers', 'Origin,Content-Type,Accept,Authorization X-Requested-With,cache-control')
      ->header('Access-Control-Allow-Credentials','true');
        }
}
