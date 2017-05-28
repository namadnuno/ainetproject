<?php

namespace App\Http\Middleware;

use Closure;

class AtivatedUser
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
        if(auth()->check()) {
            if(!auth()->user()->isActivated()) {
                return redirect('not-activated');
            }
        }

        return $next($request);
    }
}
