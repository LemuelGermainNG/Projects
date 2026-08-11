<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Card\CardWidgetSchema;
use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use App\Core\Schema\Widget\Table\TableWidgetSchema;
use App\Core\Schema\Widget\WidgetSchema;
use Tests\Fixtures\Sources\UserSource;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a complete widget with source and data', function (): void {
    $widget = WidgetSchema::make()
        ->key('users')
        ->title('Users')
        ->description('Manage users')
        ->icon('users')
        ->source(UserSource::class)
        ->width(6)
        ->columns([
            'default' => 1,
            'md' => 2,
        ])
        ->data(
            WidgetDataSchema::make()
                ->records(
                    WidgetRecordsSchema::make()
                        ->records([
                            [
                                'id' => 1,
                                'name' => 'John',
                            ],
                            [
                                'id' => 2,
                                'name' => 'Jane',
                            ],
                        ]),
                )
                ->pagination(
                    WidgetPaginationSchema::make()
                        ->enabled()
                        ->perPage(25)
                        ->page(1),
                )
                ->loading(
                    WidgetLoadingSchema::make()
                        ->enabled()
                        ->message('Loading users...'),
                )
                ->empty(
                    WidgetEmptySchema::make()
                        ->message('No users found.')
                        ->icon('users'),
                ),
        );

    expect(
        $widget->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'widget',

        'title' => 'Users',

        'description' => 'Manage users',

        'icon' => 'users',

        'visible' => true,

        'width' => 6,

        'columns' => [
            'default' => 1,
            'md' => 2,
        ],

        'props' => [],

        'key' => 'users',

        'source' => 'user',

        'data' => [
            'records' => [
                [
                    'id' => 1,
                    'name' => 'John',
                ],
                [
                    'id' => 2,
                    'name' => 'Jane',
                ],
            ],

            'pagination' => [
                'enabled' => true,
                'perPage' => 25,
                'page' => 1,
            ],

            'loading' => [
                'enabled' => true,
                'message' => 'Loading users...',
            ],

            'empty' => [
                'message' => 'No users found.',
                'icon' => 'users',
            ],
        ],
    ]);
});

it('compiles a widget with a source and without data', function (): void {
    $widget = WidgetSchema::make()
        ->key('users')
        ->source(UserSource::class);

    expect(
        $widget->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'widget',

        'key' => 'users',

        'source' => 'user',
    ]);
});

it('compiles a widget with data and without a source', function (): void {
    $widget = WidgetSchema::make()
        ->key('users')
        ->data(
            WidgetDataSchema::make()
                ->records(
                    WidgetRecordsSchema::make()
                        ->records([
                            [
                                'id' => 1,
                                'name' => 'John',
                            ],
                        ]),
                ),
        );

    expect(
        $widget->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'widget',

        'key' => 'users',

        'data' => [
            'records' => [
                [
                    'id' => 1,
                    'name' => 'John',
                ],
            ],
        ],
    ]);
});


it('serializes a source using its public name', function (): void {
    $widget = WidgetSchema::make()
        ->key('users')
        ->source(UserSource::class);

    expect(
        $widget->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'source' => 'user',
    ]);
});


it('allows multiple widgets to consume the same source', function (): void {
    $table = TableWidgetSchema::make()
        ->key('latest-users')
        ->source(UserSource::class);

    $card = CardWidgetSchema::make()
        ->key('users')
        ->source(UserSource::class);

    $registry = BuilderRegistryFactory::make();

    $tableSchema = $table->compile($registry);
    $cardSchema = $card->compile($registry);

    expect($tableSchema)
        ->toMatchArray([
            'source' => 'user',
        ]);

    expect($cardSchema)
        ->toMatchArray([
            'source' => 'user',
        ]);
});
