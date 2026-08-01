<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Split\SplitSchema;
use App\Core\Support\Enums\Layout\Direction;

it('creates a split schema', function (): void {
    expect(
        SplitSchema::make(),
    )->toBeInstanceOf(SplitSchema::class);
});

it('sets split properties', function (): void {
    $split = SplitSchema::make()
        ->direction(Direction::Row)
        ->ratio(30)
        ->start(
            HeaderSchema::make()
                ->title('Navigation'),
        )
        ->end(
            HeaderSchema::make()
                ->title('Content'),
        )
        ->props([
            'resizable' => true,
        ]);

    expect($split->direction())
        ->toBe(Direction::Row);

    expect($split->ratio())
        ->toBe(30);

    expect($split->start())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($split->end())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($split->props())
        ->toBe([
            'resizable' => true,
        ]);
});

it('is immutable', function (): void {
    $split = SplitSchema::make();

    $updated = $split->ratio(25);

    expect($updated)
        ->not->toBe($split);

    expect($split->ratio())
        ->toBe(50);

    expect($updated->ratio())
        ->toBe(25);
});
