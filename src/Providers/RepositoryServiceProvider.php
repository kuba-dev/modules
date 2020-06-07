<?php

namespace KubaDev\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the provided services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the provided services.
     *
     * @return void
     */
    public function register()
    {
        $default = config('modules.default_driver');
        $driver  = config('modules.drivers.' . $default);

        $this->app->bind('KubaDev\Modules\Contracts\Repository', $driver);
    }
}
