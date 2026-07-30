<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;
use ReflectionFunction;

trait EvaluatesValues
{
    protected function evaluate(mixed $value): mixed
    {
        if (! $value instanceof Closure) {
            return $value;
        }

        $reflection = new ReflectionFunction($value);

        if ($reflection->getNumberOfParameters() === 0) {
            return $value();
        }

        return $value($this->context);
    }
}
