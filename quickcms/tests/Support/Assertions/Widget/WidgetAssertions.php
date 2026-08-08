<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget;

use Tests\Fixtures\Sources\UserSource;

final class WidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'widget',

            'title' => 'Users',

            'description' => 'Manage users',

            'icon' => 'heroicon-o-users',

            'visible' => true,

            'width' => 6,

            'columns' => [
                'default' => 1,
                'md' => 2,
            ],

            'key' => 'users',

            'source' => UserSource::class,

            'props' => [
                'refresh' => true,
            ],
        ];
    }

    public static function key(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'key' => 'users',

            'props' => [],
        ];
    }

    public static function title(): array
    {
        return [
            'type' => 'widget',

            'title' => 'Users',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],
        ];
    }

    public static function description(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => 'Manage users',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],
        ];
    }

    public static function icon(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => 'heroicon-o-users',

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],
        ];
    }

    public static function visibility(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => false,

            'width' => null,

            'columns' => null,

            'props' => [],
        ];
    }

    public static function width(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => 6,

            'columns' => null,

            'props' => [],
        ];
    }

    public static function columns(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => [
                'default' => 1,
                'md' => 2,
            ],

            'props' => [],
        ];
    }

    public static function props(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [
                'refresh' => true,
            ],
        ];
    }

    public static function empty(): array
    {
        return [
            'type' => 'widget',

            'title' => '',

            'description' => '',

            'icon' => null,

            'visible' => true,

            'width' => null,

            'columns' => null,

            'props' => [],
        ];
    }
}
