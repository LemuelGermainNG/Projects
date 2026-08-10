<?php

declare(strict_types=1);

namespace Tests\Fixtures\Applications\Admin;

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationProvider;
use Tests\Fixtures\Navigation\NavigationProvider;
use Tests\Fixtures\Pages\DashboardPage;
use Tests\Fixtures\Pages\UsersPage;

final class AdminApplicationProvider extends ApplicationProvider
{
    public function configure(
        ApplicationContext $application,
    ): void {
        $application
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
    }
}
