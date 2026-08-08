<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;

it('creates records schema', function (): void {
    expect(
        WidgetRecordsSchema::make(),
    )->toBeInstanceOf(WidgetRecordsSchema::class);
});

it('sets records', function (): void {
    $records = [
        ['id' => 1],
        ['id' => 2],
    ];

    expect(
        WidgetRecordsSchema::make()
            ->records($records)
            ->recordsValue(),
    )->toBe($records);
});
