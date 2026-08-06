<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation;

use App\Core\Schema\Form\Validation\Rule\Rule;
use App\Core\Schema\Schema;
use Closure;

final class ValidationRules extends Schema
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

    public function rule(
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
}
