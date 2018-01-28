<?php

namespace App\Http\Middleware\Frontsite;

use Closure;
use Sentinel;

class VerifyUserType
{

    const ROLES_TO_CHECK = [
        'client',
        'professional'
    ];

    const EXCLUDED_URIS = [
        'professionals/account-info/update-email',
        'professionals/account-info/update-password'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_user = Sentinel::getUser();
        $roles_to_check = self::ROLES_TO_CHECK;

        foreach(self::EXCLUDED_URIS as $excluded_uri){
            if(
                $request->is(
                    sprintf(
                        '*%s*',
                        $excluded_uri
                    )
                )
            ){
                return $next($request);
            }
        }

        foreach($roles_to_check as $index => $role) {
            if($request->is('*'.$role.'s*')) {
                if(!$current_user->hasAccess($role)) { 
                    if(isset($roles_to_check[$index+1])){
                        $role_to_redirect = $roles_to_check[$index+1].'s';
                    }else{
                        $role_to_redirect = $roles_to_check[0].'s';
                    }
                    return redirect(
                        route(
                            sprintf(
                                'frontsite.%s.dashboard',
                                $role_to_redirect
                            )
                        )
                    );
                }
            }else{
                continue;
            }
        }
        return $next($request);
    }
}
