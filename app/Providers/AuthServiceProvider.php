<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //custom code
        Gate::define('isKemahasiswaan', function($user) {
            return $user->role_id == 1;
         });
         Gate::define('isReviewer', function($user) {
             return $user->role_id == 2;
         });
         Gate::define('isPendamping', function($user) {
             return $user->role_id == 3;
         });
         Gate::define('isMahasiswa', function($user) {
            return $user->role_id == 4;
        });
        //  Gate::define('update-post', function ($user, $post) {
        //      return $user->id === $post->user_id;
        //  });
    }
}
