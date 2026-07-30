<?php

declare(strict_types=1);

namespace App\Core\Support\Discovery;

use App\Core\Support\Discovery\Contracts\DiscoveryInterface;
use App\Core\Support\Discovery\Filters\ClassFilter;
use ReflectionClass;

final class ClassDiscovery implements DiscoveryInterface
{
    /**
     * Directories to search in.
     *
     * @var list<string>
     */
    protected array $directories = [];

    /**
     * Directories to exclude.
     *
     * @var list<string>
     */
    protected array $excludedDirectories = [];

    /**
     * Discovery filter.
     */
    protected readonly ClassFilter $filter;

    /**
     * Create a new class discovery instance.
     */
    public function __construct(
        protected readonly ClassMap $classMap = new ClassMap(),
    ) {
        $this->filter = new ClassFilter();
    }

    /**
     * Create a new discovery instance.
     */
    public static function make(): static
    {
        return new static();
    }

    /**
     * Restrict discovery to the given directories.
     */
    public function in(string|array $directories): static
    {
        $this->directories = array_merge(
            $this->directories,
            (array) $directories,
        );

        return $this;
    }

    /**
     * Exclude the given directories.
     */
    public function excluding(string|array $directories): static
    {
        $this->excludedDirectories = array_merge(
            $this->excludedDirectories,
            (array) $directories,
        );

        return $this;
    }

    /**
     * Filter by implemented interface.
     */
    public function implementing(string $interface): static
    {
        $this->filter->implementing($interface);

        return $this;
    }

    /**
     * Filter by parent class.
     */
    public function extending(string $parent): static
    {
        $this->filter->extending($parent);

        return $this;
    }

    /**
     * Add a custom filter.
     */
    public function where(callable $callback): static
    {
        $this->filter->where($callback);

        return $this;
    }

    /**
     * Discover matching classes.
     *
     * @return list<class-string>
     */
    public function discover(): array
    {
        $classes = [];

        foreach ($this->classMap->all() as $class => $file) {

            if (! $this->isIncluded($file)) {
                continue;
            }

            if ($this->isExcluded($file)) {
                continue;
            }

            if (! class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);

            if (! $this->filter->passes($reflection)) {
                continue;
            }

            $classes[] = $class;
        }

        return $classes;
    }

    /**
     * Determine if the file belongs to an included directory.
     */
    protected function isIncluded(string $file): bool
    {
        if ($this->directories === []) {
            return true;
        }

        foreach ($this->directories as $directory) {

            if (str_starts_with($file, $directory)) {
                return true;
            }

        }

        return false;
    }

    /**
     * Determine if the file belongs to an excluded directory.
     */
    protected function isExcluded(string $file): bool
    {
        foreach ($this->excludedDirectories as $directory) {

            if (str_starts_with($file, $directory)) {
                return true;
            }

        }

        return false;
    }
}
