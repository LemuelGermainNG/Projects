<?php

declare(strict_types=1);

use App\Core\Schema\Element\Badge\BadgeSchema;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a badge schema', function (): void {
    $badge = BadgeSchema::make()
        ->value('Published')
        ->color(Color::Success)
        ->icon(Heroicons::CheckCircle);

    expect(
        $badge->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'badge',

        'value' => 'Published',

        'color' => 'success',

        'icon' => 'heroicon-o-check-circle',

        'props' => [],
    ]);
});
