<?php

declare(strict_types=1);

namespace App\Core\Source;

final class SourceResolver
{
    public function resolve(
        Source|string $source,
        SourceRequest $request,
    ): SourceResult {
        $instance = $source instanceof Source
            ? $source
            : app($source);

        return $instance->resolve(
            $request,
        );
    }
}
