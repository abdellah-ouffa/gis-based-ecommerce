<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthAdmin
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
            // if(Auth::user()->role == "supplier") {
            //     return redirect()->route('supplier.index');
            // }
            return (Auth::user()->role == 'admin') ? $next($request) : abort(403);
        }
        return redirect()->route('backend.login');
    }
}
