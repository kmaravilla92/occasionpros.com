<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Cartalyst\Sentinel\Roles\EloquentRole;

class RolesComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $roles;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(EloquentRole $roles)
    {
        // Dependencies automatically resolved by service container...
        $this->roles = $roles;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $roles = \Cache::remember('backoffice_user_group_edit', env('CACHE_EXPIRATION'), function()
        {
            return $this
                        ->roles
                        ->orderBy('name','ASC')
                        ->select('id','name')
                        ->get();
        });

        $view->with('roles', $roles);
    }
}