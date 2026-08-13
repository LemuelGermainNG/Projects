<?php

declare(strict_types=1);

namespace App\Core\Runtime\Navigation;

use App\Core\Application\ApplicationRegistry;
use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationSchema;
use InvalidArgumentException;

final class NavigationRegistry
{
    public function __construct(
        protected readonly ApplicationRegistry $applications,
    ) {}

    /**
     * Build the merged navigation for an application.
     */
    public function schema(
        string $application,
    ): NavigationSchema {
        $items = [];
        $groups = [];

        foreach (
            $this->applications->navigation(
                $application,
            ) as $navigationClass
        ) {
            $navigation = app($navigationClass);

            if (! $navigation instanceof Navigation) {
                continue;
            }

            $schema = $navigation->schema();

            foreach ($schema->items() as $item) {
                $items[] = $item;
            }

            foreach ($schema->groups() as $group) {
                $groups[] = $group;
            }
        }

        return NavigationSchema::make()
            ->items($items)
            ->groups($groups);
    }

    /**
     * Resolve a page route for an application.
     *
     * @return class-string|null
     */
    public function resolvePage(
        string $application,
        string $route,
    ): ?string {
        foreach (
            $this->applications->navigation(
                $application,
            ) as $navigationClass
        ) {
            $navigation = app($navigationClass);

            if (! $navigation instanceof Navigation) {
                continue;
            }

            $pages = $navigation->pages();

            if (isset($pages[$route])) {
                return $pages[$route];
            }
        }

        return null;
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(
        string $application,
    ): array {
        $pages = [];

        foreach (
            $this->applications->navigation(
                $application,
            ) as $navigationClass
        ) {
            $navigation = app($navigationClass);

            if (! $navigation instanceof Navigation) {
                continue;
            }

            foreach ($navigation->pages() as $route => $page) {
                if (isset($pages[$route])) {
                    throw new InvalidArgumentException(
                        sprintf(
                            'Navigation route [%s] is already registered for application [%s].',
                            $route,
                            $application,
                        ),
                    );
                }

                $pages[$route] = $page;
            }
        }

        return $pages;
    }
}
