<?php

declare(strict_types=1);

namespace Tests\Support\Factories;

use App\Core\Builder\BuilderDiscovery;
use App\Core\Builder\BuilderRegistry;

final class BuilderRegistryFactory
{
    public static function make(): BuilderRegistry
    {
        $registry = new BuilderRegistry();

        $builders = (new BuilderDiscovery())
            ->discover(app_path('Core'));

        foreach ($builders as $schema => $builder) {
            $registry->register($schema, $builder);
        }

        return $registry;
    }
}
