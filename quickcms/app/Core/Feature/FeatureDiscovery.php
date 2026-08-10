<?php

declare(strict_types=1);

namespace App\Core\Feature;

use App\Core\Support\Discovery\ClassDiscovery;

final class FeatureDiscovery
{
    public function __construct(
        protected readonly ClassDiscovery $discovery = new ClassDiscovery(),
    ) {
    }

    /**
     * Discover all feature providers.
     *
     * @return list<class-string<FeatureProvider>>
     */
    public function discover(
        string $directory,
    ): array {
        return $this->discovery
            ->in($directory)
            ->extending(FeatureProvider::class)
            ->discover();
    }
}
