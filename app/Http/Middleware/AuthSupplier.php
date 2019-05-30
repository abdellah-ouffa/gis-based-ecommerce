<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthSupplier
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
            return (Auth::user()->role == 'supplier') ? $next($request) : abort(403);
        }
        return redirect()->route('backend.login');
    }
}
