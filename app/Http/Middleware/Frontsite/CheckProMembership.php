<?php

namespace App\Http\Middleware\Frontsite;

use Closure;
use Carbon\Carbon;

class CheckProMembership
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
        \Session::flash('toastr', []);
        $currentUser = \Sentinel::getUser();
        if($currentUser){
            $laravelUser = \App\User::with('userMembership')->where('id', $currentUser->id)->first();
            if($laravelUser){
                $userMembership = $laravelUser->userMembership;
                if(isset($userMembership) && $userMembership->is_expired){
                    \Session::flash('toastr', [
                        'error' => sprintf(
                                '<a href="%s">Your membership has been expired! Click here to renew.</a>', 
                                route('frontsite.professionals.membership')
                            )
                    ]);
                    return $next($request);
                }elseif(isset($userMembership) && $userMembership->status == '3'){
                    \Session::flash('toastr', [
                        'error' => sprintf(
                                '<a href="%s">Your don&apos;t have a membership! Click here to avail one.</a>', 
                                route('frontsite.professionals.membership')
                            )
                    ]);
                    return $next($request);
                }else{

                }
            }
        }
        return $next($request);
    }
}
