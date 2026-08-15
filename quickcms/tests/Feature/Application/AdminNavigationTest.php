<?php

declare(strict_types=1);

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Applications\Admin\Pages\CategoriesPage;
use App\Applications\Admin\Pages\DashboardPage;
use App\Applications\Admin\Pages\LogsPage;
use App\Applications\Admin\Pages\MediaPage;
use App\Applications\Admin\Pages\PluginsPage;
use App\Applications\Admin\Pages\PostsPage;
use App\Applications\Admin\Pages\RolesPage;
use App\Applications\Admin\Pages\SettingsPage;
use App\Applications\Admin\Pages\TeamsPage;
use App\Core\Application\Application;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;

it('builds the admin navigation with direct items and groups', function (): void {
    $schema = (new AdminNavigation())->schema();

    expect($schema)
        ->toBeInstanceOf(NavigationSchema::class);

    expect($schema->items())
        ->toHaveCount(1);

    expect($schema->items()[0]->route())
        ->toBe('dashboard');

    expect($schema->groups())
        ->toHaveCount(3);

    expect($schema->groups()[0]->label())
        ->toBe('Management');

    expect($schema->groups()[0]->items())
        ->toHaveCount(2);

    expect($schema->groups()[1]->label())
        ->toBe('Content');

    expect($schema->groups()[1]->items())
        ->toHaveCount(3);

    expect($schema->groups()[2]->label())
        ->toBe('System');

    expect($schema->groups()[2]->items())
        ->toHaveCount(3);
});

it('registers every admin navigation route', function (): void {
    expect((new AdminNavigation())->pages())
        ->toMatchArray([
            'dashboard' => DashboardPage::class,
            'teams' => TeamsPage::class,
            'roles' => RolesPage::class,
            'posts' => PostsPage::class,
            'media' => MediaPage::class,
            'categories' => CategoriesPage::class,
            'settings' => SettingsPage::class,
            'plugins' => PluginsPage::class,
            'logs' => LogsPage::class,
        ]);
});

it('merges the admin navigation into the application schema', function (): void {
    Application::make()
        ->id('admin-navigation-pages-test')
        ->name('Administration')
        ->path('/admin-navigation-pages-test')
        ->root('dashboard')
        ->navigation(AdminNavigation::class);

    $application = Application::find('admin-navigation-pages-test');

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    $navigation = $schema->navigation();

    expect($navigation->items())
        ->toHaveCount(4);

    expect($navigation->groups())
        ->toBe([]);

    expect($navigation->items()[0]->route())
        ->toBe('dashboard');
});
