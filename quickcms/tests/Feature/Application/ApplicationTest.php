<?php

declare(strict_types=1);

use App\Core\Application\Application;
use App\Core\Application\ApplicationMetadata;
use App\Core\Application\Enums\ApplicationLayout;
use App\Core\Schema\Application\ApplicationSchema;
use Tests\Fixtures\Application\DashboardPage;
use Tests\Fixtures\Application\NavigationProvider;
use Tests\Fixtures\Application\UsersPage;

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
        ->toHaveCount(2);

    expect($schema->navigation())
        ->toHaveCount(1);
});


it('stores application metadata', function (): void {
    Application::make()
        ->id('backoffice')
        ->name('Back Office')
        ->path('/backoffice');

    $application = Application::find('backoffice');

    expect($application)
        ->not->toBeNull();

    expect($application->toArray())->toBe([
        'id' => 'backoffice',
        'name' => 'Back Office',
        'path' => '/backoffice',
        'layout' => ApplicationLayout::Default->value,
    ]);
});
