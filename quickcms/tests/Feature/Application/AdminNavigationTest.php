<?php

declare(strict_types=1);

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Core\Application\Application;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Features\User\Navigation\UserNavigation;
use Tests\Support\Pages\PageOne;

it('aggregates application and feature navigation', function (): void {
    Application::make()
        ->id('admin-navigation-test')
        ->name('Administration')
        ->path('/admin-navigation-test')
        ->rootPage(PageOne::class)
        ->navigation(
            AdminNavigation::class,
        );

    Application::only('admin-navigation-test')
        ->navigation(
            UserNavigation::class,
        );

    $application = Application::find(
        'admin-navigation-test',
    );

    expect($application)
        ->not->toBeNull();

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    expect($schema->navigation())
        ->toHaveCount(2);

    expect($schema->navigation())
        ->each
        ->toBeInstanceOf(
            NavigationSchema::class,
        );

    expect($schema->navigation()[0]->label())
        ->toBe('Administration');

    expect($schema->navigation()[1]->label())
        ->toBe('Users');
});
