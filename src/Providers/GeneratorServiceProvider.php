<?php

namespace KubaDev\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
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
        $generators = [
            'command.make.module'            => \KubaDev\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \KubaDev\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \KubaDev\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \KubaDev\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \KubaDev\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \KubaDev\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \KubaDev\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \KubaDev\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \KubaDev\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \KubaDev\Modules\Console\Generators\MakeTestCommand::class,
            'command.make.module.job'        => \KubaDev\Modules\Console\Generators\MakeJobCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
