<?php

declare(strict_types=1);

use App\Core\Schema\Dashboard\Layout\DashboardColumnSchema;
use App\Core\Schema\Dashboard\Layout\DashboardRowSchema;

it('creates a dashboard row schema', function (): void {
    expect(
        DashboardRowSchema::make(),
    )->toBeInstanceOf(DashboardRowSchema::class);
});

it('sets dashboard row properties', function (): void {
    $column = DashboardColumnSchema::make();

    $row = DashboardRowSchema::make()
        ->gap(6)
        ->columns([
            $column,
        ])
        ->props([
            'align' => 'stretch',
        ]);

    expect($row->gapValue())
        ->toBe(6);

    expect($row->columns())
        ->toHaveCount(1);

    expect($row->columns()[0])
        ->toBe($column);

    expect($row->hasColumns())
        ->toBeTrue();

    expect($row->props())
        ->toBe([
            'align' => 'stretch',
        ]);
});

it('sets responsive row gap', function (): void {
    $row = DashboardRowSchema::make()
        ->gap([
            'default' => 4,
            'md' => 6,
            'lg' => 8,
        ]);

    expect($row->gapValue())
        ->toBe([
            'default' => 4,
            'md' => 6,
            'lg' => 8,
        ]);
});

it('is immutable', function (): void {
    $row = DashboardRowSchema::make();

    $updated = $row
        ->gap(6)
        ->columns([
            DashboardColumnSchema::make(),
        ])
        ->props([
            'align' => 'stretch',
        ]);

    expect($updated)
        ->not->toBe($row);

    expect($row->gapValue())
        ->toBeNull();

    expect($row->columns())
        ->toBe([]);

    expect($row->hasColumns())
        ->toBeFalse();

    expect($row->props())
        ->toBe([]);

    expect($updated->gapValue())
        ->toBe(6);

    expect($updated->columns())
        ->toHaveCount(1);

    expect($updated->props())
        ->toBe([
            'align' => 'stretch',
        ]);
});
