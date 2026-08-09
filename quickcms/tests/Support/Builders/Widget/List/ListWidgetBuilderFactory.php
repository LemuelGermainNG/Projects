<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\List;

use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use App\Core\Schema\Widget\List\ListWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

final class ListWidgetBuilderFactory
{
    public static function make(): ListWidgetSchema
    {
        return ListWidgetSchema::make()
            ->key('users')
            ->title('Users')
            ->description('User list')
            ->icon('heroicon-o-users')
            ->visible(true)
            ->width(6)
            ->columns([
                'default' => 1,
                'md' => 2,
            ])
            ->source(UserSource::class)
            ->itemKey('id')
            ->itemTitle('name')
            ->itemDescription('email')
            ->itemIcon('avatar')
            ->props([
                'divided' => true,
            ]);
    }

    public static function withData(): ListWidgetSchema
    {
        return self::make()
            ->data(
                WidgetDataSchema::make()
                    ->records(
                        WidgetRecordsSchema::make()
                            ->records([
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
    }

    public static function empty(): ListWidgetSchema
    {
        return ListWidgetSchema::make();
    }

    public static function source(): ListWidgetSchema
    {
        return ListWidgetSchema::make()
            ->source(UserSource::class);
    }

    public static function statsList(): ListWidgetSchema
    {
        return ListWidgetSchema::make()
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
            ->filters([
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
            ])
            ->data(
                WidgetDataSchema::make()
                    ->records(
                        WidgetRecordsSchema::make()
                            ->records([
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
                            ]),
                    ),
            );
    }
}
