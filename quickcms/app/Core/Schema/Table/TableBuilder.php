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
            'type' => 'table',

            'source' => $schema->source(),

            'schema' => $this->compileSchema(
                $schema->schema(),
            ),

            'filters' => $this->compileSchema(
                $schema->filters(),
            ),

            'headerActions' => $this->compileSchema(
                $schema->headerActions(),
            ),

            'rowActions' => $this->compileSchema(
                $schema->rowActions(),
            ),

            'bulkActions' => $this->compileSchema(
                $schema->bulkActions(),
            ),

            'pagination' => $this->compileChild(
                $schema->pagination(),
            ),

            'props' => $schema->props(),
        ];
    }
}
