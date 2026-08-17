<?php

declare(strict_types=1);

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Core\Application\Application;
use App\Core\Navigation\NavigationRegistry;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Features\User\Navigation\UserNavigation;

beforeEach(function (): void {
    Application::make()
        ->id('admin-navigation-test')
        ->name('Administration')
        ->path('/admin-navigation-test')
        ->root('dashboard')
        ->navigation(
            AdminNavigation::class,
        );

    Application::only('admin-navigation-test')
        ->navigation(
            UserNavigation::class,
        );
});

it('rejects an item referencing an unknown group', function (): void {
    Application::only('admin-navigation-test')
        ->navigation(
            \Tests\Support\Navigation\UnknownGroupNavigation::class,
        );

    expect(fn () => app(NavigationRegistry::class)
        ->schema('admin-navigation-test'))
        ->toThrow(
            InvalidArgumentException::class,
            'Navigation group [unknown] is not registered for application [admin-navigation-test].',
        );
});
