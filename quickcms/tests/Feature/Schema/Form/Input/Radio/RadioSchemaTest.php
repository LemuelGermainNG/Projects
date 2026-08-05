<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Radio\RadioSchema;
use Tests\Support\Builders\OptionBuilderFactory;

it('creates a radio', function (): void {
    expect(
        RadioSchema::make(),
    )->toBeInstanceOf(
        RadioSchema::class,
    );
});

it('sets radio properties', function (): void {
    $radio = RadioSchema::make()
        ->inline()
        ->options([
            OptionBuilderFactory::administrator(),
            OptionBuilderFactory::user(),
        ]);

    expect(
        $radio->isInline(),
    )->toBeTrue();

    expect(
        $radio->options(),
    )->toHaveCount(2);
});
