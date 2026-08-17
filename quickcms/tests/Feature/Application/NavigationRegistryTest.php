<?php

declare(strict_types=1);

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Core\Application\Application;
use App\Core\Navigation\NavigationRegistry;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Features\User\Navigation\UserNavigation;

beforeEach(function (): void {
    Application::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->navigation(
            AdminNavigation::class,
            UserNavigation::class,
        );
});

it('merges navigation items from all providers', function (): void {
    $schema = app(NavigationRegistry::class)
        ->schema('admin');

    expect($schema)
        ->toBeInstanceOf(NavigationSchema::class);

    expect($schema->items())
        ->toHaveCount(5);

    expect($schema->items()[0]->route())
        ->toBe('dashboard');

    expect($schema->items()[1]->id())
        ->toBe('management');
});

it('starts with no navigation groups', function (): void {
    $schema = app(NavigationRegistry::class)
        ->schema('admin');

    expect($schema->groups())
        ->toBe([]);
});
