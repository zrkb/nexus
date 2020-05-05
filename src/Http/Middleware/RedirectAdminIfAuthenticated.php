<?php

namespace Nexus\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectAdminIfAuthenticated
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
        if (Auth::guard('admin')->check()) {
            return redirect()->route('app');
        }

        return $next($request);
    }
}
