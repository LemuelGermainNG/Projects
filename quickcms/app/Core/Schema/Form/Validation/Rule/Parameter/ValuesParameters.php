<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class ValuesParameters extends RuleParameters
{
    /**
     * @param array<int|string,mixed> $values
     */
    public function __construct(
        protected array $values,
    ) {
    }
}
