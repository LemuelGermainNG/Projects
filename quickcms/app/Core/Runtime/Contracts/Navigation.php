<?php

declare(strict_types=1);

namespace App\Core\Runtime\Contracts;

use App\Core\Schema\Contracts\NavigationSchema;

interface Navigation
{
    /**
     * Returns the navigation schema.
     */
    public function schema(): NavigationSchema;

    /**
     * Returns the navigation metadata.
     *
     * @return array<string, mixed>
     */
    public function metadata(): array;
}
