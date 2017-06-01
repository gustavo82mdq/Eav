<?php

namespace Gustavo82mdq\Eav;

use Illuminate\Support\ServiceProvider;


class EavServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views/vendor/backpack/base'), 'backpack',true);
        if ($this->app->runningInConsole()) {
            // Load migrations
            $this->loadMigrationsFrom(__DIR__.'/database/migrations');

            // Publish Resources
            $this->publishResources();
        }

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(realpath(__DIR__ . '/config/config.php'), 'gustavo82mdq.eav');
        $this->mergeConfigFrom(realpath(__DIR__ . '/config/filesystems.php'), 'filesystems.disks');
        $this->app->register(\Backpack\Base\BaseServiceProvider::class);
        $this->app->register(\Backpack\CRUD\CrudServiceProvider::class);
        $this->app->register(\Rinvex\Attributable\Providers\AttributableServiceProvider::class);
        $this->app->register(\Backpack\Generators\GeneratorsServiceProvider::class);
        $this->app->register(\Gustavo82mdq\Eav\RouteServiceProvider::class);
        $this->app->register(\Gustavo82mdq\Eav\EventServiceProvider::class);
        $this->app->singleton('command.eav.publish', function()
        {
            return new Console\Commands\Publish();
        });
        $this->app->singleton('command.eav.create', function()
        {
            return new Console\Commands\Create();
        });


        $this->commands('command.eav.publish');
        $this->commands('command.eav.create');
        $this->commands('Gustavo82mdq\Eav\Console\Commands\EavModel');
        $this->commands('Gustavo82mdq\Eav\Console\Commands\CrudControllerBackpackCommand');
    }

    public function provides()
    {
        return array('command.eav.publish', 'command.eav.create');
    }

    protected function publishResources(){
        // publish views
        $this->publishes([__DIR__.'/resources/views/vendor/backpack/base' => resource_path('views/vendor/backpack/base')], 'views');

        // Publish config
        $this->publishes([
            realpath(__DIR__ . '/config/config.php') => config_path('gustavo82mdq.eav.php'),
        ], 'config');

        // Publish migrations
        $this->publishes([
            realpath(__DIR__.'/../../database/migrations') => database_path('migrations'),
        ], 'migrations');

    }

    protected function loadViewsFrom($path, $namespace, $prepend = false)
    {
            if (!$prepend)
            parent::loadViewsFrom($path, $namespace);
        else {
            if (is_dir($appPath = $this->app->resourcePath().'/views/vendor/'.$namespace)) {
                $this->app['view']->addNamespace($namespace, $appPath);
            }

            $this->app['view']->prependNamespace($namespace, $path);

        }
    }


}