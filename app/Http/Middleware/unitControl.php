<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class unitControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {

        if(session()->has('unit') && session()->has('rate')){
            return $next($request);
        }
        
        session()->put('unit', 'TRY');
        session()->put('rate', '1');
        return $next($request);










        
    }
}
