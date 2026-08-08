<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\Data;

final class WidgetDataAssertions
{
    public static function records(): array
    {
        return [
            'records' => [
                ['id' => 1, 'name' => 'John'],
                ['id' => 2, 'name' => 'Jane'],
            ],
        ];
    }

    public static function pagination(): array
    {
        return [
            'pagination' => [
                'enabled' => true,
                'perPage' => 25,
                'page' => 2,
            ],
        ];
    }

    public static function loading(): array
    {
        return [
            'loading' => [
                'enabled' => true,
                'message' => 'Loading...',
            ],
        ];
    }

    public static function empty(): array
    {
        return [
            'empty' => [
                'message' => 'No records found.',
                'icon' => 'inbox',
            ],
        ];
    }

    public static function complete(): array
    {
        return [
            'records' => [
                ['id' => 1, 'name' => 'John'],
                ['id' => 2, 'name' => 'Jane'],
            ],

            'pagination' => [
                'enabled' => true,
                'perPage' => 25,
                'page' => 2,
            ],

            'loading' => [
                'enabled' => true,
                'message' => 'Loading...',
            ],

            'empty' => [
                'message' => 'No records found.',
                'icon' => 'inbox',
            ],
        ];
    }

    public static function emptyData(): array
    {
        return [];
    }
}
