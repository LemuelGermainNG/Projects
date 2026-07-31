<?php

declare(strict_types=1);

namespace App\Core\Providers;

use App\Core\Application\ApplicationBuilder;
use App\Core\Application\ApplicationRegistry;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register core services.
     */
    public function register(): void
    {
        $this->app->singleton(ApplicationRegistry::class);

        $this->app->singleton(ApplicationBuilder::class);
    }

    /**
     * Bootstrap core services.
     */
    public function boot(): void
    {
        //
    }
}
