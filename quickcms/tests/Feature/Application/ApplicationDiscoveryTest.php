<?php

declare(strict_types=1);

use App\Core\Application\ApplicationDiscovery;
use App\Core\Application\ApplicationProvider;
use Tests\Fixtures\Applications\Admin\AdminApplicationProvider;
use Tests\Fixtures\Applications\Shop\ShopApplicationProvider;

it('discovers application providers', function (): void {
    $discovery = new ApplicationDiscovery();

    $providers = $discovery->discover(
        base_path('tests/Fixtures/Applications'),
    );

    expect($providers)
        ->toContain(AdminApplicationProvider::class)
        ->toContain(ShopApplicationProvider::class);
});

it('does not discover non application classes', function (): void {
    $discovery = new ApplicationDiscovery();

    $providers = $discovery->discover(
        base_path('tests/Fixtures/Applications'),
    );

    expect($providers)
        ->not->toContain(
            \Tests\Fixtures\Applications\NotAnApplication::class,
        );
});

it('only returns application provider classes', function (): void {
    $discovery = new ApplicationDiscovery();

    $providers = $discovery->discover(
        base_path('tests/Fixtures/Applications'),
    );

    expect($providers)
        ->each
        ->toBeString();

    foreach ($providers as $provider) {
        expect(
            is_a(
                $provider,
                ApplicationProvider::class,
                true,
            ),
        )->toBeTrue();
    }
});
