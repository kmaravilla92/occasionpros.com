<?php

namespace App\Http\Middleware\Backoffice;

use Closure;
use Sentinel;

class AllowIfAdmin
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
        $currentUser = Sentinel::getUser();

        if(!$currentUser){
            if($request->is(config('app.admin_uri'))) {
                return redirect(route('admin.login'));
            }
            return redirect('/');
        }else{
            if(!$currentUser->hasAnyAccess(['admin'])) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
