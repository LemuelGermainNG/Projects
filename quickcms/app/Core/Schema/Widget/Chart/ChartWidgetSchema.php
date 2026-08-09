<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Chart;

use App\Core\Schema\Widget\WidgetSchema;

final class ChartWidgetSchema extends WidgetSchema
{
    protected string|null $chartType = null;

    protected array|null $dataset = null;

    protected array|null $labels = null;

    protected array|null $series = null;

    protected array|null $options = null;

    protected array|null $xAxis = null;

    protected array|null $yAxis = null;

    public function chartType(
        ?string $chartType,
    ): static {
        return $this->with(
            'chartType',
            $chartType,
        );
    }

    public function dataset(
        ?array $dataset,
    ): static {
        return $this->with(
            'dataset',
            $dataset,
        );
    }

    public function datasetValue(): ?array
    {
        return $this->dataset;
    }
    public function labels(
        ?array $labels,
    ): static {
        return $this->with(
            'labels',
            $labels,
        );
    }

    public function series(
        ?array $series,
    ): static {
        return $this->with(
            'series',
            $series,
        );
    }

    public function options(
        ?array $options,
    ): static {
        return $this->with(
            'options',
            $options,
        );
    }

    public function xAxis(
        ?array $xAxis,
    ): static {
        return $this->with(
            'xAxis',
            $xAxis,
        );
    }

    public function yAxis(
        ?array $yAxis,
    ): static {
        return $this->with(
            'yAxis',
            $yAxis,
        );
    }

    public function chartTypeValue(): ?string
    {
        return $this->chartType;
    }

    public function dataValue(): ?array
    {
        return $this->data;
    }

    public function labelsValue(): ?array
    {
        return $this->labels;
    }

    public function seriesValue(): ?array
    {
        return $this->series;
    }

    public function optionsValue(): ?array
    {
        return $this->options;
    }

    public function xAxisValue(): ?array
    {
        return $this->xAxis;
    }

    public function yAxisValue(): ?array
    {
        return $this->yAxis;
    }
}
