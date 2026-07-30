<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;

abstract class Builder implements BuilderInterface
{
    public function __construct(
        protected readonly Schema $schema,
        protected readonly BuilderRegistry $registry,
    ) {
    }
}
