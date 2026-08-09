<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\Chart;

use App\Core\Schema\Widget\Chart\ChartSchema;
use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use Tests\Fixtures\Sources\UserSource;

final class ChartBuilderFactory
{
    public static function make(): ChartSchema
    {
        return ChartSchema::make()
            ->key('revenue')
            ->title('Revenue')
            ->description('Monthly revenue')
            ->icon('heroicon-o-chart-bar')
            ->visible(true)
            ->width(8)
            ->columns([
                'default' => 1,
                'md' => 2,
            ])
            ->source(UserSource::class)
            ->chartType('line')
            ->labels([
                'Jan',
                'Feb',
                'Mar',
                'Apr',
            ])
            ->series([
                [
                    'name' => 'Revenue',
                    'data' => [
                        120000,
                        145000,
                        138000,
                        162000,
                    ],
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
            ->props([
                'refresh' => true,
            ]);
    }

    public static function withWidgetData(): ChartSchema
    {
        return self::make()
            ->data(
                WidgetDataSchema::make()
                    ->records(
                        WidgetRecordsSchema::make()
                            ->records([
                                [
                                    'month' => 'Jan',
                                    'revenue' => 120000,
                                ],
                                [
                                    'month' => 'Feb',
                                    'revenue' => 145000,
                                ],
                            ]),
                    )
                    ->pagination(
                        WidgetPaginationSchema::make()
                            ->enabled()
                            ->perPage(25)
                            ->page(1),
                    )
                    ->loading(
                        WidgetLoadingSchema::make()
                            ->enabled()
                            ->message('Loading chart...'),
                    )
                    ->empty(
                        WidgetEmptySchema::make()
                            ->message('No revenue data.')
                            ->icon('chart'),
                    ),
            );
    }

    public static function empty(): ChartSchema
    {
        return ChartSchema::make();
    }

    public static function source(): ChartSchema
    {
        return ChartSchema::make()
            ->source(UserSource::class);
    }

    public static function bar(): ChartSchema
    {
        return ChartSchema::make()
            ->chartType('bar')
            ->labels([
                'Jan',
                'Feb',
                'Mar',
            ])
            ->series([
                [
                    'name' => 'Revenue',
                    'data' => [
                        100,
                        150,
                        175,
                    ],
                ],
            ]);
    }

    public static function pie(): ChartSchema
    {
        return ChartSchema::make()
            ->chartType('pie')
            ->labels([
                'Desktop',
                'Mobile',
                'Tablet',
            ])
            ->series([
                [
                    'name' => 'Visitors',
                    'data' => [
                        55,
                        30,
                        15,
                    ],
                ],
            ]);
    }
}
