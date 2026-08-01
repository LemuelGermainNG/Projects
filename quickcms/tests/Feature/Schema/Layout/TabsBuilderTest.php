<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Tabs\TabSchema;
use App\Core\Schema\Layout\Tabs\TabsSchema;
use App\Core\Support\Enums\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a tabs schema', function (): void {
    $tabs = TabsSchema::make()
        ->children([
            TabSchema::make()
                ->label('Users')
                ->icon(Heroicons::Users)
                ->visible(true)
                ->disabled(false)
                ->child(
                    HeaderSchema::make()
                        ->title('Users'),
                ),

            TabSchema::make()
                ->label('Roles')
                ->visible(true)
                ->disabled(false)
                ->child(
                    HeaderSchema::make()
                        ->title('Roles'),
                ),
        ])
        ->props([
            'lazy' => true,
        ]);

    expect(
        $tabs->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'tabs',

        'children' => [
            [
                'type' => 'tab',
                'label' => 'Users',
                'icon' => Heroicons::Users->value,
                'visible' => true,
                'disabled' => false,
                'child' => [
                    'type' => 'header',
                    'title' => 'Users',
                    'description' => null,
                    'icon' => null,
                    'props' => [],
                ],
                'props' => [],
            ],
            [
                'type' => 'tab',
                'label' => 'Roles',
                'icon' => null,
                'visible' => true,
                'disabled' => false,
                'child' => [
                    'type' => 'header',
                    'title' => 'Roles',
                    'description' => null,
                    'icon' => null,
                    'props' => [],
                ],
                'props' => [],
            ],
        ],

        'props' => [
            'lazy' => true,
        ],
    ]);
});
