<?php

declare(strict_types=1);

namespace App\Core\Application;

use App\Core\Schema\Application\ApplicationSchema;


final class Application
{
    /**
     * Start an application registration.
     */
    public static function make(): ApplicationContext
    {
        return new ApplicationContext(
            registry: app(ApplicationRegistry::class),
        );
    }

    /**
     * Target one or many applications.
     */
    public static function only(
        string ...$applications,
    ): ApplicationContext {
        return new ApplicationContext(
            registry: app(ApplicationRegistry::class),
            applications: $applications,
        );
    }

    /**
     * Find a registered application.
     */
    public static function find(
        string $application,
    ): ?ApplicationMetadata {
        return app(ApplicationRegistry::class)
            ->application($application);
    }

    /**
     * Build an application schema.
     */
    public static function build(
        ApplicationMetadata $application,
        ApplicationSchema $schema,
    ): ApplicationSchema {
        return app(ApplicationBuilder::class)
            ->build($application, $schema);
    }
}
