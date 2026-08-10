<?php

declare(strict_types=1);

use App\Core\Feature\FeatureDiscovery;
use App\Core\Feature\FeatureProvider;
use Tests\Fixtures\Features\User\UserFeatureProvider;

it('discovers feature providers', function (): void {
    $discovery = new FeatureDiscovery();

    $providers = $discovery->discover(
        base_path('tests/Fixtures/Features'),
    );

    expect($providers)
        ->toContain(UserFeatureProvider::class);
});

it('does not discover non feature classes', function (): void {
    $discovery = new FeatureDiscovery();

    $providers = $discovery->discover(
        base_path('tests/Fixtures/Features'),
    );

    expect($providers)
        ->not->toContain(
            \Tests\Fixtures\Features\NotAFeature::class,
        );
});

it('only returns feature providers', function (): void {
    $discovery = new FeatureDiscovery();

    $providers = $discovery->discover(
        base_path('tests/Fixtures/Features'),
    );

    expect($providers)
        ->each
        ->toBeString();

    foreach ($providers as $provider) {
        expect(
            is_a(
                $provider,
                FeatureProvider::class,
                true,
            ),
        )->toBeTrue();
    }
});

it('uses the Laravel service provider lifecycle', function (): void {
    $provider = new UserFeatureProvider(
        app(),
    );

    expect($provider)
        ->toBeInstanceOf(
            \Illuminate\Support\ServiceProvider::class,
        );
});
