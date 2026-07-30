<?php

declare(strict_types=1);

use App\Core\Schema\Brand\BrandSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('creates a brand schema', function (): void {
    expect(
        BrandSchema::make(),
    )->toBeInstanceOf(BrandSchema::class);
});

it('compiles a brand schema', function (): void {
    $brand = BrandSchema::make()
        ->name('Docryn')
        ->logo('/logo.svg')
        ->favicon('/favicon.ico');

    expect(
        $brand->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'brand',
        'name' => 'Docryn',
        'logo' => '/logo.svg',
        'favicon' => '/favicon.ico',
    ]);
});

it('is immutable', function (): void {
    $brand = BrandSchema::make();

    $updated = $brand->name('Docryn');

    expect($updated)
        ->not->toBe($brand);
});
