<?php

declare(strict_types=1);

namespace App\Providers;

use App\Core\Application\ApplicationDiscovery;
use App\Core\Application\ApplicationManager;
use App\Core\Application\ApplicationRegistry;
use App\Core\Feature\FeatureDiscovery;
use App\Core\Navigation\NavigationRegistry;
use Illuminate\Support\ServiceProvider;

final class QuickCmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            ApplicationManager::class,
            fn ($app): ApplicationManager => new ApplicationManager(
                registry: $app->make(
                    ApplicationRegistry::class,
                ),
                discovery: $app->make(
                    ApplicationDiscovery::class,
                ),
                featureDiscovery: $app->make(
                    FeatureDiscovery::class,
                ),
                application: $app,
            ),
        );

        $manager = $this->app->make(
            ApplicationManager::class,
        );

        /*
         * Discover Applications.
         */
        $manager->discover(
            config(
                'quickcms.applications_path',
                app_path('Applications'),
            ),
        );

        /*
         * Discover Features.
         */
        $manager->discoverFeatures(
            config(
                'quickcms.features_path',
                app_path('Features'),
            ),
        );

        $this->app->singleton(
            NavigationRegistry::class,
            fn ($app) => new NavigationRegistry(
                $app->make(ApplicationRegistry::class),
            ),
        );
    }

    public function boot(
        ApplicationManager $manager,
    ): void {
        $manager->boot();
    }
}
