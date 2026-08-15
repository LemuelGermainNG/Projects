<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget\Table;

use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use App\Core\Schema\Widget\Table\TableWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

final class TableWidgetBuilderFactory
{
    public static function make(): TableWidgetSchema
    {
        return TableWidgetSchema::make()
            ->key('users')
            ->title('Users')
            ->description('User list')
            ->icon('heroicon-o-users')
            ->visible()
            ->width(12)
            ->columns([
                'default' => 1,
            ])
            ->source(UserSource::class)
            ->tableColumns([
                [
                    'key' => 'id',
                    'label' => 'ID',
                ],
                [
                    'key' => 'name',
                    'label' => 'Name',
                ],
                [
                    'key' => 'email',
                    'label' => 'Email',
                ],
            ])
            ->rowKey('id')
            ->props([
                'striped' => true,
            ]);
    }

    public static function withData(): TableWidgetSchema
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
                                ],
                                [
                                    'id' => 2,
                                    'name' => 'Jane',
                                    'email' => 'jane@example.com',
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

    public static function empty(): TableWidgetSchema
    {
        return TableWidgetSchema::make();
    }

    public static function source(): TableWidgetSchema
    {
        return TableWidgetSchema::make()
            ->source(UserSource::class);
    }

    public static function advanced(): TableWidgetSchema
    {
        return TableWidgetSchema::make()
            ->key('users')
            ->title('Users')
            ->description('User list')
            ->icon('heroicon-o-users')
            ->visible()
            ->width(12)
            ->columns([
                'default' => 1,
            ])
            ->source(UserSource::class)
            ->tableColumns([
                [
                    'key' => 'id',
                    'label' => 'ID',
                    'sortable' => true,
                    'searchable' => false,
                    'width' => 100,
                    'align' => 'center',
                    'format' => 'number',
                    'visible' => true,
                ],
                [
                    'key' => 'name',
                    'label' => 'Name',
                    'sortable' => true,
                    'searchable' => true,
                    'width' => 240,
                    'align' => 'start',
                    'format' => 'text',
                    'visible' => true,
                ],
                [
                    'key' => 'email',
                    'label' => 'Email',
                    'sortable' => true,
                    'searchable' => true,
                    'width' => 320,
                    'align' => 'start',
                    'format' => 'email',
                    'visible' => true,
                ],
                [
                    'key' => 'created_at',
                    'label' => 'Created',
                    'sortable' => true,
                    'searchable' => false,
                    'width' => 180,
                    'align' => 'end',
                    'format' => 'date',
                    'visible' => false,
                ],
            ])
            ->rowKey('id')
            ->props([
                'striped' => true,
            ]);
    }
}
