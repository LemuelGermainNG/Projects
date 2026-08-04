<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Number\NumberInputSchema;

it('creates a number input', function (): void {
    expect(
        NumberInputSchema::make(),
    )->toBeInstanceOf(NumberInputSchema::class);
});

it('sets properties', function (): void {
    $input = NumberInputSchema::make()
        ->value(42)
        ->min(0)
        ->max(100)
        ->step(1);

    expect($input->value())
        ->toBe(42);

    expect($input->min())
        ->toBe(0);

    expect($input->max())
        ->toBe(100);

    expect($input->step())
        ->toBe(1);
});

it('is immutable', function (): void {
    $input = NumberInputSchema::make();

    $updated = $input
        ->min(10);

    expect($updated)
        ->not->toBe($input);

    expect($input->min())
        ->toBeNull();

    expect($updated->min())
        ->toBe(10);
});
