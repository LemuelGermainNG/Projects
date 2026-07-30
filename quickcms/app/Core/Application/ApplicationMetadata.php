<?php

declare(strict_types=1);

namespace App\Core\Application;

use App\Core\Application\Enums\ApplicationLayout;

final class ApplicationMetadata
{
    /**
     * Application identifier.
     */
    protected string $id;

    /**
     * Application display name.
     */
    protected string $name;

    /**
     * Application base path.
     */
    protected string $path;

    /**
     * Root application layout.
     */
    protected ApplicationLayout $layout;

    /**
     * Create a new application metadata instance.
     */
    public static function make(): static
    {
        return new static();
    }

    /**
     * Get or set the application identifier.
     */
    public function id(?string $id = null): string|static
    {
        if ($id === null) {
            return $this->id;
        }

        $this->id = $id;

        return $this;
    }

    /**
     * Get or set the application name.
     */
    public function name(?string $name = null): string|static
    {
        if ($name === null) {
            return $this->name;
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Get or set the application path.
     */
    public function path(?string $path = null): string|static
    {
        if ($path === null) {
            return $this->path;
        }

        $this->path = $path;

        return $this;
    }

    /**
     * Get or set the application layout.
     */
    public function layout(?ApplicationLayout $layout = null): ApplicationLayout|static
    {
        if ($layout === null) {
            return $this->layout;
        }

        $this->layout = $layout;

        return $this;
    }

    /**
     * Convert the metadata to an array.
     *
     * @return array{
     *     id: string,
     *     name: string,
     *     path: string,
     *     layout: string,
     * }
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'layout' => $this->layout->value,
        ];
    }
}
