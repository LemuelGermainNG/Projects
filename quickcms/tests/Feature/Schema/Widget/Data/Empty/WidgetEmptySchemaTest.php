<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;

it('creates empty schema', function (): void {
    expect(
        WidgetEmptySchema::make(),
    )->toBeInstanceOf(WidgetEmptySchema::class);
});

it('sets empty properties', function (): void {
    $empty = WidgetEmptySchema::make()
        ->message('No records found.')
        ->icon('inbox');

    expect($empty->messageValue())
        ->toBe('No records found.');

    expect($empty->iconValue())
        ->toBe('inbox');
});
