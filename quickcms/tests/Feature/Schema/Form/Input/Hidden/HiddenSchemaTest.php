<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Hidden\HiddenSchema;

it('creates a hidden input', function (): void {
    expect(
        HiddenSchema::make(),
    )->toBeInstanceOf(
        HiddenSchema::class,
    );
});

it('sets hidden properties', function (): void {
    $input = HiddenSchema::make()
        ->value(15);

    expect(
        $input->value(),
    )->toBe(15);
});
