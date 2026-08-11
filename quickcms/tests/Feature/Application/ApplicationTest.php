<?php

declare(strict_types=1);

use App\Core\Application\Application;
use App\Core\Application\ApplicationMetadata;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Fixtures\Navigation\NavigationProvider;
use Tests\Support\Pages\PageOne;

it('registers and builds an application', function (): void {
    Application::make()
        ->id('application-test')
        ->name('Administration')
        ->path('/application-test')
        ->navigation(
            NavigationProvider::class,
        )
        ->rootPage(
            PageOne::class,
        );

    $application = Application::find(
        'application-test',
    );

    expect($application)
        ->toBeInstanceOf(
            ApplicationMetadata::class,
        );

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    expect($schema->root())
        ->toBeInstanceOf(
            PageSchema::class,
        );

    expect($schema->navigation())
        ->toHaveCount(1);

    expect($schema->navigation()[0])
        ->toBeInstanceOf(
            NavigationSchema::class,
        );
});

it('stores application metadata', function (): void {
    Application::make()
        ->id('backoffice-test')
        ->name('Back Office')
        ->path('/backoffice-test');

    $application = Application::find(
        'backoffice-test',
    );

    expect($application)
        ->toBeInstanceOf(
            ApplicationMetadata::class,
        );

    expect($application->toArray())->toBe([
        'id' => 'backoffice-test',
        'name' => 'Back Office',
        'path' => '/backoffice-test',
        'layout' => $application->layout()->value,
    ]);
});

it('targets the current application when using make', function (): void {
    Application::make()
        ->id('current-test')
        ->name('Current')
        ->path('/current-test')
        ->rootPage(
            PageOne::class,
        );

    $application = Application::find(
        'current-test',
    );

    expect($application)
        ->toBeInstanceOf(
            ApplicationMetadata::class,
        );
});

it('creates a scoped application context with only', function (): void {
    $context = Application::only(
        'admin',
        'backoffice',
    );

    expect($context)
        ->toBeInstanceOf(
            \App\Core\Application\ApplicationContext::class,
        );
});
