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
     * Discover and register application providers.
     */
    public function discover(
        string $directory,
    ): void {
        $directory = realpath($directory) ?: $directory;

        if (isset($this->discoveredApplicationPaths[$directory])) {
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
     * Register a feature provider through Laravel.
     */
    public function registerFeature(
        FeatureProvider $feature,
    ): void {
        $this->application->register(
            $feature,
        );

        $this->features[] = $feature;
    }

    /**
     * Discover and register feature providers.
     */
    public function discoverFeatures(
        string $directory,
    ): void {
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
     * Bootstrap registered application providers.
     *
     * Feature providers are bootstrapped by Laravel.
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
