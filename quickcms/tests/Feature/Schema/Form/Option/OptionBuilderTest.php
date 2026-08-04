<?php

declare(strict_types=1);

use App\Core\Schema\Form\Option\OptionSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an option', function (): void {
    $option = OptionSchema::make()
        ->value('admin')
        ->label('Administrator')
        ->description('Full access')
        ->icon('heroicon-o-shield-check');

    expect(
        $option->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'option',

        'value' => 'admin',

        'label' => 'Administrator',

        'disabled' => false,

        'description' => 'Full access',

        'icon' => 'heroicon-o-shield-check',

        'props' => [],
    ]);
});
