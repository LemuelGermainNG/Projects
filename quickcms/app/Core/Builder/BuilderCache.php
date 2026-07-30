<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;

final class BuilderCache
{
    public function __construct(
        protected readonly string $path,
    ) {
    }

    public function exists(): bool
    {
        return file_exists($this->path);
    }

    /**
     * Load builders from cache.
     *
     * @return array<class-string<Schema>, class-string<Builder>>
     */
    public function load(): array
    {
        if (! $this->exists()) {
            return [];
        }

        /** @var array<class-string<Schema>, class-string<Builder>> */
        return require $this->path;
    }

    /**
     * Store builders into cache.
     *
     * @param array<class-string<Schema>, class-string<Builder>> $builders
     */
    public function store(array $builders): void
    {
        $directory = dirname($this->path);

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $content = <<<PHP
<?php

declare(strict_types=1);

return %s;

PHP;

        file_put_contents(
            $this->path,
            sprintf(
                $content,
                var_export($builders, true),
            ),
        );
    }

    public function clear(): void
    {
        if ($this->exists()) {
            unlink($this->path);
        }
    }
}
