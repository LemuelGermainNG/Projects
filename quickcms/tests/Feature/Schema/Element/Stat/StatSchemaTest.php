<?php

declare(strict_types=1);

use App\Core\Schema\Element\Stat\StatSchema;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Icons\Heroicons;

it('creates a stat schema', function (): void {
    expect(
        StatSchema::make(),
    )->toBeInstanceOf(StatSchema::class);
});

it('sets stat properties', function (): void {
    $stat = StatSchema::make()
        ->label('Users')
        ->value(1250)
        ->icon(Heroicons::Users)
        ->color(Color::Primary);

    expect($stat->label())
        ->toBe('Users');

    expect($stat->value())
        ->toBe(1250);

    expect($stat->icon())
        ->toBe(Heroicons::Users);

    expect($stat->color())
        ->toBe(Color::Primary);
});

it('is immutable', function (): void {
    $stat = StatSchema::make();

    $updated = $stat
        ->label('Users')
        ->value(1250);

    expect($updated)
        ->not->toBe($stat);

    expect($stat->label())
        ->toBe('');

    expect($stat->value())
        ->toBeNull();

    expect($updated->label())
        ->toBe('Users');

    expect($updated->value())
        ->toBe(1250);
});
