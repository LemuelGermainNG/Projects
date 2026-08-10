<?php

declare(strict_types=1);

namespace Tests\Fixtures\Feature;

use App\Core\Feature\FeatureProvider;

final class LifecycleFeatureProvider extends FeatureProvider
{
    public static bool $registered = false;

    public static bool $booted = false;

    public function register(): void
    {
        self::$registered = true;
    }

    public function boot(): void
    {
        self::$booted = true;
    }
}
