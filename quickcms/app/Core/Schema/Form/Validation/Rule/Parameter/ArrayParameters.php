<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class ArrayParameters extends RuleParameters
{
    /**
     * @param array<int,string> $keys
     */
    public function __construct(
        protected array $keys = [],
    ) {
    }

    /**
     * @return array<int,string>
     */
    public function keys(): array
    {
        return $this->keys;
    }
}
