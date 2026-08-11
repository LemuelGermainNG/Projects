<?php

declare(strict_types=1);

namespace Tests\Fixtures\Features\User;

use App\Core\Application\Application;
use App\Core\Feature\FeatureProvider;
use Tests\Support\Navigation\NavigationOne;
use Tests\Support\Pages\PageOne;

final class UserApplicationFeatureProvider extends FeatureProvider
{
    public function boot(): void
    {
        Application::only('shop')
            ->navigation(
                NavigationOne::class,
            );
    }
}
