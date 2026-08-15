<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Calendar\CalendarWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a calendar widget schema', function (): void {
    expect(
        CalendarWidgetSchema::make(),
    )->toBeInstanceOf(CalendarWidgetSchema::class);
});

it('sets calendar views', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->views([
            'day',
            'week',
            'month',
            'agenda',
        ]);

    expect($calendar->viewsValue())
        ->toBe([
            'day',
            'week',
            'month',
            'agenda',
        ]);
});

it('sets default view', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->defaultView('week');

    expect($calendar->defaultViewValue())
        ->toBe('week');
});

it('sets current date', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->currentDate('2026-08-09');

    expect($calendar->currentDateValue())
        ->toBe('2026-08-09');
});

it('sets event key', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->eventKey('id');

    expect($calendar->eventKeyValue())
        ->toBe('id');
});

it('sets event title', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->eventTitle('title');

    expect($calendar->eventTitleValue())
        ->toBe('title');
});

it('sets event start', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->eventStart('start');

    expect($calendar->eventStartValue())
        ->toBe('start');
});

it('sets event end', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->eventEnd('end');

    expect($calendar->eventEndValue())
        ->toBe('end');
});

it('sets event all day', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->eventAllDay('all_day');

    expect($calendar->eventAllDayValue())
        ->toBe('all_day');
});

it('sets event color', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->eventColor('color');

    expect($calendar->eventColorValue())
        ->toBe('color');
});

it('inherits widget configuration', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->key('calendar')
        ->title('Calendar')
        ->description('Upcoming events')
        ->icon('heroicon-o-calendar')
        ->visible(false)
        ->width(12)
        ->columns([
            'default' => 1,
        ])
        ->props([
            'weekends' => true,
        ]);

    expect($calendar->widgetKey())
        ->toBe('calendar');

    expect($calendar->title())
        ->toBe('Calendar');

    expect($calendar->description())
        ->toBe('Upcoming events');

    expect($calendar->icon())
        ->toBe('heroicon-o-calendar');

    expect($calendar->isVisible())
        ->toBeFalse();

    expect($calendar->width())
        ->toBe(12);

    expect($calendar->columns())
        ->toBe([
            'default' => 1,
        ]);

    expect($calendar->props())
        ->toBe([
            'weekends' => true,
        ]);
});

it('inherits source', function (): void {
    $calendar = CalendarWidgetSchema::make()
        ->source(UserSource::class);

    expect($calendar->source())
        ->toBe(UserSource::class);
});

it('is immutable', function (): void {
    $calendar = CalendarWidgetSchema::make();

    $updated = $calendar
        ->key('calendar')
        ->title('Calendar')
        ->views([
            'day',
            'week',
            'month',
        ])
        ->defaultView('month')
        ->currentDate('2026-08-09')
        ->eventKey('id')
        ->eventTitle('title')
        ->eventStart('start')
        ->eventEnd('end')
        ->eventAllDay('all_day')
        ->eventColor('color')
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($calendar);

    expect($calendar->widgetKey())
        ->toBeNull();

    expect($calendar->title())
        ->toBe('');

    expect($calendar->viewsValue())
        ->toBeNull();

    expect($calendar->defaultViewValue())
        ->toBeNull();

    expect($calendar->currentDateValue())
        ->toBeNull();

    expect($calendar->eventKeyValue())
        ->toBeNull();

    expect($calendar->eventTitleValue())
        ->toBeNull();

    expect($calendar->eventStartValue())
        ->toBeNull();

    expect($calendar->eventEndValue())
        ->toBeNull();

    expect($calendar->eventAllDayValue())
        ->toBeNull();

    expect($calendar->eventColorValue())
        ->toBeNull();

    expect($calendar->source())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('calendar');

    expect($updated->title())
        ->toBe('Calendar');

    expect($updated->viewsValue())
        ->toBe([
            'day',
            'week',
            'month',
        ]);

    expect($updated->defaultViewValue())
        ->toBe('month');

    expect($updated->currentDateValue())
        ->toBe('2026-08-09');

    expect($updated->eventKeyValue())
        ->toBe('id');

    expect($updated->eventTitleValue())
        ->toBe('title');

    expect($updated->eventStartValue())
        ->toBe('start');

    expect($updated->eventEndValue())
        ->toBe('end');

    expect($updated->eventAllDayValue())
        ->toBe('all_day');

    expect($updated->eventColorValue())
        ->toBe('color');

    expect($updated->source())
        ->toBe(UserSource::class);
});
