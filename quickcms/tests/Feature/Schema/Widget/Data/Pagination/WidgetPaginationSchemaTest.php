<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;

it('creates pagination schema', function (): void {
    expect(
        WidgetPaginationSchema::make(),
    )->toBeInstanceOf(WidgetPaginationSchema::class);
});

it('sets pagination properties', function (): void {
    $pagination = WidgetPaginationSchema::make()
        ->enabled()
        ->perPage(25)
        ->page(2);

    expect($pagination->isEnabled())
        ->toBeTrue();

    expect($pagination->perPageValue())
        ->toBe(25);

    expect($pagination->pageValue())
        ->toBe(2);
});
