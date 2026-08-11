<?php

declare(strict_types=1);

namespace App\Core\Source;

use InvalidArgumentException;

final class SourceRegistry
{
    /**
     * @var array<string, class-string<Source>>
     */
    protected array $sources = [];

    /**
     * @param class-string<Source> $source
     */
    public function register(
        string $source,
    ): void {
        if (! is_subclass_of($source, Source::class)) {
            throw new InvalidArgumentException(
                sprintf(
                    '[%s] must extend [%s].',
                    $source,
                    Source::class,
                ),
            );
        }

        $this->sources[
            $source::name()
        ] = $source;
    }

    /**
     * @return class-string<Source>|null
     */
    public function find(
        string $name,
    ): ?string {
        return $this->sources[$name] ?? null;
    }

    public function resolveByName(
        string $name,
    ): Source {
        $source = $this->find($name);

        if ($source === null) {
            throw new InvalidArgumentException(
                sprintf(
                    'Source [%s] is not registered.',
                    $name,
                ),
            );
        }

        return $this->resolve($source);
    }

    /**
     * @template T of Source
     *
     * @param class-string<T> $source
     *
     * @return T
     */
    public function resolve(
        string $source,
    ): Source {
        if (! is_subclass_of($source, Source::class)) {
            throw new InvalidArgumentException(
                sprintf(
                    '[%s] must extend [%s].',
                    $source,
                    Source::class,
                ),
            );
        }

        /** @var T */
        return app($source);
    }

    public function has(
        string $name,
    ): bool {
        return $this->find($name) !== null;
    }
}
