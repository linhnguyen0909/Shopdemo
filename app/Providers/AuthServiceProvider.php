<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Post;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Post::class=> PostPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('isAdmin', function ($user) {
//            return $user->role == 'admin';
//        });
//        Gate::define('isManager', function ($user) {
//            return $user->role == 'manager';
//        });
//        Gate::define('isUser', function ($user) {
//            return $user->role == 'user';
//        });
    }
}
