<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class RelationshipAssertions
{
    public static function make(
        string $source,
        string $label,
        string $value,
        array $extra = [],
    ): array {
        return array_replace([
            'type' => 'relationship',

            'source' => $source,

            'label' => $label,

            'value' => $value,

            'props' => [],
        ], $extra);
    }
}
