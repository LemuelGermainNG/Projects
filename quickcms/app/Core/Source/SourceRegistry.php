<?php

declare(strict_types=1);

namespace App\Core\Source;

use InvalidArgumentException;

final class SourceRegistry
{
    /**
     * @template T of Source
     *
     * @param class-string<T> $source
     *
     * @return T
     */
    public function resolve(string $source): Source
    {
        if (! is_subclass_of($source, Source::class)) {
            throw new InvalidArgumentException(sprintf(
                '[%s] must extend [%s].',
                $source,
                Source::class,
            ));
        }

        /** @var T */
        return app($source);
    }
}
