<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\Card;

use Tests\Fixtures\Sources\UserSource;

final class CardWidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'card-widget',

            'title' => 'Users',

            'description' => 'Manage users',

            'icon' => 'heroicon-o-users',

            'visible' => true,

            'width' => 6,

            'columns' => [
                'default' => 1,
                'md' => 2,
            ],

            'props' => [
                'refresh' => true,
            ],

            'key' => 'users',

            'source' => UserSource::class,
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
            'type' => 'card-widget',

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
            'type' => 'card-widget',

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
}
