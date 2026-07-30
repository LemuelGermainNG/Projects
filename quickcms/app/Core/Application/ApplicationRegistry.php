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
     * @var array<string, list<class-string>>
     */
    protected array $pages = [];

    /**
     * @var array<string, list<class-string>>
     */
    protected array $navigation = [];

    /**
     * Register an application.
     */
    public function registerApplication(
        ApplicationMetadata $application,
    ): void {
        $this->applications[
            $application->id()
        ] = $application;
    }

    /**
     * Find an application.
     */
    public function application(
        string $application,
    ): ?ApplicationMetadata {
        return $this->applications[$application] ?? null;
    }

    /**
     * Determine if an application exists.
     */
    public function has(
        string $application,
    ): bool {
        return isset(
            $this->applications[$application],
        );
    }

    /**
     * Register pages.
     *
     * @param list<string> $applications
     * @param class-string ...$pages
     */
    public function registerPages(
        array $applications,
        string ...$pages,
    ): void {
        foreach ($applications as $application) {
            $this->pages[$application] ??= [];

            array_push(
                $this->pages[$application],
                ...$pages,
            );
        }
    }

    /**
     * Register navigation.
     *
     * @param list<string> $applications
     * @param class-string ...$navigation
     */
    public function registerNavigation(
        array $applications,
        string ...$navigation,
    ): void {
        foreach ($applications as $application) {
            $this->navigation[$application] ??= [];

            array_push(
                $this->navigation[$application],
                ...$navigation,
            );
        }
    }

    /**
     * Get registered pages.
     *
     * @return list<class-string>
     */
    public function pages(
        string $application,
    ): array {
        return $this->pages[$application] ?? [];
    }

    /**
     * Get registered navigation.
     *
     * @return list<class-string>
     */
    public function navigation(
        string $application,
    ): array {
        return $this->navigation[$application] ?? [];
    }
}
