<?php

declare(strict_types=1);

namespace App\Features\User\Providers;

use App\Core\Feature\FeatureProvider;
use App\Core\Source\SourceRegistry;
use App\Features\User\Sources\UserSource;

final class UserServiceProvider extends FeatureProvider
{
    public function register(): void
    {
        parent::register();
    }

    public function boot(): void
    {
        app(SourceRegistry::class)->register(UserSource::class);
    }
}
