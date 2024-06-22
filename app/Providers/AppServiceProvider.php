<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Gate::define('admin', function(User $user){
            return $user->role == 0;
        });
        Gate::define('exporter', function(User $user){
            return $user->role == 1;
        });
        Gate::define('importer', function(User $user){
            return $user->role == 2;
        });
    }
}
