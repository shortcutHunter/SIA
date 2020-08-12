<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\master_role_rel;
use App\Models\master_module;
use App\Models\master_menu;
use Illuminate\Support\Facades\Gate;
use View;

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

        Gate::define('isAuth', function ($user, $required_module_id) {
            $list_module_id = $user->master_role->master_module->pluck('id')->toArray();
            return in_array($required_module_id, $list_module_id);
        });

        Gate::define('AuthName', function ($user, $authName) {
            $master_module = master_module::where('nama_module', $authName)->first();
            $list_module_id = $user->master_role->master_module->pluck('id')->toArray();
            if(!$master_module) return false;
            return in_array($master_module->id, $list_module_id);
        });

        $master_menu = master_menu::All()->groupBy('category')->toArray();
        View::share('master_menu', $master_menu);
    }
}
