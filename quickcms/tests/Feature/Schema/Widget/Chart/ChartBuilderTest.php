<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Chart\ChartAssertions;
use Tests\Support\Builders\Widget\Chart\ChartBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a chart', function (): void {
    expect(
        ChartBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartAssertions::make(),
    );
});

it('compiles a chart with widget data', function (): void {
    expect(
        ChartBuilderFactory::withWidgetData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartAssertions::withWidgetData(),
    );
});

it('compiles an empty chart', function (): void {
    expect(
        ChartBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartAssertions::empty(),
    );
});

it('compiles a chart source', function (): void {
    expect(
        ChartBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartAssertions::source(),
    );
});

it('compiles a bar chart', function (): void {
    expect(
        ChartBuilderFactory::bar()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartAssertions::bar(),
    );
});

it('compiles a pie chart', function (): void {
    expect(
        ChartBuilderFactory::pie()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartAssertions::pie(),
    );
});
