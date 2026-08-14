<?php

declare(strict_types=1);

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Core\Application\Application;
use App\Core\Runtime\Navigation\NavigationRegistry;
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

it('merges group contributions from multiple navigation providers', function (): void {
    $schema = app(NavigationRegistry::class)
        ->schema('admin-navigation-test');

    expect($schema)
        ->toBeInstanceOf(NavigationSchema::class);

    expect($schema->items())
        ->toHaveCount(4);

    expect($schema->groups())
        ->toBe([]);

    expect($schema->items()[0]->route())
        ->toBe('dashboard');

    $management = $schema->items()[1];

    expect($management->id())
        ->toBe('management');

    expect($management->label())
        ->toBe('Management');

    expect($management->items())
        ->toHaveCount(3);

    expect($management->items()[0]->route())
        ->toBe('users');

    expect($management->items()[1]->route())
        ->toBe('teams.index');

    expect($management->items()[2]->route())
        ->toBe('roles.index');
});

it('sorts direct items, groups and group items', function (): void {
    $schema = app(NavigationRegistry::class)
        ->schema('admin-navigation-test');

    expect($schema->items()[0]->sort())
        ->toBe(10);

    expect($schema->items()[1]->sort())
        ->toBe(20);

    expect($schema->items()[2]->sort())
        ->toBe(30);

    expect($schema->items()[3]->sort())
        ->toBe(40);

    expect($schema->items()[1]->items()[0]->sort())
        ->toBe(10);

    expect($schema->items()[1]->items()[1]->sort())
        ->toBe(20);

    expect($schema->items()[1]->items()[2]->sort())
        ->toBe(30);
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

it('resolves exact pages before dynamic pages and extracts parameters', function (): void {
    Application::make()
        ->id('dynamic-pages')
        ->name('Dynamic Pages')
        ->path('/dynamic-pages')
        ->navigation(
            \Tests\Support\Navigation\DynamicNavigation::class,
        );

    $registry = app(NavigationRegistry::class);

    expect($registry->resolvePageMatch('dynamic-pages', 'users/create'))
        ->toBe([
            'page' => \Tests\Support\Pages\DynamicCreatePage::class,
            'parameters' => [],
        ]);

    expect($registry->resolvePageMatch('dynamic-pages', 'users/42'))
        ->toBe([
            'page' => \Tests\Support\Pages\DynamicPage::class,
            'parameters' => [
                'id' => '42',
            ],
        ]);

    expect($registry->resolvePageMatch('dynamic-pages', 'users/42/edit'))
        ->toBe([
            'page' => \Tests\Support\Pages\DynamicEditPage::class,
            'parameters' => [
                'id' => '42',
            ],
        ]);
});
