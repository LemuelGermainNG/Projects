<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\List;

use App\Core\Builder\Builder;

final class ListWidgetBuilder extends Builder
{
    public static function schema(): string
    {
        return ListWidgetSchema::class;
    }

    public function build(): array
    {
        /** @var ListWidgetSchema $schema */
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
            'itemKey',
            $this->evaluate(
                $schema->itemKeyValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'itemTitle',
            $this->evaluate(
                $schema->itemTitleValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'itemDescription',
            $this->evaluate(
                $schema->itemDescriptionValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'itemIcon',
            $this->evaluate(
                $schema->itemIconValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'itemValue',
            $this->evaluate(
                $schema->itemValueValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'itemTrend',
            $this->evaluate(
                $schema->itemTrendValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'itemMeta',
            $this->evaluate(
                $schema->itemMetaValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'items',
            $this->evaluate(
                $schema->itemsValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'filters',
            $this->evaluate(
                $schema->filtersValue(),
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
