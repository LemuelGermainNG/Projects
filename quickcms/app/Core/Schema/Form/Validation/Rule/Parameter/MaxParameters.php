<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class MaxParameters extends RuleParameters
{
    public function __construct(
        protected int|string $value,
    ) {
    }

    public function value(): int|string
    {
        return $this->value;
    }
}
