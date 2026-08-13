<?php

declare(strict_types=1);

namespace App\Core\Application;

use App\Core\Runtime\Contracts\Page;
use App\Core\Runtime\Navigation\NavigationRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use RuntimeException;

final class ApplicationBuilder
{
    public function __construct(
        protected ApplicationRegistry $registry,
        protected NavigationRegistry $navigationRegistry,
    ) {}

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

        $rootPageClass = $this->registry->rootPage(
            $application->id(),
        );

        if ($rootPageClass === null) {
            throw new RuntimeException(
                sprintf(
                    'Application [%s] has no root page.',
                    $application->id(),
                ),
            );
        }

        /** @var Page $rootPage */
        $rootPage = new $rootPageClass;

        return $schema
            ->root(
                $rootPage->content(),
            )
            ->navigation(
                $this->navigationRegistry->schema(
                    $application->id(),
                ),
            );
    }
}
