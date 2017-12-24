<?php
/**
 * 该类为实现用户无操作停留过久自动退出登录
 */
namespace App\Http\Middleware;

use Closure;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	protected $timeout = 1200;

	public function handle($request, Closure $next)
	{
		$isLoggedIn = $request->path() != 'logout';
		if (!session('lastActivityTime'))
		{
			app('session')->put('lastActivityTime', time());
		}
		elseif (time() - app('session')->get('lastActivityTime') > $this->timeout)
		{
			app('session')->forget('lastActivityTime');
			$cookie = cookie('intend', $isLoggedIn ? url()->current() : 'home');
			$email  = $request->user()->email;
			auth()->logout();

			return route('login')->withInput(['email' => $email])->withCookie($cookie);
		}
		$isLoggedIn ? app('session')->put('lastActivityTime', time()) : app('session')->forget('lastActivityTime');

		return $next($request);
	}
}
