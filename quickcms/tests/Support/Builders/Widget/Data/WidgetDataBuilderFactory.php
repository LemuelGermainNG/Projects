<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\Data;

use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;

final class WidgetDataBuilderFactory
{
    public static function records(): WidgetDataSchema
    {
        return WidgetDataSchema::make()
            ->records(
                WidgetRecordsSchema::make()
                    ->records([
                        ['id' => 1, 'name' => 'John'],
                        ['id' => 2, 'name' => 'Jane'],
                    ]),
            );
    }

    public static function pagination(): WidgetDataSchema
    {
        return WidgetDataSchema::make()
            ->pagination(
                WidgetPaginationSchema::make()
                    ->enabled()
                    ->perPage(25)
                    ->page(2),
            );
    }

    public static function loading(): WidgetDataSchema
    {
        return WidgetDataSchema::make()
            ->loading(
                WidgetLoadingSchema::make()
                    ->enabled()
                    ->message('Loading...'),
            );
    }

    public static function empty(): WidgetDataSchema
    {
        return WidgetDataSchema::make()
            ->empty(
                WidgetEmptySchema::make()
                    ->message('No records found.')
                    ->icon('inbox'),
            );
    }

    public static function complete(): WidgetDataSchema
    {
        return WidgetDataSchema::make()
            ->records(
                WidgetRecordsSchema::make()
                    ->records([
                        ['id' => 1, 'name' => 'John'],
                        ['id' => 2, 'name' => 'Jane'],
                    ]),
            )
            ->pagination(
                WidgetPaginationSchema::make()
                    ->enabled()
                    ->perPage(25)
                    ->page(2),
            )
            ->loading(
                WidgetLoadingSchema::make()
                    ->enabled()
                    ->message('Loading...'),
            )
            ->empty(
                WidgetEmptySchema::make()
                    ->message('No records found.')
                    ->icon('inbox'),
            );
    }

    public static function emptyData(): WidgetDataSchema
    {
        return WidgetDataSchema::make();
    }
}
