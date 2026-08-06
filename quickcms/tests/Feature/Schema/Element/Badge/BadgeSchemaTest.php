<?php

declare(strict_types=1);

use App\Core\Schema\Element\Badge\BadgeSchema;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Icons\Heroicons;

it('creates a badge schema', function (): void {
    expect(
        BadgeSchema::make(),
    )->toBeInstanceOf(BadgeSchema::class);
});

it('sets badge properties', function (): void {
    $badge = BadgeSchema::make()
        ->value('Published')
        ->color(Color::Success)
        ->icon(Heroicons::CheckCircle);

    expect($badge->value())
        ->toBe('Published');

    expect($badge->color())
        ->toBe(Color::Success);

    expect($badge->icon())
        ->toBe(Heroicons::CheckCircle);
});

it('is immutable', function (): void {
    $badge = BadgeSchema::make();

    $updated = $badge
        ->value('Published')
        ->color(Color::Success)
        ->icon(Heroicons::CheckCircle);

    expect($updated)
        ->not->toBe($badge);

    expect($badge->value())
        ->toBeNull();

    expect($updated->value())
        ->toBe('Published');

    expect($updated->color())
        ->toBe(Color::Success);

    expect($updated->icon())
        ->toBe(Heroicons::CheckCircle);
});
