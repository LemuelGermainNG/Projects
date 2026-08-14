<?php

declare(strict_types=1);

use App\Core\Application\ApplicationBuilder;
use App\Core\Application\ApplicationMetadata;
use App\Core\Application\ApplicationRegistry;
use App\Core\Runtime\Navigation\NavigationRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use Tests\Fixtures\Navigation\NavigationProvider;

it('throws an exception when the application is not registered', function (): void {
    $registry = new ApplicationRegistry;

    $navigationRegistry = new NavigationRegistry(
        $registry,
    );

    $builder = new ApplicationBuilder(
        $registry,
        $navigationRegistry,
    );

    $application = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    expect(fn () => $builder->build(
        $application,
        ApplicationSchema::make(),
    ))->toThrow(
        RuntimeException::class,
        'Application [admin] is not registered.',
    );
});

it('builds an application schema with a root route', function (): void {
    $registry = new ApplicationRegistry;

    $application = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    $registry->registerApplication(
        $application,
    );

    $registry->registerNavigation(
        ['admin'],
        NavigationProvider::class,
    );

    $registry->registerRoot(
        ['admin'],
        'dashboard',
    );

    $navigationRegistry = new NavigationRegistry(
        $registry,
    );

    $result = (new ApplicationBuilder(
        $registry,
        $navigationRegistry,
    ))->build(
        $application,
        ApplicationSchema::make(),
    );

    expect($result)
        ->toBeInstanceOf(
            ApplicationSchema::class,
        );

    expect($result->brand())
        ->toBeNull();

    expect($result->props())
        ->toBe([]);

    expect($result->root())
        ->toBe('dashboard');

    expect($result->navigation())
        ->toBeInstanceOf(
            NavigationSchema::class,
        );

    expect($result->navigation()->items())
        ->toHaveCount(2);
});

it('allows an application without a root route', function (): void {
    $registry = new ApplicationRegistry;

    $application = ApplicationMetadata::make()
        ->id('shop')
        ->name('Shop')
        ->path('/shop');

    $registry->registerApplication(
        $application,
    );

    $navigationRegistry = new NavigationRegistry(
        $registry,
    );

    $result = (new ApplicationBuilder(
        $registry,
        $navigationRegistry,
    ))->build(
        $application,
        ApplicationSchema::make(),
    );

    expect($result->root())
        ->toBeNull();
});
