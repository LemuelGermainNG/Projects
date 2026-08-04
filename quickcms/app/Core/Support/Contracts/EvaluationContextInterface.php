<?php

declare(strict_types=1);

namespace App\Core\Support\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

interface EvaluationContextInterface
{
    public function record(): mixed;

    public function records(): Collection;

    public function hasRecords(): bool;

    public function user(): ?Authenticatable;

    public function data(): array;

    public function get(string $key, mixed $default = null): mixed;

    public function with(string $key, mixed $value): static;
}
