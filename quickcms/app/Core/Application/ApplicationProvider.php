<?php

declare(strict_types=1);

namespace App\Core\Application;

abstract class ApplicationProvider
{
    /**
     * Configure the application.
     */
    abstract public function configure(
        ApplicationContext $application,
    ): void;

    /**
     * Register application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap the application.
     */
    public function boot(): void
    {
        //
    }
}
