<?php

declare(strict_types=1);

namespace Tests\Support\Factories;

use App\Core\Builder\BuilderDiscovery;
use App\Core\Builder\BuilderRegistry;
use App\Core\Support\Discovery\ClassDiscovery;

final class BuilderRegistryFactory
{
    public static function make(): BuilderRegistry
    {
        $registry = new BuilderRegistry();

        // Grâce à la découverte hybride dans ClassDiscovery,
        // tous les builders du dossier Core/ seront bien trouvés pendant les tests !
        $builders = (new BuilderDiscovery(new ClassDiscovery()))
            ->discover(app_path('Core'));

        foreach ($builders as $schema => $builder) {
            $registry->register($schema, $builder);
        }

        return $registry;
    }
}
