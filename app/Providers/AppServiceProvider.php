<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\master_role_rel;
use App\Models\master_role;
use Illuminate\Support\Facades\Gate;

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
        Schema::defaultStringLength(191);

        // $this->registerPolicies();
        Gate::define('isAuth', function ($user, $required_role) {
            $master_role = master_role_rel::where('kode_user', $user->id)->where('kode_master_role', $required_role)->count();
            return $master_role > 0;
        });
        Gate::define('AuthName', function ($user, $authName) {
            $role_id = master_role::where('nama_role', $authName)->first();
            if(!$role_id) return false;
            $master_role = master_role_rel::where('kode_user', $user->id)->where('kode_master_role', $role_id->id)->count();
            return $master_role > 0;
        });
    }
}
