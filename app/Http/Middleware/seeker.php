<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;


class seeker
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
        if (Auth::check() && Auth::user()->user_type == 'seeker') {
            return $next($request);
        } else {
            return redirect('/');
        }
    }

}
