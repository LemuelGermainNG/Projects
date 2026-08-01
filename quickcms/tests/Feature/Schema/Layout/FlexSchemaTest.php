<?php

declare(strict_types=1);

use App\Core\Schema\Layout\Flex\FlexSchema;
use App\Core\Support\Enums\Layout\Align;
use App\Core\Support\Enums\Layout\Direction;
use App\Core\Support\Enums\Layout\Justify;
use App\Core\Support\Enums\Layout\Wrap;

it('creates a flex schema', function (): void {
    expect(
        FlexSchema::make(),
    )->toBeInstanceOf(FlexSchema::class);
});

it('sets flex properties', function (): void {
    $flex = FlexSchema::make()
        ->direction(Direction::Row)
        ->justify(Justify::Between)
        ->align(Align::Center)
        ->wrap(Wrap::Wrap)
        ->gap(4);

    expect($flex->direction())
        ->toBe(Direction::Row);

    expect($flex->justify())
        ->toBe(Justify::Between);

    expect($flex->align())
        ->toBe(Align::Center);

    expect($flex->wrap())
        ->toBe(Wrap::Wrap);

    expect($flex->gap())
        ->toBe(4);
});

it('is immutable', function (): void {
    $flex = FlexSchema::make();

    $updated = $flex
        ->direction(Direction::Row)
        ->gap(8);

    expect($updated)
        ->not->toBe($flex);

    expect($flex->direction())
        ->toBe(Direction::Column);

    expect($flex->gap())
        ->toBeNull();

    expect($updated->direction())
        ->toBe(Direction::Row);

    expect($updated->gap())
        ->toBe(8);
});
