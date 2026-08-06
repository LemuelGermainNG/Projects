<?php

declare(strict_types=1);

use App\Core\Schema\Element\Stat\StatSchema;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a stat schema', function (): void {
    $stat = StatSchema::make()
        ->label('Users')
        ->value(1250)
        ->icon(Heroicons::Users)
        ->color(Color::Primary);

    expect(
        $stat->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'stat',

        'label' => 'Users',

        'value' => 1250,

        'icon' => 'heroicon-o-users',

        'color' => 'primary',

        'props' => [],
    ]);
});
