<?php

namespace App\Http\Middleware;

use Closure;

class checkSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('user')=="")
        {
            //return abort(401);
            return redirect()->route('index');
        }
        return $next($request);
    }
}
