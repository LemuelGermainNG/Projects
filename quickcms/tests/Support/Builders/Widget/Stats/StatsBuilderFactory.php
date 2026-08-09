<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\Stats;

use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use App\Core\Schema\Widget\Stats\StatsSchema;
use Tests\Fixtures\Sources\UserSource;

final class StatsBuilderFactory
{
    public static function make(): StatsSchema
    {
        return StatsSchema::make()
            ->key('users')
            ->title('Users')
            ->description('Total users')
            ->icon('heroicon-o-users')
            ->visible(true)
            ->width(4)
            ->columns([
                'default' => 1,
                'md' => 2,
            ])
            ->value(1250)
            ->trend(12.5)
            ->source(UserSource::class)
            ->props([
                'refresh' => true,
            ]);
    }

    public static function withData(): StatsSchema
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
    }

    public static function empty(): StatsSchema
    {
        return StatsSchema::make();
    }

    public static function source(): StatsSchema
    {
        return StatsSchema::make()
            ->source(UserSource::class);
    }
}
