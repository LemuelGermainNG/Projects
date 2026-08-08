<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Grid\GridItemSchema;
use App\Core\Schema\Layout\Grid\GridSchema;

it('creates a grid schema', function (): void {
    expect(
        GridSchema::make(),
    )->toBeInstanceOf(GridSchema::class);
});

it('sets grid properties', function (): void {
    $grid = GridSchema::make()
        ->columns(12)
        ->gap(6)
        ->children([
            GridItemSchema::make()
                ->span(6)
                ->child(
                    HeaderSchema::make()
                        ->title('Users'),
                ),
        ])
        ->props([
            'fluid' => true,
        ]);

    expect($grid->columns())
        ->toBe(12);

    expect($grid->gap())
        ->toBe(6);

    expect($grid->children())
        ->toHaveCount(1);

    expect($grid->props())
        ->toBe([
            'fluid' => true,
        ]);
});

it('is immutable', function (): void {
    $grid = GridSchema::make()
        ->columns(12)
        ->gap(6);

    $updated = $grid
        ->columns(24)
        ->gap(8);

    expect($updated)
        ->not->toBe($grid);

    expect($grid->columns())
        ->toBe(12);

    expect($grid->gap())
        ->toBe(6);

    expect($updated->columns())
        ->toBe(24);

    expect($updated->gap())
        ->toBe(8);
});
