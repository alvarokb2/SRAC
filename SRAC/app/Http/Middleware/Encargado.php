<?php

namespace SRAC\Http\Middleware;

use Closure;

class Encargado
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
        if($request->user()->role == 'encargado'){
            return $next($request);
        }
        return redirect('/');
    }
}
