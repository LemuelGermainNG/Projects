<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Widget\Calendar;

final class CalendarWidgetAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'calendar-widget',

            'title' => 'Calendar',

            'description' => 'Upcoming events',

            'icon' => 'heroicon-o-calendar',

            'visible' => true,

            'width' => 12,

            'columns' => [
                'default' => 1,
            ],

            'props' => [
                'weekends' => true,
            ],

            'key' => 'calendar',

            'source' => 'user',

            'views' => [
                'day',
                'week',
                'month',
                'agenda',
            ],

            'defaultView' => 'month',

            'currentDate' => '2026-08-09',

            'eventKey' => 'id',

            'eventTitle' => 'title',

            'eventStart' => 'start',

            'eventEnd' => 'end',

            'eventAllDay' => 'all_day',

            'eventColor' => 'color',
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
                        'title' => 'Team Meeting',
                        'start' => '2026-08-10T10:00:00',
                        'end' => '2026-08-10T11:00:00',
                        'all_day' => false,
                        'color' => 'blue',
                    ],
                    [
                        'id' => 2,
                        'title' => 'Product Review',
                        'start' => '2026-08-11T14:00:00',
                        'end' => '2026-08-11T15:30:00',
                        'all_day' => false,
                        'color' => 'green',
                    ],
                    [
                        'id' => 3,
                        'title' => 'Company Holiday',
                        'start' => '2026-08-15',
                        'end' => null,
                        'all_day' => true,
                        'color' => 'red',
                    ],
                ],

                'pagination' => [
                    'enabled' => true,
                    'perPage' => 25,
                    'page' => 1,
                ],

                'loading' => [
                    'enabled' => true,
                    'message' => 'Loading events...',
                ],

                'empty' => [
                    'message' => 'No events found.',
                    'icon' => 'calendar',
                ],
            ],
        ];
    }

    public static function empty(): array
    {
        return [
            'type' => 'calendar-widget',

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
            'type' => 'calendar-widget',

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
