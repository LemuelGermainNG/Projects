<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Relationship\RelationshipSchema;

final class RelationshipBuilderFactory
{
    public static function make(
        string $source,
        string $label = 'name',
        string $value = 'id',
    ): RelationshipSchema {
        return RelationshipSchema::make()
            ->source($source)
            ->label($label)
            ->value($value);
    }
}
