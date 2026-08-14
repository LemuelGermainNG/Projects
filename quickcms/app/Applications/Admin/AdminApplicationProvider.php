<?php

declare(strict_types=1);

namespace App\Applications\Admin;

use App\Applications\Admin\Navigation\AdminNavigation;
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
            ->root('dashboard')
            ->navigation(
                AdminNavigation::class,
            );
    }
}
