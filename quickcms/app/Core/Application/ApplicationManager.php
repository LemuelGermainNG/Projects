<?php

declare(strict_types=1);

namespace App\Core\Application;

use App\Core\Feature\FeatureDiscovery;
use App\Core\Feature\FeatureProvider;
use Illuminate\Contracts\Foundation\Application;

final class ApplicationManager
{
    /**
     * @var list<ApplicationProvider>
     */
    protected array $providers = [];

    /**
     * @var list<FeatureProvider>
     */
    protected array $features = [];

    /**
     * @var array<string, true>
     */
    protected array $discoveredApplicationPaths = [];

    /**
     * @var array<string, true>
     */
    protected array $discoveredFeaturePaths = [];

    public function __construct(
        protected readonly ApplicationRegistry $registry,
        protected readonly ApplicationDiscovery $discovery,
        protected readonly FeatureDiscovery $featureDiscovery,
        protected readonly Application $application,
    ) {
    }

    /**
     * Register an application provider.
     */
    public function register(
        ApplicationProvider $provider,
    ): void {
        $provider->register();

        $context = new ApplicationContext(
            registry: $this->registry,
        );

        $provider->configure(
            $context,
        );

        $this->providers[] = $provider;
    }

    /**
     * Discover application providers.
     */
    public function discover(
        string $directory,
    ): void {
        $directory = realpath($directory) ?: $directory;

        if (
            isset(
                $this->discoveredApplicationPaths[$directory],
            )
        ) {
            return;
        }

        $this->discoveredApplicationPaths[$directory] = true;

        foreach (
            $this->discovery->discover($directory)
            as $provider
        ) {
            $this->register(
                app($provider),
            );
        }
    }

    /**
     * Register a feature provider.
     */
    public function registerFeature(
        FeatureProvider $feature,
    ): void {
        /*
         * QuickCMS discovers the Feature, but Laravel
         * remains responsible for its ServiceProvider
         * lifecycle.
         */
        $this->application->register(
            $feature,
        );

        $this->features[] = $feature;
    }

    /**
     * Discover feature providers.
     */
    public function discoverFeatures(
        string $directory,
    ): void {
        $directory = realpath($directory) ?: $directory;

        if (
            isset(
                $this->discoveredFeaturePaths[$directory],
            )
        ) {
            return;
        }

        $this->discoveredFeaturePaths[$directory] = true;

        foreach (
            $this->featureDiscovery->discover($directory)
            as $feature
        ) {
            $provider = new $feature(
                $this->application,
            );

            $this->registerFeature(
                $provider,
            );
        }
    }

    /**
     * Boot QuickCMS application providers.
     *
     * Feature providers are registered with Laravel
     * and are booted by Laravel itself.
     */
    public function boot(): void
    {
        foreach ($this->providers as $provider) {
            $provider->boot();
        }
    }

    /**
     * @return list<ApplicationProvider>
     */
    public function providers(): array
    {
        return $this->providers;
    }

    /**
     * @return list<FeatureProvider>
     */
    public function features(): array
    {
        return $this->features;
    }

    public function registry(): ApplicationRegistry
    {
        return $this->registry;
    }
}
