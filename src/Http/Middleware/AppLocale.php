<?php

namespace Pandorga\Laramie\Http\Middleware;

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
        setlocale(LC_ALL, config('app.locale'));
        Carbon::setLocale(config('app.locale'));
        
        return $next($request);
    }
}
