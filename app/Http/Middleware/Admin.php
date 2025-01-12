<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::guard('web')->check()){
            if (Auth::user()->role_id == 1) {
                return $next($request);
            }
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

}
