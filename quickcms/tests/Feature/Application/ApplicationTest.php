<?php

declare(strict_types=1);

use App\Core\Application\Application;
use App\Core\Application\ApplicationMetadata;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Fixtures\Navigation\NavigationProvider;
use Tests\Fixtures\Pages\DashboardPage;
use Tests\Fixtures\Pages\UsersPage;

it('registers and builds an application', function (): void {
    Application::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->pages(
            DashboardPage::class,
            UsersPage::class,
        )
        ->navigation(
            NavigationProvider::class,
        );

    $application = Application::find('admin');

    expect($application)
        ->toBeInstanceOf(ApplicationMetadata::class);

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    expect($schema->pages())
        ->toHaveCount(2)
        ->each
        ->toBeInstanceOf(PageSchema::class);

    expect($schema->navigation())
        ->toHaveCount(1)
        ->each
        ->toBeInstanceOf(NavigationSchema::class);
});

it('stores application metadata', function (): void {
    Application::make()
        ->id('backoffice')
        ->name('Back Office')
        ->path('/backoffice');

    $application = Application::find('backoffice');

    expect($application)
        ->toBeInstanceOf(ApplicationMetadata::class);

    expect($application->id())
        ->toBe('backoffice');

    expect($application->name())
        ->toBe('Back Office');

    expect($application->path())
        ->toBe('/backoffice');
});


it('targets the current application when using make', function (): void {
    $registry = app(
        \App\Core\Application\ApplicationRegistry::class,
    );

    $context = \App\Core\Application\Application::make();

    expect($context)
        ->toBeInstanceOf(
            \App\Core\Application\ApplicationContext::class,
        );
});

it('creates a scoped application context with only', function (): void {
    $context = \App\Core\Application\Application::only(
        'shop',
    );

    expect($context)
        ->toBeInstanceOf(
            \App\Core\Application\ApplicationContext::class,
        );
});
