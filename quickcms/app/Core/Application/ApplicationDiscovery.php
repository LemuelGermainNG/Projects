<?php

declare(strict_types=1);

namespace App\Core\Application;

use App\Core\Support\Discovery\ClassDiscovery;

final class ApplicationDiscovery
{
    public function __construct(
        protected readonly ClassDiscovery $discovery = new ClassDiscovery(),
    ) {
    }

    /**
     * Discover all application providers.
     *
     * @return list<class-string<ApplicationProvider>>
     */
    public function discover(
        string $directory,
    ): array {
        return $this->discovery
            ->in($directory)
            ->extending(ApplicationProvider::class)
            ->discover();
    }
}
