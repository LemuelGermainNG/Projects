<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule;

use App\Core\Schema\Form\Validation\Rule\Parameter\ExistsParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\MaxParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\MinParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\RuleParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\UniqueParameters;
use App\Core\Schema\Schema;
use Closure;

class Rule extends Schema
{
    protected function __construct(
        protected RuleType $type,
        protected RuleParameters|Closure|null $parameters = null,
        protected string|Closure|null $message = null,
    ) {
    }

    public static function required(): static
    {
        return new static(RuleType::Required);
    }

    public static function nullable(): static
    {
        return new static(RuleType::Nullable);
    }

    public static function email(): static
    {
        return new static(RuleType::Email);
    }

    public static function integer(): static
    {
        return new static(RuleType::Integer);
    }

    public static function numeric(): static
    {
        return new static(RuleType::Numeric);
    }

    public static function boolean(): static
    {
        return new static(RuleType::Boolean);
    }

    public static function confirmed(): static
    {
        return new static(RuleType::Confirmed);
    }

    public static function min(
        int|string $value,
    ): static {
        return new static(
            RuleType::Min,
            new MinParameters($value),
        );
    }

    public static function max(
        int|string $value,
    ): static {
        return new static(
            RuleType::Max,
            new MaxParameters($value),
        );
    }

    public static function unique(
        string $model,
        ?string $column = null,
        mixed $ignore = null,
    ): static {
        return new static(
            RuleType::Unique,
            new UniqueParameters(
                $model,
                $column,
                $ignore,
            ),
        );
    }

    public static function exists(
        string $model,
        ?string $column = null,
    ): static {
        return new static(
            RuleType::Exists,
            new ExistsParameters(
                $model,
                $column,
            ),
        );
    }

    public function message(
        string|Closure|null $message,
    ): static {
        return $this->with(
            'message',
            $message,
        );
    }

    public function type(): RuleType
    {
        return $this->type;
    }

    public function parameters(): RuleParameters|Closure|null
    {
        return $this->parameters;
    }

    public function getMessage(): string|Closure|null
    {
        return $this->message;
    }
}
