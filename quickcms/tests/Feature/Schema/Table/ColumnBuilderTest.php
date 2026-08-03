<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Table\Column\ColumnSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a column schema', function (): void {
    $column = ColumnSchema::make()
        ->label('Name')
        ->child(
            TextSchema::make()
                ->value('John Doe'),
        );

    expect(
        $column->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'column',

        'label' => 'Name',

        'description' => '',

        'child' => [
            'type' => 'text',

            'value' => 'John Doe',

            'color' => 'primary',

            'props' => [],
        ],

        'props' => [],
    ]);
});
