<?php

namespace App\Providers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-conversation', function (User $user, Conversation $conversation) {
        //     return $conversation->user->is($user);
        // });

        // Gate::before(function (User $user) {
        //     // we probably would want to check actual roles or something in a production website
        //     if ($user->id === 6) {
        //         // there's probably a way to not allow the admin user to do absolutely everything globally
        //         return true;
        //     }
        // });

        Gate::before(function (User $user, String $ability) {
            return $user->abilities()->contains($ability);
        });
    }
}
