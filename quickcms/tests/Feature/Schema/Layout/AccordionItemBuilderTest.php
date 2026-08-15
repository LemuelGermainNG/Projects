<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Accordion\AccordionItemSchema;
use App\Core\Schema\Layout\Stack\StackSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an accordion item schema', function (): void {
    $item = AccordionItemSchema::make()
        ->header(
            HeaderSchema::make()
                ->title('Users')
                ->description('Manage users'),
        )
        ->child(
            StackSchema::make(),
        )
        ->visible()
        ->disabled(false)
        ->props([
            'lazy' => true,
        ]);

    expect(
        $item->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'accordion-item',

        'header' => [
            'type' => 'header',
            'title' => 'Users',
            'description' => 'Manage users',
            'icon' => null,
            'props' => [],
        ],

        'visible' => true,

        'disabled' => false,

        'child' => [
            'type' => 'stack',
            'gap' => null,
            'children' => [],
            'props' => [],
        ],

        'props' => [
            'lazy' => true,
        ],
    ]);
});
