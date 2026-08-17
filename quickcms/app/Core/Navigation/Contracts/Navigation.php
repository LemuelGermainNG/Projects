<?php

declare(strict_types=1);

namespace App\Core\Navigation\Contracts;

use App\Core\Schema\Navigation\NavigationSchema;

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

    /**
     * Returns the pages exposed by this navigation.
     *
     * @return array<string, class-string<Page>>
     */
    public function pages(): array;
}
