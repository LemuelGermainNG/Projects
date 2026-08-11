<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Calendar\CalendarWidgetAssertions;
use Tests\Support\Builders\Widget\Calendar\CalendarWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a calendar widget', function (): void {
    expect(
        CalendarWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CalendarWidgetAssertions::make(),
    );
});

it('compiles a calendar widget with data', function (): void {
    expect(
        CalendarWidgetBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CalendarWidgetAssertions::withData(),
    );
});

it('compiles an empty calendar widget', function (): void {
    expect(
        CalendarWidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CalendarWidgetAssertions::empty(),
    );
});

it('compiles a calendar widget source', function (): void {
    expect(
        CalendarWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CalendarWidgetAssertions::source(),
    );
});

it('compiles calendar event mapping', function (): void {
    $calendar = \App\Core\Schema\Widget\Calendar\CalendarWidgetSchema::make()
        ->eventKey('id')
        ->eventTitle('name')
        ->eventStart('starts_at')
        ->eventEnd('ends_at')
        ->eventAllDay('all_day')
        ->eventColor('color');

    $compiled = $calendar->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['eventKey'])
        ->toBe('id');

    expect($compiled['eventTitle'])
        ->toBe('name');

    expect($compiled['eventStart'])
        ->toBe('starts_at');

    expect($compiled['eventEnd'])
        ->toBe('ends_at');

    expect($compiled['eventAllDay'])
        ->toBe('all_day');

    expect($compiled['eventColor'])
        ->toBe('color');
});
