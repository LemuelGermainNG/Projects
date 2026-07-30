<?php

declare(strict_types=1);

namespace App\Core\Support\Contracts;

interface EvaluationContextInterface
{
    public function record(): mixed;

    public function user(): mixed;

    public function data(): array;

    public function get(string $key, mixed $default = null): mixed;

    public function with(string $key, mixed $value): static;
}
