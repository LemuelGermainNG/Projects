<?php

declare(strict_types=1);

use App\Core\Schema\Dashboard\Layout\DashboardLayoutSchema;
use App\Core\Schema\Dashboard\Layout\DashboardRowSchema;

it('creates a dashboard layout schema', function (): void {
    expect(
        DashboardLayoutSchema::make(),
    )->toBeInstanceOf(DashboardLayoutSchema::class);
});

it('sets dashboard layout properties', function (): void {
    $row = DashboardRowSchema::make();

    $layout = DashboardLayoutSchema::make()
        ->columns(12)
        ->gap(6)
        ->rows([
            $row,
        ])
        ->props([
            'fluid' => true,
        ]);

    expect($layout->columnsValue())
        ->toBe(12);

    expect($layout->gapValue())
        ->toBe(6);

    expect($layout->rows())
        ->toHaveCount(1);

    expect($layout->rows()[0])
        ->toBe($row);

    expect($layout->props())
        ->toBe([
            'fluid' => true,
        ]);

    expect($layout->hasRows())
        ->toBeTrue();
});

it('sets responsive layout columns', function (): void {
    $layout = DashboardLayoutSchema::make()
        ->columns([
            'default' => 1,
            'md' => 2,
            'lg' => 3,
        ]);

    expect($layout->columnsValue())
        ->toBe([
            'default' => 1,
            'md' => 2,
            'lg' => 3,
        ]);
});

it('is immutable', function (): void {
    $layout = DashboardLayoutSchema::make();

    $updated = $layout
        ->columns(12)
        ->gap(6)
        ->rows([
            DashboardRowSchema::make(),
        ])
        ->props([
            'fluid' => true,
        ]);

    expect($updated)
        ->not->toBe($layout);

    expect($layout->columnsValue())
        ->toBeNull();

    expect($layout->gapValue())
        ->toBeNull();

    expect($layout->rows())
        ->toBe([]);

    expect($layout->hasRows())
        ->toBeFalse();

    expect($layout->props())
        ->toBe([]);

    expect($updated->columnsValue())
        ->toBe(12);

    expect($updated->gapValue())
        ->toBe(6);

    expect($updated->rows())
        ->toHaveCount(1);

    expect($updated->props())
        ->toBe([
            'fluid' => true,
        ]);
});

it('accepts empty rows', function (): void {
    $layout = DashboardLayoutSchema::make()
        ->rows([]);

    expect($layout->rows())
        ->toBe([]);

    expect($layout->hasRows())
        ->toBeFalse();
});
