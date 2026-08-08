<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class MimesParameters extends RuleParameters
{
    /**
     * @param array<int,string> $mimes
     */
    public function __construct(
        protected array $mimes,
    ) {
    }

    /**
     * @return array<int,string>
     */
    public function mimes(): array
    {
        return $this->mimes;
    }
}
