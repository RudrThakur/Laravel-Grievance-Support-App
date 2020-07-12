<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\ServiceInfo;
use App\LocationInfo;
use App\RoleInfo;
use App\PriorityInfo;

class DropdownServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('user.service', function($view){

            $view->with(
                [
                'categories' => ServiceInfo::distinct()->pluck('category'),
                'blocks' => LocationInfo::distinct()->pluck('block'),
                'priorities' => PriorityInfo::all()
                ]
            );

        });

        view()->composer('user.register', function($view){

            $view->with(
                [
                'roles' => RoleInfo::distinct()->get()
                ]
            );

        });

        view()->composer('user.partials.service-action', function($view){

            $view->with(
                [
                'workers' => User::where('role_id', RoleInfo::where('role', 'Worker')->first()->id)->get()
                ]
            );

        });
    }
}
