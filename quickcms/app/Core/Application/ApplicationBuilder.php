<?php

declare(strict_types=1);

namespace App\Core\Application;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Runtime\Contracts\Page;
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

        $pages = [];

        foreach ($this->registry->pages($application->id()) as $page) {
            /** @var Page $provider */
            $provider = new $page();

            $pages[] = $provider->content();
        }

        $navigation = [];

        foreach ($this->registry->navigation($application->id()) as $item) {
            /** @var Navigation $provider */
            $provider = new $item();

            $navigation[] = $provider->schema();
        }

        return $schema
            ->pages($pages)
            ->navigation($navigation);
    }
}
