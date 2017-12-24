<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // var_dump($request);
        // exit();
//        if (Auth::guard($guard)->check()) {
//            return redirect('/admin');
//        }
//
//        return $next($request);
		if (Auth::guard($guard)->check())
		{
			$url = $guard ? 'admin/index' : '/home';

			return redirect($url);
		}

		return $next($request);
    }
}
