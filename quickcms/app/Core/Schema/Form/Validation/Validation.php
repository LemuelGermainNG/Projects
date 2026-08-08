<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation;

use App\Core\Schema\Form\Validation\Rule\Password\PasswordDefaults;
use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;
use App\Core\Schema\Form\Validation\Rule\Rule;
use App\Core\Schema\Schema;
use Closure;
use DateTimeInterface;

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

    /*
    |--------------------------------------------------------------------------
    | Presence
    |--------------------------------------------------------------------------
    */

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

    public function accepted(): static
    {
        return $this->add(
            Rule::accepted(),
        );
    }

    public function declined(): static
    {
        return $this->add(
            Rule::declined(),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Types
    |--------------------------------------------------------------------------
    */

    public function string(): static
    {
        return $this->add(
            Rule::string(),
        );
    }

    public function boolean(): static
    {
        return $this->add(
            Rule::boolean(),
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

    /**
     * @param array<int,string> $keys
     */
    public function array(
        array $keys = [],
    ): static {
        return $this->add(
            Rule::array($keys),
        );
    }

    public function date(): static
    {
        return $this->add(
            Rule::date(),
        );
    }

    public function file(): static
    {
        return $this->add(
            Rule::file(),
        );
    }

    public function image(): static
    {
        return $this->add(
            Rule::image(),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Size
    |--------------------------------------------------------------------------
    */

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

    public function between(
        int|float|string $min,
        int|float|string $max,
    ): static {
        return $this->add(
            Rule::between(
                $min,
                $max,
            ),
        );
    }

    public function decimal(
        int $min,
        ?int $max = null,
    ): static {
        return $this->add(
            Rule::decimal(
                $min,
                $max,
            ),
        );
    }

    public function multipleOf(
        int|float $value,
    ): static {
        return $this->add(
            Rule::multipleOf(
                $value,
            ),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Text
    |--------------------------------------------------------------------------
    */

    public function email(): static
    {
        return $this->add(
            Rule::email(),
        );
    }

    public function regex(
        string $pattern,
    ): static {
        return $this->add(
            Rule::regex(
                $pattern,
            ),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Dates
    |--------------------------------------------------------------------------
    */

    public function before(
        string|DateTimeInterface $value,
    ): static {
        return $this->add(
            Rule::before($value),
        );
    }

    public function beforeOrEqual(
        string|DateTimeInterface $value,
    ): static {
        return $this->add(
            Rule::beforeOrEqual($value),
        );
    }

    public function after(
        string|DateTimeInterface $value,
    ): static {
        return $this->add(
            Rule::after($value),
        );
    }

    public function afterOrEqual(
        string|DateTimeInterface $value,
    ): static {
        return $this->add(
            Rule::afterOrEqual($value),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Files
    |--------------------------------------------------------------------------
    */

    public function mimes(
        array $mimes,
    ): static {
        return $this->add(
            Rule::mimes($mimes),
        );
    }

    public function extensions(
        array $extensions,
    ): static {
        return $this->add(
            Rule::extensions($extensions),
        );
    }

    public function dimensions(
        mixed $parameters,
    ): static {
        return $this->add(
            Rule::dimensions($parameters),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Password
    |--------------------------------------------------------------------------
    */

    public function password(
        ?PasswordParameters $parameters = null,
    ): static {
        return $this->add(
            Rule::password(
                $parameters,
            ),
        );
    }

    public function defaultPassword(): static
    {
        return $this->password(
            PasswordDefaults::make(),
        );
    }

    public function strongPassword(): static
    {
        return $this->password(
            PasswordDefaults::strong(),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Comparison
    |--------------------------------------------------------------------------
    */

    public function same(
        string $field,
    ): static {
        return $this->add(
            Rule::same($field),
        );
    }

    public function different(
        string $field,
    ): static {
        return $this->add(
            Rule::different($field),
        );
    }

    public function in(
        array $values,
    ): static {
        return $this->add(
            Rule::in($values),
        );
    }

    public function notIn(
        array $values,
    ): static {
        return $this->add(
            Rule::notIn($values),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Custom
    |--------------------------------------------------------------------------
    */

    public function custom(
        string $name,
        array $arguments = [],
    ): static {
        return $this->add(
            Rule::custom(
                $name,
                $arguments,
            ),
        );
    }
}
