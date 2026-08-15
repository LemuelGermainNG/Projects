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
            'type' => $this->type(),

            'label' => $this->evaluate($schema->label()),

            'description' => $this->evaluate($schema->description()),

            'sortable' => $this->evaluate($schema->isSortable()),

            'searchable' => $this->evaluate($schema->isSearchable()),

            'toggleable' => $this->evaluate($schema->isToggleable()),

            'hidden' => $this->evaluate($schema->isHidden()),

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
