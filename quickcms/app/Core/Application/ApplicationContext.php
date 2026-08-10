<?php

declare(strict_types=1);

namespace App\Core\Application;

final class ApplicationContext
{
    /**
     * @var list<string>
     */
    protected array $applications;

    protected ApplicationMetadata $metadata;

    /**
     * @param list<string> $applications
     */
    public function __construct(
        protected ApplicationRegistry $registry,
        array $applications = [],
    ) {
        $this->applications = $applications;
        $this->metadata = ApplicationMetadata::make();
    }

    /**
     * Define the application identifier.
     */
    public function id(
        string $id,
    ): static {
        $this->metadata->id($id);

        return $this;
    }

    /**
     * Define the application name.
     */
    public function name(
        string $name,
    ): static {
        $this->metadata->name($name);

        return $this;
    }

    /**
     * Define the application path.
     */
    public function path(
        string $path,
    ): static {
        $this->metadata->path($path);

        $this->registry->registerApplication(
            $this->metadata,
        );

        /*
         * Application::make()
         *
         * When no explicit application scope exists,
         * the application being configured becomes the
         * target for subsequent contributions.
         */
        if ($this->applications === []) {
            $this->applications = [
                $this->metadata->id(),
            ];
        }

        return $this;
    }

    /**
     * Register pages for the current application scope.
     *
     * @param class-string ...$pages
     */
    public function pages(
        string ...$pages,
    ): static {
        $this->registry->registerPages(
            $this->applications,
            ...$pages,
        );

        return $this;
    }

    /**
     * Register navigation for the current application scope.
     *
     * @param class-string ...$navigation
     */
    public function navigation(
        string ...$navigation,
    ): static {
        $this->registry->registerNavigation(
            $this->applications,
            ...$navigation,
        );

        return $this;
    }
}
