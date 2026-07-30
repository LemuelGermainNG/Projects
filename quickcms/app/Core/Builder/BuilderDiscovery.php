<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Support\Discovery\ClassDiscovery;

final class BuilderDiscovery
{
    public function __construct(
        protected readonly ClassDiscovery $discovery = new ClassDiscovery(),
    ) {
    }

    /**
     * Discover all builders.
     *
     * @param string $directory The directory to search for builders.
     *
     * @return array<class-string<\App\Core\Schema\Schema>, class-string<BuilderInterface>>
     */
    public function discover(string $directory): array
    {
        $builders = [];

        $classes = $this->discovery
            ->in($directory)
            ->implementing(BuilderInterface::class)
            ->discover();

        foreach ($classes as $builder) {
            $builders[$builder::schema()] = $builder;
        }

        return $builders;
    }
}
