<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check()){ // 0 = user , 1 = admin
            if(Auth::user()->role_as == '1'){
                return $next($request);
            }
            else{
                return redirect('/')->with('success', 'Access Denied! As you are not an Admin');
            }
        }
        else{
            return redirect('/')->with('success', 'Please Login First');
        }
    }
}
