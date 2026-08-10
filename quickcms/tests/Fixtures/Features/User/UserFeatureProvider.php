<?php

declare(strict_types=1);

namespace Tests\Fixtures\Features\User;

use App\Core\Feature\FeatureProvider;

final class UserFeatureProvider extends FeatureProvider
{
    public static bool $booted = false;

    public function boot(): void
    {
        self::$booted = true;
    }
}
