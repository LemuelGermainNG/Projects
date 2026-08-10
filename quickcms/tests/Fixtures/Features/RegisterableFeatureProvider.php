<?php

declare(strict_types=1);

namespace Tests\Fixtures\Features;

use App\Core\Feature\FeatureProvider;

final class RegisterableFeatureProvider extends FeatureProvider
{
    public static bool $registered = false;

    public function register(): void
    {
        self::$registered = true;
    }
}
