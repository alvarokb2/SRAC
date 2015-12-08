<?php

namespace SRAC\Http\Middleware;

use Closure;

class Cliente
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
        if($request->user()->role == 'cliente' or $request->user()->role == 'socio'){
            return $next($request);
        }
        return redirect('/');
    }
}
