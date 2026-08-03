<?php

declare(strict_types=1);

use App\Core\Schema\Element\Icon\IconSchema;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an icon schema', function (): void {
    $icon = IconSchema::make()
        ->icon(Heroicons::Users)
        ->color(Color::Primary);

    expect(
        $icon->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'icon',

        'icon' => 'heroicon-o-users',

        'color' => 'primary',

        'props' => [],
    ]);
});
