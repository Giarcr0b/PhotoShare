<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use View;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['profiles.index', 'home',], 'App\Http\ViewComposers\ProfileComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
