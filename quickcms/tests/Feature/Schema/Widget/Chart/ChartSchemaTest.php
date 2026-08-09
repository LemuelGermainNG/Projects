<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Chart\ChartSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a chart schema', function (): void {
    expect(
        ChartSchema::make(),
    )->toBeInstanceOf(ChartSchema::class);
});

it('sets chart type', function (): void {
    $chart = ChartSchema::make()
        ->chartType('line');

    expect($chart->chartTypeValue())
        ->toBe('line');
});

it('sets chart dataset', function (): void {
    $dataset = [
        [
            'month' => 'Jan',
            'revenue' => 120000,
        ],
    ];

    $chart = ChartSchema::make()
        ->dataset($dataset);

    expect($chart->datasetValue())
        ->toBe($dataset);
});

it('sets chart labels', function (): void {
    $labels = [
        'Jan',
        'Feb',
        'Mar',
    ];

    $chart = ChartSchema::make()
        ->labels($labels);

    expect($chart->labelsValue())
        ->toBe($labels);
});

it('sets chart series', function (): void {
    $series = [
        [
            'name' => 'Revenue',
            'data' => [
                100,
                150,
                200,
            ],
        ],
    ];

    $chart = ChartSchema::make()
        ->series($series);

    expect($chart->seriesValue())
        ->toBe($series);
});

it('sets chart options', function (): void {
    $options = [
        'responsive' => true,
    ];

    $chart = ChartSchema::make()
        ->options($options);

    expect($chart->optionsValue())
        ->toBe($options);
});

it('sets chart axes', function (): void {
    $xAxis = [
        'title' => 'Month',
    ];

    $yAxis = [
        'title' => 'Revenue',
    ];

    $chart = ChartSchema::make()
        ->xAxis($xAxis)
        ->yAxis($yAxis);

    expect($chart->xAxisValue())
        ->toBe($xAxis);

    expect($chart->yAxisValue())
        ->toBe($yAxis);
});

it('inherits widget source', function (): void {
    $chart = ChartSchema::make()
        ->source(UserSource::class);

    expect($chart->source())
        ->toBe(UserSource::class);
});

it('is immutable', function (): void {
    $chart = ChartSchema::make();

    $updated = $chart
        ->key('revenue')
        ->title('Revenue')
        ->chartType('line')
        ->dataset([
            [
                'month' => 'Jan',
                'revenue' => 120000,
            ],
        ])
        ->labels([
            'Jan',
        ])
        ->series([
            [
                'name' => 'Revenue',
                'data' => [120000],
            ],
        ])
        ->options([
            'responsive' => true,
        ])
        ->xAxis([
            'title' => 'Month',
        ])
        ->yAxis([
            'title' => 'Revenue',
        ])
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($chart);

    expect($chart->widgetKey())
        ->toBeNull();

    expect($chart->title())
        ->toBe('');

    expect($chart->chartTypeValue())
        ->toBeNull();

    expect($chart->datasetValue())
        ->toBeNull();

    expect($chart->labelsValue())
        ->toBeNull();

    expect($chart->seriesValue())
        ->toBeNull();

    expect($chart->optionsValue())
        ->toBeNull();

    expect($chart->xAxisValue())
        ->toBeNull();

    expect($chart->yAxisValue())
        ->toBeNull();

    expect($chart->source())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('revenue');

    expect($updated->title())
        ->toBe('Revenue');

    expect($updated->chartTypeValue())
        ->toBe('line');

    expect($updated->datasetValue())
        ->toBe([
            [
                'month' => 'Jan',
                'revenue' => 120000,
            ],
        ]);

    expect($updated->labelsValue())
        ->toBe([
            'Jan',
        ]);

    expect($updated->seriesValue())
        ->toBe([
            [
                'name' => 'Revenue',
                'data' => [120000],
            ],
        ]);

    expect($updated->optionsValue())
        ->toBe([
            'responsive' => true,
        ]);

    expect($updated->xAxisValue())
        ->toBe([
            'title' => 'Month',
        ]);

    expect($updated->yAxisValue())
        ->toBe([
            'title' => 'Revenue',
        ]);

    expect($updated->source())
        ->toBe(UserSource::class);
});
