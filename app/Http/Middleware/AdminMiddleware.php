<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $addHttpCookie = true;
    
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->type != "admin")
        {
            return new Response(view('userhome'));
        }
        else{
            return $next($request);
        }
    }
}
