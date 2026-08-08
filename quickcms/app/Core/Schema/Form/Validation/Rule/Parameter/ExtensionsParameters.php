<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class ExtensionsParameters extends RuleParameters
{
    /**
     * @param array<int,string> $extensions
     */
    public function __construct(
        protected array $extensions,
    ) {
    }

    /**
     * @return array<int,string>
     */
    public function extensions(): array
    {
        return $this->extensions;
    }
}
