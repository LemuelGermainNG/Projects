<?php

declare(strict_types=1);

namespace App\Core\Support\Discovery\Contracts;

interface DiscoveryInterface
{
    /**
     * Discover matching classes.
     *
     * @return list<class-string>
     */
    public function discover(): array;
}
