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

            'label' => $this->evaluate($schema->label()),

            'description' => $this->evaluate($schema->description()),

            'sortable' => $this->evaluate($schema->sortable()),

            'searchable' => $this->evaluate($schema->searchable()),

            'toggleable' => $this->evaluate($schema->toggleable()),

            'hidden' => $this->evaluate($schema->hidden()),

            'default' => $this->evaluate($schema->default()),

            'align' => $this->evaluate($schema->align()),

            'width' => $this->evaluate($schema->width()),

            'formatter' => $schema->formatter(),

            'child' => $this->compileChild(
                $schema->child(),
            ),

            'props' => $schema->props(),
        ];
    }
}
