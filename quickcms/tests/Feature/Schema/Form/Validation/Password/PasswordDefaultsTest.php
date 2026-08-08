<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Rule\Password\PasswordDefaults;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles default password preset', function (): void {
    expect(
        PasswordDefaults::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'min' => 8,
        'letters' => true,
        'mixedCase' => true,
        'numbers' => true,
        'symbols' => false,
        'uncompromised' => false,
        'generate' => false,
        'showStrengthMeter' => true,
    ]);
});

it('compiles strong password preset', function (): void {
    expect(
        PasswordDefaults::strong()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'min' => 12,
        'letters' => true,
        'mixedCase' => true,
        'numbers' => true,
        'symbols' => true,
        'uncompromised' => true,
        'strength' => 'strong',
        'generate' => false,
        'showStrengthMeter' => true,
    ]);
});
