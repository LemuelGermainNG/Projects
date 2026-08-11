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

            'source' => 'user',

            'tableColumns' => [
                [
                    'key' => 'id',
                    'label' => 'ID',
                    'sortable' => false,
                    'searchable' => false,
                    'width' => null,
                    'align' => 'start',
                    'format' => null,
                    'visible' => true,
                ],
                [
                    'key' => 'name',
                    'label' => 'Name',
                    'sortable' => false,
                    'searchable' => false,
                    'width' => null,
                    'align' => 'start',
                    'format' => null,
                    'visible' => true,
                ],
                [
                    'key' => 'email',
                    'label' => 'Email',
                    'sortable' => false,
                    'searchable' => false,
                    'width' => null,
                    'align' => 'start',
                    'format' => null,
                    'visible' => true,
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

            'source' => 'user',
        ];
    }

    public static function advanced(): array
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

            'source' => 'user',

            'tableColumns' => [
                [
                    'key' => 'id',
                    'label' => 'ID',
                    'sortable' => true,
                    'searchable' => false,
                    'width' => 100,
                    'align' => 'center',
                    'format' => 'number',
                    'visible' => true,
                ],
                [
                    'key' => 'name',
                    'label' => 'Name',
                    'sortable' => true,
                    'searchable' => true,
                    'width' => 240,
                    'align' => 'start',
                    'format' => 'text',
                    'visible' => true,
                ],
                [
                    'key' => 'email',
                    'label' => 'Email',
                    'sortable' => true,
                    'searchable' => true,
                    'width' => 320,
                    'align' => 'start',
                    'format' => 'email',
                    'visible' => true,
                ],
                [
                    'key' => 'created_at',
                    'label' => 'Created',
                    'sortable' => true,
                    'searchable' => false,
                    'width' => 180,
                    'align' => 'end',
                    'format' => 'date',
                    'visible' => false,
                ],
            ],

            'rowKey' => 'id',
        ];
    }
}
