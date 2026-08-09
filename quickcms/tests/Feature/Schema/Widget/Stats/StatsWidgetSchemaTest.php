<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Stats\StatsWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a stats schema', function (): void {
    expect(
        StatsWidgetSchema::make(),
    )->toBeInstanceOf(StatsWidgetSchema::class);
});

it('sets a stats value', function (): void {
    $stats = StatsWidgetSchema::make()
        ->value(1250);

    expect($stats->valueValue())
        ->toBe(1250);
});

it('sets a stats trend', function (): void {
    $stats = StatsWidgetSchema::make()
        ->trend(12.5);

    expect($stats->trendValue())
        ->toBe(12.5);
});

it('inherits widget configuration', function (): void {
    $stats = StatsWidgetSchema::make()
        ->key('users')
        ->title('Users')
        ->description('Total users')
        ->icon('heroicon-o-users')
        ->visible(false)
        ->width(4)
        ->columns([
            'default' => 1,
            'md' => 2,
        ])
        ->props([
            'refresh' => true,
        ]);

    expect($stats->widgetKey())
        ->toBe('users');

    expect($stats->title())
        ->toBe('Users');

    expect($stats->description())
        ->toBe('Total users');

    expect($stats->icon())
        ->toBe('heroicon-o-users');

    expect($stats->visible())
        ->toBeFalse();

    expect($stats->width())
        ->toBe(4);

    expect($stats->columns())
        ->toBe([
            'default' => 1,
            'md' => 2,
        ]);

    expect($stats->props())
        ->toBe([
            'refresh' => true,
        ]);
});

it('inherits source', function (): void {
    $stats = StatsWidgetSchema::make()
        ->source(UserSource::class);

    expect($stats->source())
        ->toBe(UserSource::class);
});

it('is immutable', function (): void {
    $stats = StatsWidgetSchema::make();

    $updated = $stats
        ->key('users')
        ->title('Users')
        ->value(1250)
        ->trend(12.5)
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($stats);

    expect($stats->widgetKey())
        ->toBeNull();

    expect($stats->title())
        ->toBe('');

    expect($stats->valueValue())
        ->toBeNull();

    expect($stats->trendValue())
        ->toBeNull();

    expect($stats->source())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('users');

    expect($updated->title())
        ->toBe('Users');

    expect($updated->valueValue())
        ->toBe(1250);

    expect($updated->trendValue())
        ->toBe(12.5);

    expect($updated->source())
        ->toBe(UserSource::class);
});
