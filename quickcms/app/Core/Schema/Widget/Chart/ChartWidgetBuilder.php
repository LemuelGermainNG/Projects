<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Chart;

use App\Core\Builder\Builder;

final class ChartWidgetBuilder extends Builder
{
    public static function schema(): string
    {
        return ChartWidgetSchema::class;
    }

    public function build(): array
    {
        /** @var ChartWidgetSchema $schema */
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
            'chartType',
            $this->evaluate(
                $schema->chartTypeValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'dataset',
            $this->evaluate(
                $schema->datasetValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'labels',
            $this->evaluate(
                $schema->labelsValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'series',
            $this->evaluate(
                $schema->seriesValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'options',
            $this->evaluate(
                $schema->optionsValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'xAxis',
            $this->evaluate(
                $schema->xAxisValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'yAxis',
            $this->evaluate(
                $schema->yAxisValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'widgetData',
            $this->compileChild(
                $schema->dataSchema(),
            ),
        );

        return $data;
    }
}
