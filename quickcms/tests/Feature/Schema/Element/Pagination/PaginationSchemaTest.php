<?php

declare(strict_types=1);

use App\Core\Schema\Element\Pagination\PaginationSchema;

it('creates a pagination schema', function (): void {
    expect(
        PaginationSchema::make(),
    )->toBeInstanceOf(PaginationSchema::class);
});

it('sets pagination properties', function (): void {
    $pagination = PaginationSchema::make()
        ->perPage(25)
        ->options([
            10,
            25,
            50,
        ])
        ->simple();

    expect($pagination->isEnabled())
        ->toBeTrue();

    expect($pagination->perPage())
        ->toBe(25);

    expect($pagination->options())
        ->toBe([
            10,
            25,
            50,
        ]);

    expect($pagination->isSimple())
        ->toBeTrue();
});

it('is immutable', function (): void {
    $pagination = PaginationSchema::make();

    $updated = $pagination
        ->perPage(25);

    expect($updated)
        ->not->toBe($pagination);

    expect($pagination->perPage())
        ->toBe(15);

    expect($updated->perPage())
        ->toBe(25);
});

it('can be disabled', function (): void {
    $pagination = PaginationSchema::make()
        ->disable();

    expect($pagination->isEnabled())
        ->toBeFalse();
});
