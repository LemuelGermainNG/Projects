<?php

declare(strict_types=1);

namespace App\Core\Source;

use InvalidArgumentException;

final class SourceRegistry
{
    /**
     * @template T of Source
     *
     * @param class-string<T>|T $source
     *
     * @return T
     */
    public function resolve(
        string|Source $source,
    ): Source {
        if ($source instanceof Source) {
            return $source;
        }

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
