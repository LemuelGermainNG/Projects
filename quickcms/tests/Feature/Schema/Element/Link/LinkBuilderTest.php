<?php

declare(strict_types=1);

use App\Core\Schema\Element\Link\LinkSchema;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a link schema', function (): void {
    $link = LinkSchema::make()
        ->label('OpenAI')
        ->url('https://openai.com')
        ->icon(Heroicons::Link)
        ->color(Color::Primary);

    expect(
        $link->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'link',

        'label' => 'OpenAI',

        'url' => 'https://openai.com',

        'icon' => 'heroicon-o-link',

        'color' => 'primary',

        'props' => [],
    ]);
});
