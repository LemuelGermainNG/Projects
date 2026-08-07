<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation;

use App\Core\Schema\Form\Validation\Rule\Rule;
use App\Core\Schema\Schema;
use Closure;

final class Validation extends Schema
{
    /**
     * @var array<int, Rule>|Closure|null
     */
    protected array|Closure|null $rules = null;

    /**
     * @param array<int, Rule>|Closure|null $rules
     *
     * @return array<int, Rule>|Closure|static|null
     */
    public function rules(
        array|Closure|null $rules = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->rules;
        }

        return $this->with(
            'rules',
            $rules,
        );
    }

    public function add(
        Rule $rule,
    ): static {
        $rules = $this->rules;

        if ($rules instanceof Closure) {
            return $this;
        }

        $rules ??= [];

        $rules[] = $rule;

        return $this->with(
            'rules',
            $rules,
        );
    }

    public function required(): static
    {
        return $this->add(
            Rule::required(),
        );
    }

    public function nullable(): static
    {
        return $this->add(
            Rule::nullable(),
        );
    }

    public function email(): static
    {
        return $this->add(
            Rule::email(),
        );
    }

    public function integer(): static
    {
        return $this->add(
            Rule::integer(),
        );
    }

    public function numeric(): static
    {
        return $this->add(
            Rule::numeric(),
        );
    }

    public function boolean(): static
    {
        return $this->add(
            Rule::boolean(),
        );
    }

    public function confirmed(): static
    {
        return $this->add(
            Rule::confirmed(),
        );
    }

    public function min(
        int|string $value,
    ): static {
        return $this->add(
            Rule::min($value),
        );
    }

    public function max(
        int|string $value,
    ): static {
        return $this->add(
            Rule::max($value),
        );
    }

    public function unique(
        string $model,
        ?string $column = null,
        mixed $ignore = null,
    ): static {
        return $this->add(
            Rule::unique(
                $model,
                $column,
                $ignore,
            ),
        );
    }

    public function exists(
        string $model,
        ?string $column = null,
    ): static {
        return $this->add(
            Rule::exists(
                $model,
                $column,
            ),
        );
    }
}
