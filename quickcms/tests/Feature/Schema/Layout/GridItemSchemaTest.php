<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Grid\GridItemSchema;

it('creates a grid item schema', function (): void {
    expect(
        GridItemSchema::make(),
    )->toBeInstanceOf(GridItemSchema::class);
});

it('sets grid item properties', function (): void {
    $item = GridItemSchema::make()
        ->span(8)
        ->child(
            HeaderSchema::make()
                ->title('Users'),
        )
        ->props([
            'class' => 'col',
        ]);

    expect($item->span())
        ->toBe(8);

    expect($item->child())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($item->props())
        ->toBe([
            'class' => 'col',
        ]);
});

it('is immutable', function (): void {
    $item = GridItemSchema::make();

    $updated = $item->span(4);

    expect($updated)
        ->not->toBe($item);

    expect($item->span())
        ->toBe(12);

    expect($updated->span())
        ->toBe(4);
});
