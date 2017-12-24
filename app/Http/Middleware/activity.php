<?php

namespace App\Http\Middleware;

use Closure;

class activity
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
    	if(time() < strtotime('2017-12-11')){
			return redirect('/activity0');
		}
        return $next($request);
    }
}
