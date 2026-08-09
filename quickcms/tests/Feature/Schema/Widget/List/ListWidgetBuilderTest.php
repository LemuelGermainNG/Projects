<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\List\ListWidgetAssertions;
use Tests\Support\Builders\Widget\List\ListWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a list widget', function (): void {
    expect(
        ListWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'type' => 'list-widget',

        'title' => 'Users',

        'description' => 'User list',

        'icon' => 'heroicon-o-users',

        'visible' => true,

        'width' => 6,

        'columns' => [
            'default' => 1,
            'md' => 2,
        ],

        'props' => [
            'divided' => true,
        ],

        'key' => 'users',

        'source' => Tests\Fixtures\Sources\UserSource::class,

        'itemKey' => 'id',

        'itemTitle' => 'name',

        'itemDescription' => 'email',

        'itemIcon' => 'avatar',
    ]);
});

it('compiles a list widget with data', function (): void {
    expect(
        ListWidgetBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'type' => 'list-widget',

        'title' => 'Users',

        'description' => 'User list',

        'icon' => 'heroicon-o-users',

        'visible' => true,

        'width' => 6,

        'columns' => [
            'default' => 1,
            'md' => 2,
        ],

        'props' => [
            'divided' => true,
        ],

        'key' => 'users',

        'source' => Tests\Fixtures\Sources\UserSource::class,

        'itemKey' => 'id',

        'itemTitle' => 'name',

        'itemDescription' => 'email',

        'itemIcon' => 'avatar',

        'data' => [
            'records' => [
                [
                    'id' => 1,
                    'name' => 'John',
                    'email' => 'john@example.com',
                    'avatar' => 'john.jpg',
                ],
                [
                    'id' => 2,
                    'name' => 'Jane',
                    'email' => 'jane@example.com',
                    'avatar' => 'jane.jpg',
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

it('compiles an empty list widget', function (): void {
    expect(
        ListWidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ListWidgetAssertions::empty(),
    );
});

it('compiles a list widget source', function (): void {
    expect(
        ListWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ListWidgetAssertions::source(),
    );
});

it('compiles a stats list widget', function (): void {
    expect(
        ListWidgetBuilderFactory::statsList()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'type' => 'list-widget',

        'title' => 'Sales by Countries',

        'description' => 'Monthly Sales Overview',

        'itemKey' => 'id',

        'itemTitle' => 'country',

        'itemDescription' => 'countryName',

        'itemIcon' => 'flag',

        'itemValue' => 'sales',

        'itemTrend' => 'trend',

        'itemMeta' => 'orders',

        'filters' => [
            [
                'key' => 'period',
                'label' => 'Period',
                'options' => [
                    [
                        'value' => '28-days',
                        'label' => 'Last 28 Days',
                    ],
                    [
                        'value' => 'month',
                        'label' => 'Last Month',
                    ],
                    [
                        'value' => 'year',
                        'label' => 'Last Year',
                    ],
                ],
                'default' => '28-days',
            ],
        ],

        'data' => [
            'records' => [
                [
                    'id' => 'us',
                    'country' => 'United States of America',
                    'countryName' => 'United States of America',
                    'flag' => 'us',
                    'sales' => '$8,564k',
                    'trend' => -7.0,
                    'orders' => '420k',
                ],
                [
                    'id' => 'ca',
                    'country' => 'Canada',
                    'countryName' => 'Canada',
                    'flag' => 'ca',
                    'sales' => '$9,120k',
                    'trend' => 6.3,
                    'orders' => '380k',
                ],
                [
                    'id' => 'au',
                    'country' => 'Australia',
                    'countryName' => 'Australia',
                    'flag' => 'au',
                    'sales' => '$6,800k',
                    'trend' => 5.0,
                    'orders' => '215k',
                ],
                [
                    'id' => 'de',
                    'country' => 'Germany',
                    'countryName' => 'Germany',
                    'flag' => 'de',
                    'sales' => '$7,450k',
                    'trend' => 4.8,
                    'orders' => '120k',
                ],
                [
                    'id' => 'gb',
                    'country' => 'England',
                    'countryName' => 'England',
                    'flag' => 'gb',
                    'sales' => '$10,200k',
                    'trend' => -6.3,
                    'orders' => '75k',
                ],
            ],
        ],
    ]);
});
