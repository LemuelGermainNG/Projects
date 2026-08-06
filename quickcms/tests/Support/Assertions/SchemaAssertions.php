<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

use App\Core\Schema\Schema;
use Tests\Support\Factories\BuilderRegistryFactory;

final class SchemaAssertions
{
    public static function compile(
        Schema $schema,
    ): array {
        return $schema->compile(
            BuilderRegistryFactory::make(),
        );
    }

    /**
     * @param array<int, Schema> $schemas
     *
     * @return array<int, array<string, mixed>>
     */
    public static function compileMany(
        array $schemas,
    ): array {
        return array_map(
            static fn (Schema $schema): array => self::compile($schema),
            $schemas,
        );
    }
}
