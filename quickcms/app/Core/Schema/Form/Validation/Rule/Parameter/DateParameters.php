<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class DateParameters extends RuleParameters
{
    public function __construct(
        protected string|\DateTimeInterface $value,
    ) {
    }

    public function value(): string|\DateTimeInterface
    {
        return $this->value;
    }
}
