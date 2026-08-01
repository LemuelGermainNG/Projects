<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Accordion\AccordionItemSchema;
use App\Core\Schema\Layout\Accordion\AccordionSchema;

it('creates an accordion schema', function (): void {
    expect(
        AccordionSchema::make(),
    )->toBeInstanceOf(AccordionSchema::class);
});

it('sets accordion items', function (): void {
    $accordion = AccordionSchema::make()
        ->children([
            AccordionItemSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Users'),
                ),

            AccordionItemSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Roles'),
                ),
        ])
        ->props([
            'multiple' => true,
        ]);

    expect($accordion->items())
        ->toHaveCount(2);

    expect($accordion->items()[0]->header()?->title())
        ->toBe('Users');

    expect($accordion->items()[1]->header()?->title())
        ->toBe('Roles');

    expect($accordion->props())
        ->toBe([
            'multiple' => true,
        ]);
});

it('is immutable', function (): void {
    $accordion = AccordionSchema::make();

    $updated = $accordion->children([
        AccordionItemSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Users'),
            ),
    ]);

    expect($updated)
        ->not->toBe($accordion);

    expect($accordion->items())
        ->toBe([]);

    expect($updated->items())
        ->toHaveCount(1);
});
