<?php

declare(strict_types=1);

namespace Tests\Fixtures\Applications\Shop;

use App\Core\Application\ApplicationContext;
use App\Core\Application\ApplicationProvider;

final class ShopApplicationProvider extends ApplicationProvider
{
    public function configure(
        ApplicationContext $application,
    ): void {
        $application
            ->id('shop')
            ->name('Shop')
            ->path('/shop')
            ->root('dashboard.sales');
    }
}
