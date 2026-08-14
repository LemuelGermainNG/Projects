<?php

declare(strict_types=1);

namespace App\Core\Runtime\Navigation;

use App\Core\Application\ApplicationRegistry;
use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationGroupSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use InvalidArgumentException;

final class NavigationRegistry
{
    public function __construct(
        protected readonly ApplicationRegistry $applications,
    ) {
    }

    /**
     * Build the merged navigation for an application.
     */
    public function schema(
        string $application,
    ): NavigationSchema {
        $items = [];
        /** @var array<string, NavigationGroupSchema> $groups */
        $groups = [];
        $schemas = [];

        foreach ($this->providers($application) as $navigation) {
            $schemas[] = [
                'provider' => $navigation,
                'schema' => $navigation->schema(),
            ];
        }

        // Register all groups first so items may reference groups declared by
        // another provider, regardless of provider registration order.
        foreach ($schemas as $entry) {
            /** @var Navigation $navigation */
            $navigation = $entry['provider'];
            /** @var NavigationSchema $schema */
            $schema = $entry['schema'];

            foreach ($schema->groups() as $group) {
                $id = $group->id();

                if ($id === null || $id === '') {
                    throw new InvalidArgumentException(
                        sprintf(
                            'Navigation group in [%s] must define an id.',
                            $navigation::class,
                        ),
                    );
                }

                if (! isset($groups[$id])) {
                    $groups[$id] = $group;
                    continue;
                }

                $groups[$id] = $groups[$id]->items([
                    ...$groups[$id]->items(),
                    ...$group->items(),
                ]);
            }
        }

        // Direct items and group-targeted contributions are resolved before
        // the final navigation order is built.
        foreach ($schemas as $entry) {
            /** @var NavigationSchema $schema */
            $schema = $entry['schema'];

            foreach ($schema->items() as $item) {
                $group = $item->group();

                if ($group === null || $group === '') {
                    $items[] = $item;
                    continue;
                }

                if (! isset($groups[$group])) {
                    throw new InvalidArgumentException(
                        sprintf(
                            'Navigation group [%s] is not registered for application [%s].',
                            $group,
                            $application,
                        ),
                    );
                }

                $groups[$group] = $groups[$group]->items([
                    ...$groups[$group]->items(),
                    $item,
                ]);
            }
        }

        // Build the final ordered navigation as one collection. Groups and
        // direct items are siblings in the Runtime protocol.
        $navigationItems = $items;

        foreach ($groups as $group) {
            $groupItems = $group->items();

            usort(
                $groupItems,
                static fn (NavigationItemSchema $a, NavigationItemSchema $b): int =>
                    $a->sort() <=> $b->sort(),
            );

            $navigationItems[] = $group->items($groupItems);
        }

        usort(
            $navigationItems,
            static fn (NavigationItemSchema|NavigationGroupSchema $a, NavigationItemSchema|NavigationGroupSchema $b): int =>
                $a->sort() <=> $b->sort(),
        );

        return NavigationSchema::make()
            ->items($navigationItems);
    }

    /**
     * Resolve a page route for an application.
     *
     * Exact routes always have priority over dynamic routes.
     *
     * @return class-string|null
     */
    public function resolvePage(
        string $application,
        string $route,
    ): ?string {
        return $this->resolvePageMatch(
            application: $application,
            route: $route,
        )['page'] ?? null;
    }

    /**
     * Resolve a page route and extract its dynamic parameters.
     *
     * Supported syntax: {parameter}
     *
     * @return array{page: class-string, parameters: array<string, string>}|null
     */
    public function resolvePageMatch(
        string $application,
        string $route,
    ): ?array {
        $pages = $this->pages($application);

        // Exact matches always win over dynamic routes.
        if (isset($pages[$route])) {
            return [
                'page' => $pages[$route],
                'parameters' => [],
            ];
        }

        $matches = [];

        foreach ($pages as $pattern => $page) {
            if (! str_contains($pattern, '{')) {
                continue;
            }

            $parameterNames = [];
            $segments = explode('/', trim($pattern, '/'));

            foreach ($segments as $segment) {
                if (preg_match('/^\{([A-Za-z_][A-Za-z0-9_]*)\}$/', $segment, $match) === 1) {
                    $parameterNames[] = $match[1];
                    continue;
                }

                if (! str_contains($segment, '{')) {
                    continue;
                }

                // Only full-segment parameters are supported in v1.
                continue 2;
            }

            $patternSegments = count($segments);
            $routeSegments = explode('/', trim($route, '/'));

            if ($patternSegments !== count($routeSegments)) {
                continue;
            }

            $regexParts = [];
            foreach ($segments as $segment) {
                if (preg_match('/^\{([A-Za-z_][A-Za-z0-9_]*)\}$/', $segment) === 1) {
                    $regexParts[] = '([^/]+)';
                    continue;
                }

                $regexParts[] = preg_quote($segment, '#');
            }

            $regex = '#^' . implode('/', $regexParts) . '$#';

            if (preg_match($regex, trim($route, '/'), $values) !== 1) {
                continue;
            }

            $parameters = [];
            foreach ($parameterNames as $index => $name) {
                $parameters[$name] = $values[$index + 1];
            }

            $staticSegments = count(array_filter(
                $segments,
                static fn (string $segment): bool => ! preg_match(
                    '/^\{([A-Za-z_][A-Za-z0-9_]*)\}$/',
                    $segment,
                ),
            ));

            $matches[] = [
                'page' => $page,
                'parameters' => $parameters,
                'staticSegments' => $staticSegments,
                'segments' => $patternSegments,
            ];
        }

        if ($matches === []) {
            return null;
        }

        usort(
            $matches,
            static function (array $a, array $b): int {
                return [$b['staticSegments'], $b['segments']] <=>
                    [$a['staticSegments'], $a['segments']];
            },
        );

        return [
            'page' => $matches[0]['page'],
            'parameters' => $matches[0]['parameters'],
        ];
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(
        string $application,
    ): array {
        $pages = [];

        foreach ($this->providers($application) as $navigation) {
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

    /**
     * @return list<Navigation>
     */
    private function providers(
        string $application,
    ): array {
        $providers = [];

        foreach ($this->applications->navigation($application) as $navigationClass) {
            $navigation = app($navigationClass);

            if ($navigation instanceof Navigation) {
                $providers[] = $navigation;
            }
        }

        return $providers;
    }
}
