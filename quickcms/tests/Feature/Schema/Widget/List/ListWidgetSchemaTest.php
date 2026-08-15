<?php

declare(strict_types=1);

use App\Core\Schema\Widget\List\ListWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a list widget schema', function (): void {
    expect(
        ListWidgetSchema::make(),
    )->toBeInstanceOf(ListWidgetSchema::class);
});

it('sets item key', function (): void {
    $list = ListWidgetSchema::make()
        ->itemKey('id');

    expect($list->itemKeyValue())
        ->toBe('id');
});

it('sets item title', function (): void {
    $list = ListWidgetSchema::make()
        ->itemTitle('name');

    expect($list->itemTitleValue())
        ->toBe('name');
});

it('sets item description', function (): void {
    $list = ListWidgetSchema::make()
        ->itemDescription('email');

    expect($list->itemDescriptionValue())
        ->toBe('email');
});

it('sets item icon', function (): void {
    $list = ListWidgetSchema::make()
        ->itemIcon('avatar');

    expect($list->itemIconValue())
        ->toBe('avatar');
});

it('sets item value', function (): void {
    $list = ListWidgetSchema::make()
        ->itemValue('sales');

    expect($list->itemValueValue())
        ->toBe('sales');
});

it('sets item trend', function (): void {
    $list = ListWidgetSchema::make()
        ->itemTrend('trend');

    expect($list->itemTrendValue())
        ->toBe('trend');
});

it('sets item meta', function (): void {
    $list = ListWidgetSchema::make()
        ->itemMeta('orders');

    expect($list->itemMetaValue())
        ->toBe('orders');
});

it('sets static items', function (): void {
    $items = [
        [
            'id' => 1,
            'title' => 'John',
            'value' => '$100',
        ],
        [
            'id' => 2,
            'title' => 'Jane',
            'value' => '$200',
        ],
    ];

    $list = ListWidgetSchema::make()
        ->items($items);

    expect($list->itemsValue())
        ->toBe($items);
});

it('sets filters', function (): void {
    $filters = [
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
    ];

    $list = ListWidgetSchema::make()
        ->filters($filters);

    expect($list->filtersValue())
        ->toBe($filters);
});

it('inherits widget configuration', function (): void {
    $list = ListWidgetSchema::make()
        ->key('users')
        ->title('Users')
        ->description('User list')
        ->icon('heroicon-o-users')
        ->visible(false)
        ->width(6)
        ->columns([
            'default' => 1,
            'md' => 2,
        ])
        ->props([
            'divided' => true,
        ]);

    expect($list->widgetKey())
        ->toBe('users');

    expect($list->title())
        ->toBe('Users');

    expect($list->description())
        ->toBe('User list');

    expect($list->icon())
        ->toBe('heroicon-o-users');

    expect($list->isVisible())
        ->toBeFalse();

    expect($list->width())
        ->toBe(6);

    expect($list->columns())
        ->toBe([
            'default' => 1,
            'md' => 2,
        ]);

    expect($list->props())
        ->toBe([
            'divided' => true,
        ]);
});

it('inherits source', function (): void {
    $list = ListWidgetSchema::make()
        ->source(UserSource::class);

    expect($list->source())
        ->toBe(UserSource::class);
});

it('is immutable', function (): void {
    $list = ListWidgetSchema::make();

    $updated = $list
        ->key('sales-by-country')
        ->title('Sales by Countries')
        ->description('Monthly Sales Overview')
        ->itemKey('id')
        ->itemTitle('country')
        ->itemDescription('countryName')
        ->itemIcon('flag')
        ->itemValue('sales')
        ->itemTrend('trend')
        ->itemMeta('orders')
        ->items([
            [
                'id' => 1,
                'title' => 'John',
            ],
        ])
        ->filters([
            [
                'key' => 'period',
                'label' => 'Period',
            ],
        ])
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($list);

    expect($list->widgetKey())
        ->toBeNull();

    expect($list->title())
        ->toBe('');

    expect($list->description())
        ->toBe('');

    expect($list->itemKeyValue())
        ->toBeNull();

    expect($list->itemTitleValue())
        ->toBeNull();

    expect($list->itemDescriptionValue())
        ->toBeNull();

    expect($list->itemIconValue())
        ->toBeNull();

    expect($list->itemValueValue())
        ->toBeNull();

    expect($list->itemTrendValue())
        ->toBeNull();

    expect($list->itemMetaValue())
        ->toBeNull();

    expect($list->itemsValue())
        ->toBeNull();

    expect($list->filtersValue())
        ->toBeNull();

    expect($list->source())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('sales-by-country');

    expect($updated->title())
        ->toBe('Sales by Countries');

    expect($updated->description())
        ->toBe('Monthly Sales Overview');

    expect($updated->itemKeyValue())
        ->toBe('id');

    expect($updated->itemTitleValue())
        ->toBe('country');

    expect($updated->itemDescriptionValue())
        ->toBe('countryName');

    expect($updated->itemIconValue())
        ->toBe('flag');

    expect($updated->itemValueValue())
        ->toBe('sales');

    expect($updated->itemTrendValue())
        ->toBe('trend');

    expect($updated->itemMetaValue())
        ->toBe('orders');

    expect($updated->itemsValue())
        ->toBe([
            [
                'id' => 1,
                'title' => 'John',
            ],
        ]);

    expect($updated->filtersValue())
        ->toBe([
            [
                'key' => 'period',
                'label' => 'Period',
            ],
        ]);

    expect($updated->source())
        ->toBe(UserSource::class);
});
