<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Phone\PhoneInputSchema;

it('creates a phone input', function (): void {
    expect(
        PhoneInputSchema::make(),
    )->toBeInstanceOf(PhoneInputSchema::class);
});

it('sets properties', function (): void {
    $input = PhoneInputSchema::make()
        ->value('+33 6 12 34 56 78')
        ->placeholder('Phone number')
        ->mask('+99 9 99 99 99 99');

    expect($input->value())
        ->toBe('+33 6 12 34 56 78');

    expect($input->placeholder())
        ->toBe('Phone number');

    expect($input->mask())
        ->toBe('+99 9 99 99 99 99');
});

it('is immutable', function (): void {
    $input = PhoneInputSchema::make();

    $updated = $input->mask('+99 9 99 99 99 99');

    expect($updated)
        ->not->toBe($input);

    expect($input->mask())
        ->toBeNull();

    expect($updated->mask())
        ->toBe('+99 9 99 99 99 99');
});
