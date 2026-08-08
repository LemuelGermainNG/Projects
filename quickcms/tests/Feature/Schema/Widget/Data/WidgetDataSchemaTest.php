<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;

it('creates a widget data schema', function (): void {
    expect(
        WidgetDataSchema::make(),
    )->toBeInstanceOf(WidgetDataSchema::class);
});

it('sets records', function (): void {
    $schema = WidgetDataSchema::make()
        ->records(
            WidgetRecordsSchema::make()
                ->records([
                    ['id' => 1],
                ]),
        );

    expect($schema->recordsSchema())
        ->toBeInstanceOf(WidgetRecordsSchema::class);
});

it('sets pagination', function (): void {
    $schema = WidgetDataSchema::make()
        ->pagination(
            WidgetPaginationSchema::make()
                ->enabled(),
        );

    expect($schema->paginationSchema())
        ->toBeInstanceOf(WidgetPaginationSchema::class);
});

it('sets loading', function (): void {
    $schema = WidgetDataSchema::make()
        ->loading(
            WidgetLoadingSchema::make()
                ->enabled(),
        );

    expect($schema->loadingSchema())
        ->toBeInstanceOf(WidgetLoadingSchema::class);
});

it('sets empty state', function (): void {
    $schema = WidgetDataSchema::make()
        ->empty(
            WidgetEmptySchema::make()
                ->message('No records found.'),
        );

    expect($schema->emptySchema())
        ->toBeInstanceOf(WidgetEmptySchema::class);
});

it('is immutable', function (): void {
    $schema = WidgetDataSchema::make();

    $updated = $schema
        ->records(
            WidgetRecordsSchema::make()
                ->records([
                    ['id' => 1],
                ]),
        )
        ->pagination(
            WidgetPaginationSchema::make()
                ->enabled(),
        );

    expect($updated)
        ->not->toBe($schema);

    expect($schema->recordsSchema())
        ->toBeNull();

    expect($schema->paginationSchema())
        ->toBeNull();

    expect($updated->recordsSchema())
        ->toBeInstanceOf(WidgetRecordsSchema::class);

    expect($updated->paginationSchema())
        ->toBeInstanceOf(WidgetPaginationSchema::class);
});
