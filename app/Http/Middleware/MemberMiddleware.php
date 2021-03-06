<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class MemberMiddleware
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
        if (Auth::user() && (Auth::user()->is('Member') || Auth::user()->is('Admin'))) {
            return $next($request);
     }

    return redirect('error');
    }
}
