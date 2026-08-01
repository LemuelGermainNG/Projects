<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Layout\Stack\StackSchema;

it('creates a card schema', function (): void {
    expect(
        CardSchema::make(),
    )->toBeInstanceOf(CardSchema::class);
});

it('sets card properties', function (): void {
    $card = CardSchema::make()
        ->header(
            HeaderSchema::make()
                ->title('Statistics')
                ->description('Monthly overview'),
        )
        ->child(
            StackSchema::make(),
        )
        ->props([
            'shadow' => true,
        ]);

    expect($card->header())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($card->child())
        ->toBeInstanceOf(StackSchema::class);

    expect($card->props())
        ->toBe([
            'shadow' => true,
        ]);
});

it('is immutable', function (): void {
    $card = CardSchema::make();

    $updated = $card
        ->header(
            HeaderSchema::make()
                ->title('Statistics'),
        );

    expect($updated)
        ->not->toBe($card);

    expect($card->header())
        ->toBeNull();

    expect($updated->header())
        ->toBeInstanceOf(HeaderSchema::class);
});
