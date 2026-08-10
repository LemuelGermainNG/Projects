<?php

declare(strict_types=1);

use App\Core\Application\ApplicationManager;
use App\Core\Application\ApplicationRegistry;
use App\Providers\QuickCmsServiceProvider;

beforeEach(function (): void {
    config([
        'quickcms.applications_path' => base_path(
            'tests/Fixtures/Applications',
        ),

        'quickcms.features_path' => base_path(
            'tests/Fixtures/Features',
        ),
    ]);
});

it('registers the application manager as a singleton', function (): void {
    $provider = new QuickCmsServiceProvider(
        app(),
    );

    $provider->register();

    expect(app(ApplicationManager::class))
        ->toBeInstanceOf(ApplicationManager::class);

    expect(
        app(ApplicationManager::class),
    )->toBe(
        app(ApplicationManager::class),
    );
});

it('discovers applications during registration', function (): void {
    $provider = new QuickCmsServiceProvider(
        app(),
    );

    $provider->register();

    $registry = app(ApplicationRegistry::class);

    expect($registry->has('admin'))
        ->toBeTrue();

    expect($registry->has('shop'))
        ->toBeTrue();
});

it('discovers features during registration', function (): void {
    $provider = new QuickCmsServiceProvider(
        app(),
    );

    $provider->register();

    $manager = app(ApplicationManager::class);

    expect($manager->features())
        ->not->toBeEmpty();
});

it('boots application providers through the manager', function (): void {
    $provider = new QuickCmsServiceProvider(
        app(),
    );

    $provider->register();

    $manager = app(ApplicationManager::class);

    $provider->boot(
        $manager,
    );

    expect($manager->providers())
        ->not->toBeEmpty();
});

it('resolves the same application manager instance', function (): void {
    $provider = new QuickCmsServiceProvider(
        app(),
    );

    $provider->register();

    $first = app(ApplicationManager::class);
    $second = app(ApplicationManager::class);

    expect($first)
        ->toBe($second);
});
