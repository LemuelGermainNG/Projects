<?php

declare(strict_types=1);

use App\Core\Application\ApplicationBuilder;
use App\Core\Application\ApplicationMetadata;
use App\Core\Application\ApplicationRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use RuntimeException;
use Tests\Support\Navigation\NavigationOne;
use Tests\Support\Navigation\NavigationTwo;
use Tests\Support\Pages\PageOne;
use Tests\Support\Pages\PageTwo;

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
        PageOne::class,
        PageTwo::class,
    );

    $registry->registerNavigation(
        ['admin'],
        NavigationOne::class,
        NavigationTwo::class,
    );

    $result = (new ApplicationBuilder($registry))
        ->build(
            $application,
            ApplicationSchema::make(),
        );

    expect($result)
        ->toBeInstanceOf(ApplicationSchema::class)
        ->and($result->toArray())
        ->toBe([
            'brand' => null,
            'props' => [],
            'pages' => [
                PageOne::class,
                PageTwo::class,
            ],
            'navigation' => [
                NavigationOne::class,
                NavigationTwo::class,
            ],
        ]);
});
