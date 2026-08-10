<?php

declare(strict_types=1);

namespace App\Applications\Admin;

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationProvider;
use App\Applications\Admin\Pages\DashboardPage;

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
            );
    }
}
