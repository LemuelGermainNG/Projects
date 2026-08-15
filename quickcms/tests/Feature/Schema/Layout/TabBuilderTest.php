<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Tabs\TabSchema;
use App\Core\Support\Enum\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a tab schema', function (): void {
    $tab = TabSchema::make()
        ->label('Users')
        ->icon(Heroicons::Users)
        ->visible()
        ->disabled(false)
        ->child(
            HeaderSchema::make()
                ->title('Users'),
        )
        ->props([
            'lazy' => true,
        ]);

    expect(
        $tab->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
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

        'props' => [
            'lazy' => true,
        ],
    ]);
});
