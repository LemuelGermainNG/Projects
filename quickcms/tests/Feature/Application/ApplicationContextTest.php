<?php

declare(strict_types=1);

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationRegistry;
use Tests\Support\Navigation\NavigationOne;
use Tests\Support\Navigation\NavigationTwo;
use Tests\Support\Pages\PageOne;
use Tests\Support\Pages\PageTwo;

it('creates an application context', function (): void {
    $context = new ApplicationContext(
        new ApplicationRegistry(),
    );

    expect($context)
        ->toBeInstanceOf(ApplicationContext::class);
});

it('registers an application', function (): void {
    $registry = new ApplicationRegistry();

    (new ApplicationContext($registry))
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    $application = $registry->application('admin');

    expect($application)
        ->not->toBeNull()
        ->and($application?->id())->toBe('admin')
        ->and($application?->name())->toBe('Administration')
        ->and($application?->path())->toBe('/admin');
});

it('registers pages', function (): void {
    $registry = new ApplicationRegistry();

    (new ApplicationContext(
        registry: $registry,
        applications: ['admin'],
    ))->pages(
        PageOne::class,
        PageTwo::class,
    );

    expect($registry->pages('admin'))
        ->toBe([
            PageOne::class,
            PageTwo::class,
        ]);
});

it('registers navigation', function (): void {
    $registry = new ApplicationRegistry();

    (new ApplicationContext(
        registry: $registry,
        applications: ['admin'],
    ))->navigation(
        NavigationOne::class,
        NavigationTwo::class,
    );

    expect($registry->navigation('admin'))
        ->toBe([
            NavigationOne::class,
            NavigationTwo::class,
        ]);
});

it('supports fluent configuration', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext($registry);

    expect(
        $context
            ->id('admin')
            ->name('Administration')
            ->path('/admin'),
    )->toBe($context);
});
