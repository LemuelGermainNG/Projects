<?php

declare(strict_types=1);

namespace App\Core\Schema\Table;

use App\Core\Builder\Builder;

final class TableBuilder extends Builder
{
    public static function schema(): string
    {
        return TableSchema::class;
    }

    public function build(): array
    {
        /** @var TableSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'source' => $schema->source(),

            'schema' => $this->compileSchemas(
                $schema->schema(),
            ),

            'filters' => $this->compileSchemas(
                $schema->filters(),
            ),

            'headerActions' => $this->compileSchemas(
                $schema->headerActions(),
            ),

            'rowActions' => $this->compileSchemas(
                $schema->rowActions(),
            ),

            'bulkActions' => $this->compileSchemas(
                $schema->bulkActions(),
            ),

            'pagination' => $this->compileChild(
                $schema->pagination(),
            ),

            'props' => $schema->props(),
        ];
    }
}
