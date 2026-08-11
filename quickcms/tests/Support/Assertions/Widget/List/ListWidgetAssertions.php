<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\List;

final class ListWidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'list-widget',

            'title' => 'Users',

            'description' => 'User list',

            'icon' => 'heroicon-o-users',

            'visible' => true,

            'width' => 6,

            'columns' => [
                'default' => 1,
                'md' => 2,
            ],

            'props' => [
                'divided' => true,
            ],

            'key' => 'users',

            'source' => 'user',

            'itemKey' => 'id',

            'itemTitle' => 'name',

            'itemDescription' => 'email',

            'itemIcon' => 'avatar',
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
                        'email' => 'john@example.com',
                        'avatar' => 'john.jpg',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Jane',
                        'email' => 'jane@example.com',
                        'avatar' => 'jane.jpg',
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
            'type' => 'list-widget',

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
            'type' => 'list-widget',

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
