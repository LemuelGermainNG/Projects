<?php

declare(strict_types=1);

namespace App\Core\Application;


use App\Core\Schema\Application\ApplicationSchema;
use RuntimeException;

final class ApplicationBuilder
{
    public function __construct(
        protected ApplicationRegistry $registry,
    ) {
    }

    /**
     * Build an application schema.
     */
    public function build(
        ApplicationMetadata $application,
        ApplicationSchema $schema,
    ): ApplicationSchema {
        if (! $this->registry->has($application->id())) {
            throw new RuntimeException(
                sprintf(
                    'Application [%s] is not registered.',
                    $application->id(),
                ),
            );
        }

        return $schema
            ->pages(
                $this->registry->pages(
                    $application->id(),
                ),
            )
            ->navigation(
                $this->registry->navigation(
                    $application->id(),
                ),
            );
    }
}
