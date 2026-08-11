<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget;

use App\Core\Builder\Builder;

class WidgetBuilder extends Builder
{
    public static function schema(): string
    {
        return WidgetSchema::class;
    }

    public function build(): array
    {
        /** @var WidgetSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => 'widget',

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

        $key = $this->evaluate(
            $schema->widgetKey(),
        );

        $this->addIfNotNull(
            $data,
            'key',
            $key,
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
            'data',
            $this->compileChild(
                $schema->dataSchema(),
            ),
        );

        return $data;
    }
}
