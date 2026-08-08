<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class RegexParameters extends RuleParameters
{
    public function __construct(
        protected string $pattern,
    ) {
    }

    public function pattern(): string
    {
        return $this->pattern;
    }
}
