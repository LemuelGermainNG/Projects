<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;
use ReflectionFunction;
use BackedEnum;

trait EvaluatesValues
{
    protected function evaluate(mixed $value): mixed
    {
        if ($value instanceof Closure) {
            $reflection = new ReflectionFunction($value);

            $value = $reflection->getNumberOfParameters() === 0
                ? $value()
                : $value($this->context);
        }

        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        return $value;
    }
}
