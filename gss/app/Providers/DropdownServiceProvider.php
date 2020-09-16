<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\ServiceInfo;
use App\LocationInfo;
use App\Role;
use App\PriorityInfo;
use App\UsersRole;

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
                'roles' => Role::distinct()->get()
                ]
            );

        });

        view()->composer('user.service-details', function($view){

            $workerRoleId = Role::where('name', 'Worker')->first()->id;
            $workersIdList = UsersRole::where('role_id', $workerRoleId)->get()->pluck('user_id');
            $workersList = User::whereIn('id', $workersIdList)->get();

            $view->with(
                [
                'workers' => $workersList
                ]
            );

        });
    }
}
