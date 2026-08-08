<?php

declare(strict_types=1);

use Tests\Support\Assertions\Validation\ComparisonAssertions;
use Tests\Support\Assertions\Validation\CustomAssertions;
use Tests\Support\Assertions\Validation\DateAssertions;
use Tests\Support\Assertions\Validation\FileAssertions;
use Tests\Support\Assertions\Validation\PasswordAssertions;
use Tests\Support\Assertions\Validation\SizeAssertions;
use Tests\Support\Assertions\Validation\TextAssertions;
use Tests\Support\Assertions\Validation\TypeAssertions;
use Tests\Support\Assertions\Validation\ValidationAssertions;
use Tests\Support\Builders\Validation\ComparisonBuilderFactory;
use Tests\Support\Builders\Validation\CustomBuilderFactory;
use Tests\Support\Builders\Validation\DateBuilderFactory;
use Tests\Support\Builders\Validation\FileBuilderFactory;
use Tests\Support\Builders\Validation\PasswordBuilderFactory;
use Tests\Support\Builders\Validation\SizeBuilderFactory;
use Tests\Support\Builders\Validation\TextBuilderFactory;
use Tests\Support\Builders\Validation\TypeBuilderFactory;
use Tests\Support\Builders\Validation\ValidationBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles the default validation', function (): void {
    expect(
        ValidationBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ValidationAssertions::make(),
    );
});

it('compiles type validation', function (): void {
    expect(
        TypeBuilderFactory::arrayWithKeys()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => TypeAssertions::arrayWithKeys(),
    ]);
});

it('compiles size validation', function (): void {
    expect(
        SizeBuilderFactory::between()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => SizeAssertions::between(),
    ]);
});

it('compiles text validation', function (): void {
    expect(
        TextBuilderFactory::regex()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => TextAssertions::regex(),
    ]);
});

it('compiles date validation', function (): void {
    expect(
        DateBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => DateAssertions::make(),
    ]);
});

it('compiles file validation', function (): void {
    expect(
        FileBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => FileAssertions::make(),
    ]);
});

it('compiles password validation', function (): void {
    expect(
        PasswordBuilderFactory::strong()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => PasswordAssertions::strong(),
    ]);
});

it('compiles comparison validation', function (): void {
    expect(
        ComparisonBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => ComparisonAssertions::make(),
    ]);
});

it('compiles custom validation', function (): void {
    expect(
        CustomBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'rules' => CustomAssertions::make(),
    ]);
});
