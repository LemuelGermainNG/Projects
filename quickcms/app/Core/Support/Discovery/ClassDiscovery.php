<?php declare(strict_types=1);

namespace App\Core\Support\Discovery;

use App\Core\Support\Discovery\Contracts\DiscoveryInterface;
use App\Core\Support\Discovery\Filters\ClassFilter;
use ReflectionClass;

final class ClassDiscovery implements DiscoveryInterface
{
    /** @var list<string> */
    protected array $directories = [];

    /** @var list<string> */
    protected array $excludedDirectories = [];

    protected readonly ClassFilter $filter;

    public function __construct(
        protected readonly ClassMap $classMap = new ClassMap(),
        protected readonly FileScanner $fileScanner = new FileScanner(),
        protected bool $fallbackToFileScan = true,
    ) {
        $this->filter = new ClassFilter();
    }

    public static function make(): static
    {
        return new static();
    }

    public function in(string|array $directories): static
    {
        $this->directories = array_merge(
            $this->directories,
            (array) $directories,
        );

        return $this;
    }

    public function excluding(string|array $directories): static
    {
        $this->excludedDirectories = array_merge(
            $this->excludedDirectories,
            (array) $directories,
        );

        return $this;
    }

    public function implementing(string $interface): static
    {
        $this->filter->implementing($interface);
        return $this;
    }

    public function extending(string $parent): static
    {
        $this->filter->extending($parent);
        return $this;
    }

    public function where(callable $callback): static
    {
        $this->filter->where($callback);
        return $this;
    }

    /**
     * Discover matching classes
     *
     * @return list<class-string>
     */
    public function discover(): array
    {
        $candidates = $this->classMap->all();

        if ($this->fallbackToFileScan && ! empty($this->directories)) {
            foreach ($this->directories as $directory) {
                $scanned = $this->fileScanner->scan($directory);
                $candidates = array_merge($candidates, $scanned);
            }
        }

        $classes = [];

        foreach ($candidates as $class => $file) {
            if (! $this->isIncluded($file) || $this->isExcluded($file)) {
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

        return array_values(array_unique($classes));
    }

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
