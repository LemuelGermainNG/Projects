<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Table\Column\ColumnSchema;
use App\Core\Schema\Table\TableSchema;
use Tests\Fixtures\Sources\UserSource;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a table schema', function (): void {
    $table = TableSchema::make()
        ->source(UserSource::class)
        ->schema([
            ColumnSchema::make()
                ->label('Name')
                ->child(
                    TextSchema::make()
                        ->value('John Doe'),
                ),
        ]);

    expect(
        $table->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'table',

        'source' => UserSource::class,

        'schema' => [
            [
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
            ],
        ],

        'props' => [],
    ]);
});
