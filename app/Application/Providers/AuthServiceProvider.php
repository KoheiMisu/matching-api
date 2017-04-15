<?php

namespace App\Application\Providers;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach (UserPermission::TYPES as $type) {
            Gate::define($type, function (User $user) use ($type) {
                return $user->judgeType($type);
            });
        }

        Gate::define('createTeam', function (User $user) {
            return $user->canCreateTeam();
        });
    }
}
