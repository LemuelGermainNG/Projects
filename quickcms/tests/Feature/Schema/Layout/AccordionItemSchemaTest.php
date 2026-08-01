<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Accordion\AccordionItemSchema;
use App\Core\Schema\Layout\Stack\StackSchema;

it('creates an accordion item schema', function (): void {
    expect(
        AccordionItemSchema::make(),
    )->toBeInstanceOf(AccordionItemSchema::class);
});

it('sets accordion item properties', function (): void {
    $item = AccordionItemSchema::make()
        ->header(
            HeaderSchema::make()
                ->title('Users')
                ->description('Manage users'),
        )
        ->child(
            StackSchema::make(),
        )
        ->visible(true)
        ->disabled(false)
        ->props([
            'lazy' => true,
        ]);

    expect($item->header())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($item->child())
        ->toBeInstanceOf(StackSchema::class);

    expect($item->visible())
        ->toBeTrue();

    expect($item->disabled())
        ->toBeFalse();

    expect($item->props())
        ->toBe([
            'lazy' => true,
        ]);
});

it('is immutable', function (): void {
    $item = AccordionItemSchema::make();

    $updated = $item->visible(false);

    expect($updated)
        ->not->toBe($item);

    expect($item->visible())
        ->toBeTrue();

    expect($updated->visible())
        ->toBeFalse();
});
