<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class CustomParameters extends RuleParameters
{
    /**
     * @param array<string,mixed> $arguments
     */
    public function __construct(
        protected string $name,
        protected array $arguments = [],
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return array<string,mixed>
     */
    public function arguments(): array
    {
        return $this->arguments;
    }
}
