<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\Calendar;

use App\Core\Schema\Widget\Calendar\CalendarWidgetSchema;
use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use Tests\Fixtures\Sources\UserSource;

final class CalendarWidgetBuilderFactory
{
    public static function make(): CalendarWidgetSchema
    {
        return CalendarWidgetSchema::make()
            ->key('calendar')
            ->title('Calendar')
            ->description('Upcoming events')
            ->icon('heroicon-o-calendar')
            ->visible(true)
            ->width(12)
            ->columns([
                'default' => 1,
            ])
            ->source(UserSource::class)
            ->views([
                'day',
                'week',
                'month',
                'agenda',
            ])
            ->defaultView('month')
            ->currentDate('2026-08-09')
            ->eventKey('id')
            ->eventTitle('title')
            ->eventStart('start')
            ->eventEnd('end')
            ->eventAllDay('all_day')
            ->eventColor('color')
            ->props([
                'weekends' => true,
            ]);
    }

    public static function withData(): CalendarWidgetSchema
    {
        return self::make()
            ->data(
                WidgetDataSchema::make()
                    ->records(
                        WidgetRecordsSchema::make()
                            ->records([
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
                            ->message('Loading events...'),
                    )
                    ->empty(
                        WidgetEmptySchema::make()
                            ->message('No events found.')
                            ->icon('calendar'),
                    ),
            );
    }

    public static function empty(): CalendarWidgetSchema
    {
        return CalendarWidgetSchema::make();
    }

    public static function source(): CalendarWidgetSchema
    {
        return CalendarWidgetSchema::make()
            ->source(UserSource::class);
    }
}
