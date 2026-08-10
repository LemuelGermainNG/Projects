<?php

declare(strict_types=1);

use App\Core\Application\ApplicationRegistry;
use Tests\Fixtures\Features\User\UserApplicationFeatureProvider;
use Tests\Support\Navigation\NavigationOne;
use Tests\Support\Pages\PageOne;

it('registers pages for the selected application', function (): void {
    $provider = new UserApplicationFeatureProvider(
        app(),
    );

    $provider->boot();

    $registry = app(ApplicationRegistry::class);

    expect($registry->pages('shop'))
        ->toContain(PageOne::class);

    expect($registry->pages('admin'))
        ->not->toContain(PageOne::class);
});

it('registers navigation for the selected application', function (): void {
    $provider = new UserApplicationFeatureProvider(
        app(),
    );

    $provider->boot();

    $registry = app(ApplicationRegistry::class);

    expect($registry->navigation('shop'))
        ->toContain(NavigationOne::class);

    expect($registry->navigation('admin'))
        ->not->toContain(NavigationOne::class);
});
