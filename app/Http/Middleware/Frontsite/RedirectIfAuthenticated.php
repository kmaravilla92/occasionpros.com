<?php

namespace App\Http\Middleware\Frontsite;

use Closure;
use Sentinel;

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
    public function handle($request, Closure $next)
    {
        $currentUser = Sentinel::getUser();
        if (!$currentUser) {
            return redirect('/');
        }
        return $next($request);
    }
}
