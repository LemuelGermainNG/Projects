<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class FieldParameters extends RuleParameters
{
    public function __construct(
        protected string $field,
    ) {
    }

    public function field(): string
    {
        return $this->field;
    }
}
