<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

final class ExistsParameters extends RuleParameters
{
    public function __construct(
        protected string $model,
        protected ?string $column = null,
    ) {
    }

    public function model(): string
    {
        return $this->model;
    }

    public function column(): ?string
    {
        return $this->column;
    }
}
