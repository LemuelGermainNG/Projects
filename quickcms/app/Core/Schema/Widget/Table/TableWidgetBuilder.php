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
                $schema->isVisible(),
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
            $this->resolveSourceName(
                $schema->source(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'tableColumns',
            $this->compileTableColumns(
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

    /**
     * @param  array<int, array<string, mixed>>|null  $columns
     * @return array<int, array<string, mixed>>|null
     */
    protected function compileTableColumns(?array $columns): ?array
    {
        if ($columns === null) {
            return null;
        }

        return array_map(
            function (array $column): array {
                $column = array_replace(
                    [
                        'key' => null,
                        'label' => '',
                        'sortable' => false,
                        'searchable' => false,
                        'width' => null,
                        'align' => 'start',
                        'format' => null,
                        'visible' => true,
                    ],
                    $column,
                );

                foreach ([
                    'key',
                    'label',
                    'sortable',
                    'searchable',
                    'width',
                    'align',
                    'format',
                    'visible',
                ] as $property) {
                    $column[$property] = $this->evaluate(
                        $column[$property],
                    );
                }

                return $column;
            },
            $columns,
        );
    }
}
