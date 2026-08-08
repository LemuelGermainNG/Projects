<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class BetweenParameters extends RuleParameters
{
    public function __construct(
        protected int|float|string $min,
        protected int|float|string $max,
    ) {
    }

    public function min(): int|float|string
    {
        return $this->min;
    }

    public function max(): int|float|string
    {
        return $this->max;
    }
}
