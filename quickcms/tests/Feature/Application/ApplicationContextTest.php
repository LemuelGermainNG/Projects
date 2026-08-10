<?php

declare(strict_types=1);

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationRegistry;

it('targets the configured application when using an empty scope', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
    );

    $context
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->pages(
            'Tests\\Fixtures\\Pages\\DashboardPage',
        );

    expect($registry->pages('admin'))
        ->toBe([
            'Tests\\Fixtures\\Pages\\DashboardPage',
        ]);
});

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

it('targets only the selected application', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
        applications: ['shop'],
    );

    $context->pages(
        'Tests\\Fixtures\\Pages\\WelcomePage',
    );

    expect($registry->pages('shop'))
        ->toBe([
            'Tests\\Fixtures\\Pages\\WelcomePage',
        ]);

    expect($registry->pages('admin'))
        ->toBe([]);
});

it('targets multiple applications', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
        applications: [
            'admin',
            'shop',
        ],
    );

    $context->pages(
        'Tests\\Fixtures\\Pages\\UserListPage',
    );

    expect($registry->pages('admin'))
        ->toBe([
            'Tests\\Fixtures\\Pages\\UserListPage',
        ]);

    expect($registry->pages('shop'))
        ->toBe([
            'Tests\\Fixtures\\Pages\\UserListPage',
        ]);

    expect($registry->pages('portal'))
        ->toBe([]);
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

it('allows a scoped contribution without application metadata', function (): void {
    $registry = new ApplicationRegistry();

    $context = new ApplicationContext(
        registry: $registry,
        applications: ['shop'],
    );

    $context->pages(
        'Tests\\Fixtures\\Pages\\WelcomePage',
    );

    expect($registry->pages('shop'))
        ->toBe([
            'Tests\\Fixtures\\Pages\\WelcomePage',
        ]);

    expect($registry->application('shop'))
        ->toBeNull();
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
        ->path('/something')
        ->pages(
            'Tests\\Fixtures\\Pages\\WelcomePage',
        );

    expect($registry->pages('shop'))
        ->toBe([
            'Tests\\Fixtures\\Pages\\WelcomePage',
        ]);

    expect($registry->pages('something'))
        ->toBe([]);

    expect($registry->application('something'))
        ->not->toBeNull();
});
