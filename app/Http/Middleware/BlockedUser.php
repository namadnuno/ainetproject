<?php

namespace App\Http\Middleware;

use Closure;

class BlockedUser
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
            if(auth()->user()->isBlocked()) {
                auth()->logout();
               return redirect('blocked');
            }
        }
        return $next($request);
    }
}
