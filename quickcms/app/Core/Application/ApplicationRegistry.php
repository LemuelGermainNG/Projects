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
     * @var array<string, class-string>
     */
    protected array $rootPage = [];

    /**
     * @var array<string, list<class-string>>
     */
    protected array $navigation = [];

    public function registerApplication(
        ApplicationMetadata $application,
    ): void {
        $this->applications[$application->id()] = $application;
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
     * Register the single root page of an application.
     *
     * @param list<string> $applications
     * @param class-string $page
     */
    public function registerRootPage(
        array $applications,
        string $page,
    ): void {
        foreach ($applications as $application) {
            $this->rootPage[$application] = $page;
        }
    }

    /**
     * @return class-string|null
     */
    public function rootPage(
        string $application,
    ): ?string {
        return $this->rootPage[$application] ?? null;
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
