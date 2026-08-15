<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\Card;

use App\Core\Schema\Widget\Card\CardWidgetSchema;
use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use Tests\Fixtures\Sources\UserSource;

final class CardWidgetBuilderFactory
{
    public static function make(): CardWidgetSchema
    {
        return CardWidgetSchema::make()
            ->key('users')
            ->title('Users')
            ->description('Manage users')
            ->icon('heroicon-o-users')
            ->visible()
            ->width(6)
            ->columns([
                'default' => 1,
                'md' => 2,
            ])
            ->source(UserSource::class)
            ->props([
                'refresh' => true,
            ]);
    }

    public static function withData(): CardWidgetSchema
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

    public static function empty(): CardWidgetSchema
    {
        return CardWidgetSchema::make();
    }

    public static function source(): CardWidgetSchema
    {
        return CardWidgetSchema::make()
            ->source(UserSource::class);
    }
}
