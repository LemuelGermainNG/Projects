<?php

declare(strict_types=1);

use App\Core\Application\ApplicationBuilder;
use App\Core\Application\ApplicationMetadata;
use App\Core\Application\ApplicationRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Fixtures\Navigation\NavigationProvider;
use Tests\Fixtures\Pages\DashboardPage;
use Tests\Fixtures\Pages\UsersPage;
use Tests\Support\Pages\PageOne;

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
