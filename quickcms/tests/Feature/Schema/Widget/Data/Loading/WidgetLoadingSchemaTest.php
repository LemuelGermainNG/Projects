<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;

it('creates loading schema', function (): void {
    expect(
        WidgetLoadingSchema::make(),
    )->toBeInstanceOf(WidgetLoadingSchema::class);
});

it('sets loading properties', function (): void {
    $loading = WidgetLoadingSchema::make()
        ->enabled()
        ->message('Loading...');

    expect($loading->isEnabled())
        ->toBeTrue();

    expect($loading->messageValue())
        ->toBe('Loading...');
});
