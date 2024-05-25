<?php

namespace Nexus\Http\Middleware;

use Closure;
use Carbon\Carbon;

class AppLocale
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
        // Change Locale
        setlocale(LC_TIME, 'es_ES', 'es', 'ES');
        \Carbon\Carbon::setLocale(config('app.locale'));

        return $next($request);
    }
}
