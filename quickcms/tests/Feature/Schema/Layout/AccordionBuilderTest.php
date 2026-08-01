<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Accordion\AccordionItemSchema;
use App\Core\Schema\Layout\Accordion\AccordionSchema;
use App\Core\Schema\Layout\Stack\StackSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an accordion schema', function (): void {
    $accordion = AccordionSchema::make()
        ->children([
            AccordionItemSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Users'),
                )
                ->child(
                    StackSchema::make(),
                ),

            AccordionItemSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Roles'),
                )
                ->child(
                    StackSchema::make(),
                ),
        ])
        ->props([
            'multiple' => true,
        ]);

    expect(
        $accordion->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'accordion',

        'children' => [
            [
                'type' => 'accordion-item',

                'header' => [
                    'type' => 'header',
                    'title' => 'Users',
                    'description' => null,
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

                'props' => [],
            ],

            [
                'type' => 'accordion-item',

                'header' => [
                    'type' => 'header',
                    'title' => 'Roles',
                    'description' => null,
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

                'props' => [],
            ],
        ],

        'props' => [
            'multiple' => true,
        ],
    ]);
});
