<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Sentinel;

class GeneralComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $sentinelUser = Sentinel::getUser();
        $currentUser = null;
        $laravelUser = null;
        if($sentinelUser){
            $laravelUser = \App\User::find($sentinelUser->id);
            $currentUser = $sentinelUser;
        }

        $this->currentUser = $currentUser;
        $this->laravelUser = $laravelUser;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('laravelUser', $this->laravelUser);
        $view->with('currentUser', $this->currentUser);
    }
}
