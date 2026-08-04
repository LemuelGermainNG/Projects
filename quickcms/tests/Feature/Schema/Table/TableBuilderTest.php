<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Element\Filter\FilterSchema;
use App\Core\Schema\Element\Pagination\PaginationSchema;
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
        ])

        ->filters([
            FilterSchema::make()
                ->name('status')
                ->label('Status')
                ->child(
                    TextSchema::make()
                        ->value('Active'),
                ),
        ])

        ->headerActions([
            ActionSchema::make()
                ->label('Create'),
        ])

        ->rowActions([
            ActionSchema::make()
                ->label('Edit'),
        ])

        ->bulkActions([
            ActionSchema::make()
                ->label('Delete selected'),
        ])

        ->pagination(
            PaginationSchema::make()
                ->perPage(25),
        );

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
            ],
        ],

        'filters' => [
            [
                'type' => 'filter',

                'name' => 'status',

                'label' => 'Status',

                'description' => '',

                'child' => [
                    'type' => 'text',

                    'value' => 'Active',

                    'color' => 'primary',

                    'props' => [],
                ],

                'props' => [],
            ],
        ],

        'headerActions' => [
            ActionSchema::make()
                ->label('Create')
                ->compile(
                    BuilderRegistryFactory::make(),
                ),
        ],

        'rowActions' => [
            ActionSchema::make()
                ->label('Edit')
                ->compile(
                    BuilderRegistryFactory::make(),
                ),
        ],

        'bulkActions' => [
            ActionSchema::make()
                ->label('Delete selected')
                ->compile(
                    BuilderRegistryFactory::make(),
                ),
        ],

        'pagination' => [
            'type' => 'pagination',

            'enabled' => true,

            'perPage' => 25,

            'options' => [
                15,
                30,
                50,
                100,
            ],

            'simple' => false,
        ],

        'props' => [],
    ]);
});
