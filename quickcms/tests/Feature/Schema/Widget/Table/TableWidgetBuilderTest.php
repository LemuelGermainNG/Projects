<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Table\TableWidgetAssertions;
use Tests\Support\Builders\Widget\Table\TableWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a table', function (): void {
    expect(
        TableWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::make(),
    );
});

it('compiles a table with data', function (): void {
    expect(
        TableWidgetBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::withData(),
    );
});

it('compiles an empty table', function (): void {
    expect(
        TableWidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::empty(),
    );
});

it('compiles a table source', function (): void {
    expect(
        TableWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::source(),
    );
});

it('compiles table column defaults', function (): void {
    $table = \App\Core\Schema\Widget\Table\TableWidgetSchema::make()
        ->tableColumns([
            [
                'key' => 'name',
                'label' => 'Name',
            ],
        ]);

    $compiled = $table->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['tableColumns'])
        ->toBe([
            [
                'key' => 'name',
                'label' => 'Name',
                'sortable' => false,
                'searchable' => false,
                'width' => null,
                'align' => 'start',
                'format' => null,
                'visible' => true,
            ],
        ]);
});

it('compiles advanced table column configuration', function (): void {
    $table = \App\Core\Schema\Widget\Table\TableWidgetSchema::make()
        ->tableColumns([
            [
                'key' => 'name',
                'label' => 'Name',
                'sortable' => true,
                'searchable' => true,
                'width' => 240,
                'align' => 'start',
                'format' => 'text',
                'visible' => true,
            ],
            [
                'key' => 'email',
                'label' => 'Email',
                'sortable' => true,
                'searchable' => true,
                'width' => 320,
                'align' => 'center',
                'format' => 'email',
                'visible' => false,
            ],
            [
                'key' => 'created_at',
                'label' => 'Created',
                'sortable' => true,
                'searchable' => false,
                'width' => 180,
                'align' => 'end',
                'format' => 'date',
                'visible' => true,
            ],
        ]);

    $compiled = $table->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['tableColumns'])
        ->toBe([
            [
                'key' => 'name',
                'label' => 'Name',
                'sortable' => true,
                'searchable' => true,
                'width' => 240,
                'align' => 'start',
                'format' => 'text',
                'visible' => true,
            ],
            [
                'key' => 'email',
                'label' => 'Email',
                'sortable' => true,
                'searchable' => true,
                'width' => 320,
                'align' => 'center',
                'format' => 'email',
                'visible' => false,
            ],
            [
                'key' => 'created_at',
                'label' => 'Created',
                'sortable' => true,
                'searchable' => false,
                'width' => 180,
                'align' => 'end',
                'format' => 'date',
                'visible' => true,
            ],
        ]);
});

it('evaluates table column closures', function (): void {
    $table = \App\Core\Schema\Widget\Table\TableWidgetSchema::make()
        ->tableColumns([
            [
                'key' => fn (): string => 'name',
                'label' => fn (): string => 'User name',
                'sortable' => fn (): bool => true,
                'searchable' => fn (): bool => true,
                'width' => fn (): int => 240,
                'align' => fn (): string => 'center',
                'format' => fn (): string => 'text',
                'visible' => fn (): bool => false,
            ],
        ]);

    $compiled = $table->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['tableColumns'])
        ->toBe([
            [
                'key' => 'name',
                'label' => 'User name',
                'sortable' => true,
                'searchable' => true,
                'width' => 240,
                'align' => 'center',
                'format' => 'text',
                'visible' => false,
            ],
        ]);
});

it('keeps table column order', function (): void {
    $table = \App\Core\Schema\Widget\Table\TableWidgetSchema::make()
        ->tableColumns([
            [
                'key' => 'name',
                'label' => 'Name',
            ],
            [
                'key' => 'email',
                'label' => 'Email',
            ],
            [
                'key' => 'status',
                'label' => 'Status',
            ],
        ]);

    $compiled = $table->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['tableColumns'])
        ->toHaveCount(3);

    expect($compiled['tableColumns'][0]['key'])
        ->toBe('name');

    expect($compiled['tableColumns'][1]['key'])
        ->toBe('email');

    expect($compiled['tableColumns'][2]['key'])
        ->toBe('status');
});


it('compiles advanced table columns', function (): void {
    expect(
        TableWidgetBuilderFactory::advanced()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::advanced(),
    );
});
