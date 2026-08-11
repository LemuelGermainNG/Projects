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

    public function id(
        string $id,
    ): static {
        $this->metadata->id($id);

        return $this;
    }

    public function name(
        string $name,
    ): static {
        $this->metadata->name($name);

        return $this;
    }

    public function path(
        string $path,
    ): static {
        $this->metadata->path($path);

        $this->registry->registerApplication(
            $this->metadata,
        );

        $this->applications = [
            $this->metadata->id(),
        ];

        return $this;
    }

    /**
     * Register the application root page.
     *
     * @param class-string $page
     */
    public function rootPage(
        string $page,
    ): static {
        $this->registry->registerRootPage(
            $this->applications,
            $page,
        );

        return $this;
    }

    /**
     * Register navigation.
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
