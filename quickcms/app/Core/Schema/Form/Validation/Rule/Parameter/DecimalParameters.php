<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class DecimalParameters extends RuleParameters
{
    public function __construct(
        protected int $min,
        protected ?int $max = null,
    ) {
    }

    public function min(): int
    {
        return $this->min;
    }

    public function max(): ?int
    {
        return $this->max;
    }
}
