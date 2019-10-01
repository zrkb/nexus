<?php

namespace Pandorga\Laramie\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
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
		if (Auth::guard('admin')->guest() && !$this->shouldPassThrough($request)) {
			return redirect()->guest(admin_base_path('login'));
		}

		return $next($request);
	}

	/**
	 * Determine if the request has a URI that should pass through verification.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return bool
	 */
	protected function shouldPassThrough($request)
	{
		$excepts = [
			admin_base_path('auth/login'),
			admin_base_path('auth/logout'),
		];

		foreach ($excepts as $except) {
			if ($except !== '/') {
				$except = trim($except, '/');
			}

			if ($request->is($except)) {
				return true;
			}
		}

		return false;
	}
}
