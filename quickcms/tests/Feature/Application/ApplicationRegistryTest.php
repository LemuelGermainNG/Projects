<?php

declare(strict_types=1);

use App\Core\Application\ApplicationMetadata;
use App\Core\Application\ApplicationRegistry;
use Tests\Support\Navigation\NavigationOne;
use Tests\Support\Navigation\NavigationTwo;
use Tests\Support\Pages\PageOne;
use Tests\Support\Pages\PageTwo;

it('registers an application', function (): void {
    $registry = new ApplicationRegistry();

    $application = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    $registry->registerApplication($application);

    expect($registry->application('admin'))
        ->toBe($application);
});

it('returns null for an unknown application', function (): void {
    $registry = new ApplicationRegistry();

    expect($registry->application('admin'))
        ->toBeNull();
});

it('determines whether an application exists', function (): void {
    $registry = new ApplicationRegistry();

    $registry->registerApplication(
        ApplicationMetadata::make()
            ->id('admin')
            ->name('Administration')
            ->path('/admin'),
    );

    expect($registry->has('admin'))->toBeTrue()
        ->and($registry->has('website'))->toBeFalse();
});


it('registers navigation', function (): void {
    $registry = new ApplicationRegistry();

    $registry->registerNavigation(
        ['admin'],
        NavigationOne::class,
        NavigationTwo::class,
    );

    expect($registry->navigation('admin'))
        ->toBe([
            NavigationOne::class,
            NavigationTwo::class,
        ]);
});

it('returns an empty navigation list for an unknown application', function (): void {
    $registry = new ApplicationRegistry();

    expect($registry->navigation('admin'))
        ->toBe([]);
});
