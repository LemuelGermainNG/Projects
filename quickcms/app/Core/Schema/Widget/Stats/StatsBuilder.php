<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Stats;

use App\Core\Builder\Builder;

final class StatsBuilder extends Builder
{
    public static function schema(): string
    {
        return StatsSchema::class;
    }

    public function build(): array
    {
        /** @var StatsSchema $schema */
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
            'value',
            $this->evaluate(
                $schema->valueValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'trend',
            $this->evaluate(
                $schema->trendValue(),
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
