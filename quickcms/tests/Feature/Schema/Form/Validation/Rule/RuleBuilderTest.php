<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;
use App\Core\Schema\Form\Validation\Rule\Rule;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles required rule', function (): void {

    expect(
        Rule::required()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'type' => 'required',
    ]);

});

it('compiles email rule', function (): void {

    expect(
        Rule::email()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'type' => 'email',
    ]);

});

it('compiles between rule', function (): void {

    expect(
        Rule::between(
            3,
            255,
        )->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'between',

        'parameters' => [
            'min' => 3,
            'max' => 255,
        ],
    ]);

});

it('compiles password rule', function (): void {

    expect(
        Rule::password(
            PasswordParameters::make()
                ->min(12)
                ->letters()
                ->numbers(),
        )->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'password',

        'parameters' => [
            'min' => 12,
            'letters' => true,
            'numbers' => true,
        ],
    ]);

});

it('compiles custom rule', function (): void {

    expect(
        Rule::custom(
            'slug_unique',
            [
                'locale' => true,
            ],
        )->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'custom',

        'parameters' => [
            'name' => 'slug_unique',

            'arguments' => [
                'locale' => true,
            ],
        ],
    ]);

});
