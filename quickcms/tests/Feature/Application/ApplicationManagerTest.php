<?php

declare(strict_types=1);

use App\Core\Application\ApplicationDiscovery;
use App\Core\Application\ApplicationManager;
use App\Core\Application\ApplicationRegistry;
use App\Core\Feature\FeatureDiscovery;
use Tests\Fixtures\Application\BootableApplicationProvider;
use Tests\Fixtures\Applications\Admin\AdminApplicationProvider;
use Tests\Fixtures\Features\RegisterableFeatureProvider;
use Tests\Fixtures\Features\User\UserFeatureProvider;
use Tests\Fixtures\Feature\LifecycleFeatureProvider;

function makeApplicationManager(): ApplicationManager
{
    return new ApplicationManager(
        registry: new ApplicationRegistry(),
        discovery: new ApplicationDiscovery(),
        featureDiscovery: new FeatureDiscovery(),
        application: app(),
    );
}

it('registers an application provider', function (): void {
    $manager = makeApplicationManager();

    $provider = new AdminApplicationProvider();

    $manager->register($provider);

    expect($manager->providers())
        ->toHaveCount(1);

    expect($manager->providers()[0])
        ->toBe($provider);

    expect($manager->registry()->has('admin'))
        ->toBeTrue();

    expect($manager->registry()->application('admin'))
        ->not->toBeNull();
});

it('discovers and registers application providers', function (): void {
    $manager = makeApplicationManager();

    $manager->discover(
        base_path('tests/Fixtures/Applications'),
    );

    expect($manager->providers())
        ->toHaveCount(2);

    expect($manager->registry()->has('admin'))
        ->toBeTrue();

    expect($manager->registry()->has('shop'))
        ->toBeTrue();
});

it('registers application metadata through providers', function (): void {
    $manager = makeApplicationManager();

    $manager->discover(
        base_path('tests/Fixtures/Applications'),
    );

    $admin = $manager->registry()->application('admin');

    expect($admin)
        ->not->toBeNull();

    expect($admin->id())
        ->toBe('admin');

    expect($admin->name())
        ->toBe('Administration');

    expect($admin->path())
        ->toBe('/admin');

    $shop = $manager->registry()->application('shop');

    expect($shop)
        ->not->toBeNull();

    expect($shop->id())
        ->toBe('shop');

    expect($shop->name())
        ->toBe('Shop');

    expect($shop->path())
        ->toBe('/shop');
});

it('returns the application registry', function (): void {
    $manager = makeApplicationManager();

    expect($manager->registry())
        ->toBeInstanceOf(ApplicationRegistry::class);
});

it('boots registered application providers', function (): void {
    BootableApplicationProvider::$booted = false;

    $manager = makeApplicationManager();

    $provider = new BootableApplicationProvider();

    $manager->register($provider);

    expect(BootableApplicationProvider::$booted)
        ->toBeFalse();

    $manager->boot();

    expect(BootableApplicationProvider::$booted)
        ->toBeTrue();
});

it('registers a feature provider', function (): void {
    $manager = makeApplicationManager();

    $feature = new UserFeatureProvider(
        app(),
    );

    $manager->registerFeature($feature);

    expect($manager->features())
        ->toHaveCount(1);

    expect($manager->features()[0])
        ->toBe($feature);
});

it('discovers and registers feature providers', function (): void {
    $manager = makeApplicationManager();

    $manager->discoverFeatures(
        base_path('tests/Fixtures/Features'),
    );

    expect($manager->features())
        ->toHaveCount(3);

    expect(
        array_map(
            static fn ($feature): string => $feature::class,
            $manager->features(),
        ),
    )->toContain(
        UserFeatureProvider::class,
        RegisterableFeatureProvider::class,
    );
});

it('registers feature services through Laravel', function (): void {
    RegisterableFeatureProvider::$registered = false;

    $manager = makeApplicationManager();

    $feature = new RegisterableFeatureProvider(
        app(),
    );

    $manager->registerFeature($feature);

    expect(RegisterableFeatureProvider::$registered)
        ->toBeTrue();
});

it('delegates feature registration to Laravel', function (): void {
    LifecycleFeatureProvider::$registered = false;

    $manager = makeApplicationManager();

    $feature = new LifecycleFeatureProvider(
        app(),
    );

    $manager->registerFeature($feature);

    expect(LifecycleFeatureProvider::$registered)
        ->toBeTrue();
});

it('does not manually boot feature providers', function (): void {
    LifecycleFeatureProvider::$registered = false;
    LifecycleFeatureProvider::$booted = false;

    $manager = makeApplicationManager();

    $feature = new LifecycleFeatureProvider(
        app(),
    );

    $manager->registerFeature($feature);

    $manager->boot();

    /*
     * ApplicationManager::boot() only handles
     * ApplicationProvider instances.
     *
     * FeatureProvider::boot() belongs to Laravel.
     */
    expect(LifecycleFeatureProvider::$registered)
        ->toBeTrue();
});
