<?php

declare(strict_types=1);

use App\Core\Schema\Layout\Stack\StackSchema;

it('creates a stack schema', function (): void {
    expect(
        StackSchema::make(),
    )->toBeInstanceOf(StackSchema::class);
});

it('sets stack properties', function (): void {
    $stack = StackSchema::make()
        ->gap(4)
        ->props([
            'fluid' => true,
        ]);

    expect($stack->gap())
        ->toBe(4);

    expect($stack->props())
        ->toBe([
            'fluid' => true,
        ]);
});

it('is immutable', function (): void {
    $stack = StackSchema::make();

    $updated = $stack->gap(6);

    expect($updated)
        ->not->toBe($stack);

    expect($stack->gap())
        ->toBeNull();

    expect($updated->gap())
        ->toBe(6);
});
