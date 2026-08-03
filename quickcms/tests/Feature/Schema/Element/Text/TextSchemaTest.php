<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Support\Enums\Color;

it('creates a text schema', function (): void {
    expect(
        TextSchema::make(),
    )->toBeInstanceOf(TextSchema::class);
});

it('sets text properties', function (): void {
    $text = TextSchema::make()
        ->value('Hello World')
        ->color(Color::Primary)
        ->props([
            'className' => 'font-bold',
        ]);

    expect($text->value())
        ->toBe('Hello World');

    expect($text->color())
        ->toBe(Color::Primary);

    expect($text->props())
        ->toBe([
            'className' => 'font-bold',
        ]);
});

it('is immutable', function (): void {
    $text = TextSchema::make();

    $updated = $text
        ->value('Hello World')
        ->color(Color::Primary);

    expect($updated)
        ->not->toBe($text);

    expect($text->value())
        ->toBeNull();

    expect($updated->value())
        ->toBe('Hello World');

    expect($updated->color())
        ->toBe(Color::Primary);
});
