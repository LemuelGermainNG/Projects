<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\EvaluatesValues;
use App\Core\Support\Contracts\EvaluationContextInterface;

abstract class Builder implements BuilderInterface
{
    use EvaluatesValues;

    public function __construct(
        protected readonly Schema $schema,
        protected readonly BuilderRegistry $registry,
        protected readonly EvaluationContextInterface $context,
    ) {
    }
}
