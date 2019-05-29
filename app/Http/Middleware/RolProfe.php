<?php

namespace App\Http\Middleware;

use Closure;

class RolProfe
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
        if (auth()->check() && auth()->user()->rol)
            return $next($request);

        return redirect('/error/role_not_allowed');
    }
}
