<?php

declare(strict_types=1);

namespace Tests\Fixtures\Application;

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationProvider;

final class BootableApplicationProvider extends ApplicationProvider
{
    public static bool $booted = false;

    public function configure(
        ApplicationContext $application,
    ): void {
        $application
            ->id('bootable')
            ->name('Bootable')
            ->path('/bootable');
    }

    public function boot(): void
    {
        self::$booted = true;
    }
}
