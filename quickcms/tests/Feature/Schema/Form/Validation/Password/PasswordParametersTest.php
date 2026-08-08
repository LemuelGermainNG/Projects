<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles default password parameters', function (): void {
    expect(
        PasswordParameters::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'min' => 8,
        'letters' => false,
        'mixedCase' => false,
        'numbers' => false,
        'symbols' => false,
        'uncompromised' => false,
        'generate' => false,
        'showStrengthMeter' => true,
    ]);
});

it('compiles custom password parameters', function (): void {
    expect(
        PasswordParameters::make()
            ->min(16)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()
            ->veryStrong()
            ->generate()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'min' => 16,
        'letters' => true,
        'mixedCase' => true,
        'numbers' => true,
        'symbols' => true,
        'uncompromised' => true,
        'strength' => 'very-strong',
        'generate' => true,
        'showStrengthMeter' => true,
    ]);
});

it('hides strength meter', function (): void {
    expect(
        PasswordParameters::make()
            ->hideStrengthMeter()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'showStrengthMeter' => false,
    ]);
});

it('supports every predefined strength', function (string $method, string $expected): void {
    expect(
        PasswordParameters::make()
            ->{$method}()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'strength' => $expected,
    ]);
})->with([
    ['weak', 'weak'],
    ['medium', 'medium'],
    ['strong', 'strong'],
    ['veryStrong', 'very-strong'],
]);
