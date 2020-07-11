<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AuthorityInfo;

class CheckboxServiceProvider extends ServiceProvider
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
        view()->composer('admin.partials.modals.service-action', function($view){

            $view->with(
                [
                'authorities' => AuthorityInfo::where('authority', '!=', 'Admin')->get(),
                ]
            );

        });
    }
}
