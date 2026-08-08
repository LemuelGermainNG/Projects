<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class MultipleOfParameters extends RuleParameters
{
    public function __construct(
        protected int|float $value,
    ) {
    }

    public function value(): int|float
    {
        return $this->value;
    }
}
