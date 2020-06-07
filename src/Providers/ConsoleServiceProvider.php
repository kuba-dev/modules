<?php

namespace KubaDev\Modules\Providers;

use KubaDev\Modules\Database\Migrations\Migrator;
use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
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
        $this->registerDisableCommand();
        $this->registerEnableCommand();
        $this->registerListCommand();
        $this->registerMigrateCommand();
        $this->registerMigrateRefreshCommand();
        $this->registerMigrateResetCommand();
        $this->registerMigrateRollbackCommand();
        $this->registerOptimizeCommand();
        $this->registerSeedCommand();
    }

    /**
     * Register the module:disable command.
     *
     * @return void
     */
    protected function registerDisableCommand()
    {
        $this->app->singleton('command.module.disable', function () {
            return new \KubaDev\Modules\Console\Commands\ModuleDisableCommand();
        });

        $this->commands('command.module.disable');
    }

    /**
     * Register the module:enable command.
     *
     * @return void
     */
    protected function registerEnableCommand()
    {
        $this->app->singleton('command.module.enable', function () {
            return new \KubaDev\Modules\Console\Commands\ModuleEnableCommand();
        });

        $this->commands('command.module.enable');
    }

    /**
     * Register the module:list command.
     *
     * @return void
     */
    protected function registerListCommand()
    {
        $this->app->singleton('command.module.list', function ($app) {
            return new \KubaDev\Modules\Console\Commands\ModuleListCommand($app['modules']);
        });

        $this->commands('command.module.list');
    }

    /**
     * Register the module:migrate command.
     *
     * @return void
     */
    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.module.migrate', function ($app) {
            return new \KubaDev\Modules\Console\Commands\ModuleMigrateCommand($app['migrator'], $app['modules']);
        });

        $this->commands('command.module.migrate');
    }

    /**
     * Register the module:migrate:refresh command.
     *
     * @return void
     */
    protected function registerMigrateRefreshCommand()
    {
        $this->app->singleton('command.module.migrate.refresh', function () {
            return new \KubaDev\Modules\Console\Commands\ModuleMigrateRefreshCommand();
        });

        $this->commands('command.module.migrate.refresh');
    }

    /**
     * Register the module:migrate:reset command.
     *
     * @return void
     */
    protected function registerMigrateResetCommand()
    {
        $this->app->singleton('command.module.migrate.reset', function ($app) {
            return new \KubaDev\Modules\Console\Commands\ModuleMigrateResetCommand($app['modules'], $app['files'], $app['migrator']);
        });

        $this->commands('command.module.migrate.reset');
    }

    /**
     * Register the module:migrate:rollback command.
     *
     * @return void
     */
    protected function registerMigrateRollbackCommand()
    {
        $this->app->singleton('command.module.migrate.rollback', function ($app) {
            $repository = $app['migration.repository'];
            $table      = $app['config']['database.migrations'];

            $migrator = new Migrator($table, $repository, $app['db'], $app['files']);

            return new \KubaDev\Modules\Console\Commands\ModuleMigrateRollbackCommand($migrator, $app['modules']);
        });

        $this->commands('command.module.migrate.rollback');
    }

    /**
     * Register the module:optimize command.
     *
     * @return void
     */
    protected function registerOptimizeCommand()
    {
        $this->app->singleton('command.module.optimize', function () {
            return new \KubaDev\Modules\Console\Commands\ModuleOptimizeCommand();
        });

        $this->commands('command.module.optimize');
    }

    /**
     * Register the module:seed command.
     *
     * @return void
     */
    protected function registerSeedCommand()
    {
        $this->app->singleton('command.module.seed', function ($app) {
            return new \KubaDev\Modules\Console\Commands\ModuleSeedCommand($app['modules']);
        });

        $this->commands('command.module.seed');
    }
}
