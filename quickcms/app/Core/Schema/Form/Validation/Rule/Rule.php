<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule;

use App\Core\Schema\Form\Validation\Rule\Parameter\ArrayParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\BetweenParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\CustomParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\DateParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\DecimalParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\DimensionsParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\ExistsParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\ExtensionsParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\FieldParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\MaxParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\MimesParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\MinParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\MultipleOfParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\RegexParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\RuleParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\UniqueParameters;
use App\Core\Schema\Form\Validation\Rule\Parameter\ValuesParameters;
use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;
use App\Core\Schema\Schema;
use Closure;
use DateTimeInterface;

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

    public static function accepted(): static
    {
        return new static(RuleType::Accepted);
    }

    public static function declined(): static
    {
        return new static(RuleType::Declined);
    }

    public static function string(): static
    {
        return new static(RuleType::String);
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

    /**
     * @param array<int,string> $keys
     */
    public static function array(
        array $keys = [],
    ): static {
        return new static(
            RuleType::Array,
            $keys === []
                ? null
                : new ArrayParameters($keys),
        );
    }

    public static function date(): static
    {
        return new static(RuleType::Date);
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

    public static function regex(
        string $pattern,
    ): static {
        return new static(
            RuleType::Regex,
            new RegexParameters($pattern),
        );
    }

    public static function between(
        int|float|string $min,
        int|float|string $max,
    ): static {
        return new static(
            RuleType::Between,
            new BetweenParameters(
                $min,
                $max,
            ),
        );
    }

    public static function decimal(
        int $min,
        ?int $max = null,
    ): static {
        return new static(
            RuleType::Decimal,
            new DecimalParameters(
                $min,
                $max,
            ),
        );
    }

    public static function multipleOf(
        int|float $value,
    ): static {
        return new static(
            RuleType::MultipleOf,
            new MultipleOfParameters($value),
        );
    }

    public static function before(
        string|DateTimeInterface $value,
    ): static {
        return new static(
            RuleType::Before,
            new DateParameters($value),
        );
    }

    public static function beforeOrEqual(
        string|DateTimeInterface $value,
    ): static {
        return new static(
            RuleType::BeforeOrEqual,
            new DateParameters($value),
        );
    }

    public static function after(
        string|DateTimeInterface $value,
    ): static {
        return new static(
            RuleType::After,
            new DateParameters($value),
        );
    }

    public static function afterOrEqual(
        string|DateTimeInterface $value,
    ): static {
        return new static(
            RuleType::AfterOrEqual,
            new DateParameters($value),
        );
    }

    public static function file(): static
    {
        return new static(
            RuleType::File,
        );
    }

    public static function image(): static
    {
        return new static(
            RuleType::Image,
        );
    }

    public static function mimes(
        array $mimes,
    ): static {
        return new static(
            RuleType::Mimes,
            new MimesParameters($mimes),
        );
    }

    public static function extensions(
        array $extensions,
    ): static {
        return new static(
            RuleType::Extensions,
            new ExtensionsParameters($extensions),
        );
    }

    /**
     * @param DimensionsParameters|array{
     *     minWidth?: int|Closure|null,
     *     minHeight?: int|Closure|null,
     *     maxWidth?: int|Closure|null,
     *     maxHeight?: int|Closure|null,
     *     ratio?: float|Closure|null
     * } $parameters
     */
    public static function dimensions(
        DimensionsParameters|array $parameters,
    ): static {
        if (is_array($parameters)) {
            $parameters = new DimensionsParameters(
                minWidth: $parameters['minWidth'] ?? null,
                minHeight: $parameters['minHeight'] ?? null,
                maxWidth: $parameters['maxWidth'] ?? null,
                maxHeight: $parameters['maxHeight'] ?? null,
                ratio: $parameters['ratio'] ?? null,
            );
        }

        return new static(
            RuleType::Dimensions,
            $parameters,
        );
    }

    public static function password(
        ?PasswordParameters $parameters = null,
    ): static {
        return new static(
            RuleType::Password,
            $parameters ?? PasswordParameters::make(),
        );
    }

    public static function same(
        string $field,
    ): static {
        return new static(
            RuleType::Same,
            new FieldParameters($field),
        );
    }

    public static function different(
        string $field,
    ): static {
        return new static(
            RuleType::Different,
            new FieldParameters($field),
        );
    }

    /**
     * @param array<int|string,mixed> $values
     */
    public static function in(
        array $values,
    ): static {
        return new static(
            RuleType::In,
            new ValuesParameters($values),
        );
    }

    /**
     * @param array<int|string,mixed> $values
     */
    public static function notIn(
        array $values,
    ): static {
        return new static(
            RuleType::NotIn,
            new ValuesParameters($values),
        );
    }

    /**
     * @param array<string,mixed> $arguments
     */
    public static function custom(
        string $name,
        array $arguments = [],
    ): static {
        return new static(
            RuleType::Custom,
            new CustomParameters(
                $name,
                $arguments,
            ),
        );
    }
}
