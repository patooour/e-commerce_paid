<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      /*  RateLimiter::for('forget-password', function (Request $request) {
            return \Illuminate\Cache\RateLimiting\Limit::perMinute(3)
                ->by(optional($request->user())->id ?: $request->ip());
        });*/

        /*$this->registerPolicies();*/

        paginator::useBootstrap();
        foreach( config('permissions_en') as $permission => $value) {
            Gate::define($permission, function ($auth) use ($permission) {
                return $auth->hasRole($permission);
            });
        }
    }
}
