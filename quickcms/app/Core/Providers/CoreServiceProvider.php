<?php

declare(strict_types=1);

namespace App\Core\Providers;

use App\Core\Application\ApplicationBuilder;
use App\Core\Application\ApplicationRegistry;
use App\Core\Builder\BuilderDiscovery;
use App\Core\Builder\BuilderRegistry;
use App\Core\Support\Discovery\ClassDiscovery;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register core services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ApplicationRegistry::class,
        );

        $this->app->singleton(
            ApplicationBuilder::class,
        );

        $this->app->singleton(
            BuilderRegistry::class,
            function (): BuilderRegistry {
                $registry = new BuilderRegistry();

                $builders = (new BuilderDiscovery(
                    new ClassDiscovery(),
                ))->discover(
                    app_path('Core'),
                );

                foreach ($builders as $schema => $builder) {
                    $registry->register(
                        $schema,
                        $builder,
                    );
                }

                return $registry;
            },
        );

    }

    /**
     * Bootstrap core services.
     */
    public function boot(): void
    {
        //
    }
}
