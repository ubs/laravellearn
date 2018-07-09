<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('tasksstats.tasksstats', function($view){
            $view->with('taskArchives', Task::getTaskArchives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
