<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        //Admin Gate
        Gate::define('admin', function(User $user){
            if($user->type == 'admin'){
                return true;
            }else{
                return false;
            }
        });

        //Teacher Gate
        Gate::define('teacher', function(User $user){
            if($user->type == 'teacher' || $user->type == 'admin'){
                return true;
            }else{
                return false;
            }
        });

        //Student Gate
        Gate::define('student', function(User $user){
            if($user->type == 'student' || $user->type == 'admin'){
                return true;
            }else{
                return false;
            }
        });
    }
}
