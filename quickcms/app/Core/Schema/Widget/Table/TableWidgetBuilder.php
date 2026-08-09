<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Table;

use App\Core\Builder\Builder;

final class TableWidgetBuilder extends Builder
{
    public static function schema(): string
    {
        return TableWidgetSchema::class;
    }

    public function build(): array
    {
        /** @var TableWidgetSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => $this->type(),

            'title' => $this->evaluate(
                $schema->title(),
            ),

            'description' => $this->evaluate(
                $schema->description(),
            ),

            'icon' => $this->evaluate(
                $schema->icon(),
            ),

            'visible' => $this->evaluate(
                $schema->visible(),
            ),

            'width' => $this->evaluate(
                $schema->width(),
            ),

            'columns' => $this->evaluate(
                $schema->columns(),
            ),

            'props' => $schema->props(),
        ];

        $this->addIfNotNull(
            $data,
            'key',
            $this->evaluate(
                $schema->widgetKey(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'source',
            $this->evaluate(
                $schema->source(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'tableColumns',
            $this->evaluate(
                $schema->tableColumnsValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'rowKey',
            $this->evaluate(
                $schema->rowKeyValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'data',
            $this->compileChild(
                $schema->dataSchema(),
            ),
        );

        return $data;
    }
}
