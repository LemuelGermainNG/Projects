<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\Chart;

use Tests\Fixtures\Sources\UserSource;

final class ChartWidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'chart-widget',

            'title' => 'Revenue',

            'description' => 'Monthly revenue',

            'icon' => 'heroicon-o-chart-bar',

            'visible' => true,

            'width' => 8,

            'columns' => [
                'default' => 1,
                'md' => 2,
            ],

            'props' => [
                'refresh' => true,
            ],

            'key' => 'revenue',

            'source' => UserSource::class,

            'chartType' => 'line',

            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
            ],

            'series' => [
                [
                    'name' => 'Revenue',
                    'data' => [
                        120000,
                        145000,
                        138000,
                        162000,
                    ],
                ],
            ],

            'options' => [
                'responsive' => true,
            ],

            'xAxis' => [
                'title' => 'Month',
            ],

            'yAxis' => [
                'title' => 'Revenue',
            ],
        ];
    }

    public static function withWidgetData(): array
    {
        return [
            ...self::make(),

            'widgetData' => [
                'records' => [
                    [
                        'month' => 'Jan',
                        'revenue' => 120000,
                    ],
                    [
                        'month' => 'Feb',
                        'revenue' => 145000,
                    ],
                ],

                'pagination' => [
                    'enabled' => true,
                    'perPage' => 25,
                    'page' => 1,
                ],

                'loading' => [
                    'enabled' => true,
                    'message' => 'Loading chart...',
                ],

                'empty' => [
                    'message' => 'No revenue data.',
                    'icon' => 'chart',
                ],
            ],
        ];
    }

    public static function empty(): array
    {
        return [
            'type' => 'chart-widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],
        ];
    }

    public static function source(): array
    {
        return [
            'type' => 'chart-widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],

            'source' => UserSource::class,
        ];
    }

    public static function bar(): array
    {
        return [
            'type' => 'chart-widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],

            'chartType' => 'bar',

            'labels' => [
                'Jan',
                'Feb',
                'Mar',
            ],

            'series' => [
                [
                    'name' => 'Revenue',
                    'data' => [
                        100,
                        150,
                        175,
                    ],
                ],
            ],
        ];
    }

    public static function pie(): array
    {
        return [
            'type' => 'chart-widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],

            'chartType' => 'pie',

            'labels' => [
                'Desktop',
                'Mobile',
                'Tablet',
            ],

            'series' => [
                [
                    'name' => 'Visitors',
                    'data' => [
                        55,
                        30,
                        15,
                    ],
                ],
            ],
        ];
    }
}
