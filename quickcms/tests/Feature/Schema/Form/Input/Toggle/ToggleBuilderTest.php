<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Toggle\ToggleSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a toggle', function (): void {
    $toggle = ToggleSchema::make()
        ->checked()
        ->onIcon('heroicon-o-check')
        ->offIcon('heroicon-o-x-mark')
        ->onColor('success')
        ->offColor('danger');

    expect(
        $toggle->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'toggle',

        'checked' => true,

        'onIcon' => 'heroicon-o-check',

        'offIcon' => 'heroicon-o-x-mark',

        'onColor' => 'success',

        'offColor' => 'danger',
    ]);
});
