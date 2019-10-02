<?php

namespace Nexus\Http\Middleware;

use Closure;

class CanRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
	{
		if (! config('nexus.registration_enabled')) {
			return redirect()->guest(admin_base_path('login'));
		}

		return $next($request);
	}
}
