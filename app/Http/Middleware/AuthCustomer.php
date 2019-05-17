<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthCustomer
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
        if(Auth::check()) {
            return (Auth::user()->role == 'customer') ? $next($request) : abort(403);
        }
        return redirect()->route('front.login');
    }
}
