<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Stack\StackSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a stack schema', function (): void {
    $stack = StackSchema::make()
        ->gap(4)
        ->children([
            HeaderSchema::make()
                ->title('Users'),
        ])
        ->props([
            'fluid' => true,
        ]);

    expect(
        $stack->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'stack',

        'gap' => 4,

        'children' => [
            [
                'type' => 'header',
                'title' => 'Users',
                'description' => null,
                'icon' => null,
                'props' => [],
            ],
        ],

        'props' => [
            'fluid' => true,
        ],
    ]);
});
