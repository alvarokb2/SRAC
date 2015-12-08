<?php

namespace SRAC\Http\Middleware;

use Closure;

class Socio
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
        if($request->user()->role == 'socio'){
            return $next($request);
        }
        return redirect('/');
    }
}
