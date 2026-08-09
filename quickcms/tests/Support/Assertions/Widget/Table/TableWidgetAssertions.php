<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\Table;

use Tests\Fixtures\Sources\UserSource;

final class TableWidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'table-widget',

            'title' => 'Users',

            'description' => 'User list',

            'icon' => 'heroicon-o-users',

            'visible' => true,

            'width' => 12,

            'columns' => [
                'default' => 1,
            ],

            'props' => [
                'striped' => true,
            ],

            'key' => 'users',

            'source' => UserSource::class,

            'tableColumns' => [
                [
                    'key' => 'id',
                    'label' => 'ID',
                ],
                [
                    'key' => 'name',
                    'label' => 'Name',
                ],
                [
                    'key' => 'email',
                    'label' => 'Email',
                ],
            ],

            'rowKey' => 'id',
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
                    ],
                    [
                        'id' => 2,
                        'name' => 'Jane',
                        'email' => 'jane@example.com',
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
            'type' => 'table-widget',

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
            'type' => 'table-widget',

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
