<?php

declare(strict_types=1);

namespace App\Core\Schema\Application;

use App\Core\Builder\Builder;

final class ApplicationSchemaBuilder extends Builder
{
    public static function schema(): string
    {
        return ApplicationSchema::class;
    }

    public function build(): array
    {
        /** @var ApplicationSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'brand' => $this->compileChild(
                $schema->brand(),
            ),

            'root' => $this->compileChild(
                $schema->root(),
            ),

            'navigation' => $this->compileSchemas(
                $schema->navigation(),
            ),

            'props' => $schema->props(),
        ];
    }
}
