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

        'sortable' => false,

        'searchable' => false,

        'toggleable' => false,

        'hidden' => false,

        'default' => null,

        'align' => 'stretch',

        'width' => null,

        'formatter' => null,

        'child' => [
            'type' => 'text',

            'value' => 'John Doe',

            'color' => 'primary',

            'props' => [],
        ],

        'props' => [],
    ]);
});


it('evaluates dynamic boolean column options', function (): void {
    $column = ColumnSchema::make()
        ->label('Name')
        ->sortable(fn (): bool => true)
        ->searchable(fn (): bool => true)
        ->toggleable(fn (): bool => true);

    expect($column->compile(BuilderRegistryFactory::make()))
        ->toMatchArray([
            'sortable' => true,
            'searchable' => true,
            'toggleable' => true,
        ]);
});
