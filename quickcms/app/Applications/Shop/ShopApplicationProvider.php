<?php

declare(strict_types=1);

namespace App\Applications\Shop;

use App\Applications\Shop\Pages\DashboardSalesPage;
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
            ->rootPage(DashboardSalesPage::class);
    }
}
