<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\Stats;

use Tests\Fixtures\Sources\UserSource;

final class StatsWidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'stats-widget',

            'title' => 'Users',

            'description' => 'Total users',

            'icon' => 'heroicon-o-users',

            'visible' => true,

            'width' => 4,

            'columns' => [
                'default' => 1,
                'md' => 2,
            ],

            'props' => [
                'refresh' => true,
            ],

            'key' => 'users',

            'source' => 'user',

            'value' => 1250,

            'trend' => 12.5,
        ];
    }

    public static function withData(): array
    {
        return [
            ...self::make(),

            'data' => [
                'records' => [
                    [
                        'id' => 1,
                        'name' => 'John',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Jane',
                    ],
                ],

                'pagination' => [
                    'enabled' => true,
                    'perPage' => 25,
                    'page' => 1,
                ],

                'loading' => [
                    'enabled' => true,
                    'message' => 'Loading users...',
                ],

                'empty' => [
                    'message' => 'No users found.',
                    'icon' => 'users',
                ],
            ],
        ];
    }

    public static function empty(): array
    {
        return [
            'type' => 'stats-widget',

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
            'type' => 'stats-widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],

            'source' => 'user',
        ];
    }
}
