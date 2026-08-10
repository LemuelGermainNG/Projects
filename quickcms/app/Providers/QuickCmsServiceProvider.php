<?php

declare(strict_types=1);

namespace App\Providers;

use App\Core\Application\ApplicationDiscovery;
use App\Core\Application\ApplicationManager;
use App\Core\Application\ApplicationRegistry;
use App\Core\Feature\FeatureDiscovery;
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

        $manager->discover(
            $this->applicationsPath(),
        );

        $manager->discoverFeatures(
            $this->featuresPath(),
        );
    }

    public function boot(
        ApplicationManager $manager,
    ): void {
        $manager->boot();
    }

    protected function applicationsPath(): string
    {
        return config(
            'quickcms.applications_path',
            app_path('Applications'),
        );
    }

    protected function featuresPath(): string
    {
        return config(
            'quickcms.features_path',
            app_path('Features'),
        );
    }
}
