<?php

declare(strict_types=1);

use App\Core\Application\Application;
use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationMetadata;
use App\Core\Application\ApplicationRegistry;


it('creates an application context', function (): void {
    $registry = new ApplicationRegistry();

    $this->app->instance(
        ApplicationRegistry::class,
        $registry,
    );

    expect(Application::make())
        ->toBeInstanceOf(ApplicationContext::class);
});

it('creates an application context for specific applications', function (): void {
    $registry = new ApplicationRegistry();

    $this->app->instance(
        ApplicationRegistry::class,
        $registry,
    );

    expect(
        Application::only('admin'),
    )->toBeInstanceOf(ApplicationContext::class);
});

it('finds a registered application', function (): void {
    $registry = new ApplicationRegistry();

    $application = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    $registry->registerApplication($application);

    $this->app->instance(
        ApplicationRegistry::class,
        $registry,
    );

    expect(
        Application::find('admin'),
    )->toBe($application);
});

it('returns null when the application does not exist', function (): void {
    $registry = new ApplicationRegistry();

    $this->app->instance(
        ApplicationRegistry::class,
        $registry,
    );

    expect(
        Application::find('admin'),
    )->toBeNull();
});
