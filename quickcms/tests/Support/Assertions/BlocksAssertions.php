<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class BlocksAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'blocks',

            'name' => 'content',

            'blocks' => [
                BlockAssertions::make(),
            ],
        ];
    }
}
