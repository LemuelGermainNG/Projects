<?php

declare(strict_types=1);

namespace App\Applications\Admin;

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Applications\Admin\Pages\DashboardPage;
use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationProvider;

final class AdminApplicationProvider extends ApplicationProvider
{
    public function configure(
        ApplicationContext $application,
    ): void {
        $application
            ->id('admin')
            ->name('Administration')
            ->path('/admin')
            ->layout('sidebar')
            ->navigation(
                AdminNavigation::class,
            )
            ->rootPage(
                DashboardPage::class,
            );
    }
}
