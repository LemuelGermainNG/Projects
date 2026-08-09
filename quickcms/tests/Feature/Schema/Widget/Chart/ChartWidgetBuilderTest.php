<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Chart\ChartWidgetAssertions;
use Tests\Support\Builders\Widget\Chart\ChartWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a chart', function (): void {
    expect(
        ChartWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartWidgetAssertions::make(),
    );
});

it('compiles a chart with widget data', function (): void {
    expect(
        ChartWidgetBuilderFactory::withWidgetData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartWidgetAssertions::withWidgetData(),
    );
});

it('compiles an empty chart', function (): void {
    expect(
        ChartWidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartWidgetAssertions::empty(),
    );
});

it('compiles a chart source', function (): void {
    expect(
        ChartWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartWidgetAssertions::source(),
    );
});

it('compiles a bar chart', function (): void {
    expect(
        ChartWidgetBuilderFactory::bar()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartWidgetAssertions::bar(),
    );
});

it('compiles a pie chart', function (): void {
    expect(
        ChartWidgetBuilderFactory::pie()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ChartWidgetAssertions::pie(),
    );
});
