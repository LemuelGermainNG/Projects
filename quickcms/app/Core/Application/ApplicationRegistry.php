<?php

declare(strict_types=1);

namespace App\Core\Application;

final class ApplicationRegistry
{
    /**
     * @var array<string, ApplicationMetadata>
     */
    protected array $applications = [];

    /**
     * @var array<string, string>
     */
    protected array $root = [];

    /**
     * @var array<string, list<class-string>>
     */
    protected array $navigation = [];

    public function registerApplication(
        ApplicationMetadata $application,
    ): void {
        $id = $application->id();

        $this->applications[$id] = $application;
        unset(
            $this->root[$id],
            $this->navigation[$id],
        );
    }

    public function application(
        string $application,
    ): ?ApplicationMetadata {
        return $this->applications[$application] ?? null;
    }

    public function has(
        string $application,
    ): bool {
        return isset($this->applications[$application]);
    }

    /**
     * Register the root page route of an application.
     *
     * @param list<string> $applications
     */
    public function registerRoot(
        array $applications,
        string $route,
    ): void {
        foreach ($applications as $application) {
            $this->root[$application] = $route;
        }
    }

    public function root(
        string $application,
    ): ?string {
        return $this->root[$application] ?? null;
    }

    /**
     * @param list<string> $applications
     * @param class-string ...$navigation
     */
    public function registerNavigation(
        array $applications,
        string ...$navigation,
    ): void {
        foreach ($applications as $application) {
            $this->navigation[$application] ??= [];

            $this->navigation[$application] = array_values(
                array_unique([
                    ...$this->navigation[$application],
                    ...$navigation,
                ]),
            );
        }
    }

    /**
     * @return list<class-string>
     */
    public function navigation(
        string $application,
    ): array {
        return $this->navigation[$application] ?? [];
    }
}
