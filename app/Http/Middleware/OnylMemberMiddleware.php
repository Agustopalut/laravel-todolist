<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnylMemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->exists('username')) {
            // logic ini kebalikan dari onlyGuestMiddleware;
            // jika sudah login
            return $next($request);
        } else {
            return redirect('/login');
        }
        
    }
}
