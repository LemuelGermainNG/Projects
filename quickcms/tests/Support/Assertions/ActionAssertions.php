<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class ActionAssertions
{
    public static function make(
        string $name,
        string $label,
        array $extra = [],
    ): array {
        return array_replace([
            'type' => 'action',

            'name' => $name,

            'label' => $label,
        ], $extra);
    }

    public static function create(): array
    {
        return self::make(
            'create',
            'Create',
        );
    }

    public static function edit(): array
    {
        return self::make(
            'edit',
            'Edit',
        );
    }

    public static function delete(): array
    {
        return self::make(
            'delete',
            'Delete',
        );
    }
}
