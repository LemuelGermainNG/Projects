<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Action\ActionSchema;

final class ActionBuilderFactory
{
    public static function make(
        string $name,
        string $label,
    ): ActionSchema {
        return ActionSchema::make()
            ->name($name)
            ->label($label);
    }

    public static function create(): ActionSchema
    {
        return self::make(
            'create',
            'Create',
        );
    }

    public static function edit(): ActionSchema
    {
        return self::make(
            'edit',
            'Edit',
        );
    }

    public static function delete(): ActionSchema
    {
        return self::make(
            'delete',
            'Delete',
        );
    }
}
