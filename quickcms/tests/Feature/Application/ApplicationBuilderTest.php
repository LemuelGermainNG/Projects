<?php

declare(strict_types=1);

use App\Core\Application\ApplicationBuilder;
use App\Core\Application\ApplicationMetadata;
use App\Core\Application\ApplicationRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Fixtures\Application\DashboardPage;
use Tests\Fixtures\Application\NavigationProvider;
use Tests\Fixtures\Application\UsersPage;

it('throws an exception when the application is not registered', function (): void {
    $builder = new ApplicationBuilder(
        new ApplicationRegistry(),
    );

    $application = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    expect(fn () => $builder->build(
        $application,
        ApplicationSchema::make(),
    ))->toThrow(
        RuntimeException::class,
        'Application [admin] is not registered.',
    );
});

it('builds an application schema', function (): void {
    $registry = new ApplicationRegistry();

    $application = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin');

    $registry->registerApplication($application);

    $registry->registerPages(
        ['admin'],
        DashboardPage::class,
        UsersPage::class,
    );

    $registry->registerNavigation(
        ['admin'],
        NavigationProvider::class,
    );

    $result = (new ApplicationBuilder($registry))
        ->build(
            $application,
            ApplicationSchema::make(),
        );

    expect($result)
        ->toBeInstanceOf(ApplicationSchema::class);

    expect($result->brand())
        ->toBeNull();

    expect($result->props())
        ->toBe([]);

    expect($result->pages())
        ->toHaveCount(2)
        ->each
        ->toBeInstanceOf(PageSchema::class);

    expect($result->navigation())
        ->toHaveCount(1)
        ->each
        ->toBeInstanceOf(NavigationSchema::class);
});
