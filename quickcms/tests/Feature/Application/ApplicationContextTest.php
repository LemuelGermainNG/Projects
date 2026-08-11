<?php

declare(strict_types=1);

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationRegistry;

it('targets the configured application navigation when using an empty scope', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
    );

    $context
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->navigation(
            'Tests\\Fixtures\\Navigation\\AdminNavigation',
        );

    expect($registry->navigation('admin'))
        ->toBe([
            'Tests\\Fixtures\\Navigation\\AdminNavigation',
        ]);
});




it('targets multiple application navigation', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
        applications: [
            'admin',
            'shop',
        ],
    );

    $context->navigation(
        'Tests\\Fixtures\\Navigation\\UserNavigation',
    );

    expect($registry->navigation('admin'))
        ->toBe([
            'Tests\\Fixtures\\Navigation\\UserNavigation',
        ]);

    expect($registry->navigation('shop'))
        ->toBe([
            'Tests\\Fixtures\\Navigation\\UserNavigation',
        ]);

    expect($registry->navigation('portal'))
        ->toBe([]);
});


it('preserves an explicit application scope', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
        applications: ['shop'],
    );

    $context
        ->id('something')
        ->name('Something')
        ->path('/something');

    expect($registry->application('something'))
        ->not->toBeNull();
});
