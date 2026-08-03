<?php

declare(strict_types=1);

namespace App\Core\Schema\Table\Column;

use App\Core\Builder\Builder;

final class ColumnBuilder extends Builder
{
    public static function schema(): string
    {
        return ColumnSchema::class;
    }

    public function build(): array
    {
        /** @var ColumnSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'column',

            'label' => $this->evaluate(
                $schema->label(),
            ),

            'description' => $this->evaluate(
                $schema->description(),
            ),

            'child' => $this->compileChild(
                $schema->child(),
            ),

            'props' => $schema->props(),
        ];
    }
}
