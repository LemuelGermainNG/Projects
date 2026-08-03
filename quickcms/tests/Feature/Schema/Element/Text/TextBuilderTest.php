<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Support\Enums\Color;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a text schema', function (): void {
    $text = TextSchema::make()
        ->value('Hello World')
        ->color(Color::Primary);

    expect(
        $text->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'text',

        'value' => 'Hello World',

        'color' => 'primary',

        'props' => [],
    ]);
});
