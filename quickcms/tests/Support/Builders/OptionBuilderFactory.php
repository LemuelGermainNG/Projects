<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Option\OptionSchema;

final class OptionBuilderFactory
{
    public static function make(
        string|int|bool|null $value,
        string $label,
    ): OptionSchema {
        return OptionSchema::make()
            ->value($value)
            ->label($label);
    }

    public static function administrator(): OptionSchema
    {
        return self::make(
            'admin',
            'Administrator',
        );
    }

    public static function user(): OptionSchema
    {
        return self::make(
            'user',
            'User',
        );
    }
}
