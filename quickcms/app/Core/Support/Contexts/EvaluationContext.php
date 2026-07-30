<?php

declare(strict_types=1);

namespace App\Core\Support\Contexts;

use App\Core\Support\Contracts\EvaluationContextInterface;

final readonly class EvaluationContext implements EvaluationContextInterface
{
    public function __construct(
        protected mixed $record = null,
        protected mixed $user = null,
        protected array $data = [],
    ) {
    }

    public function record(): mixed
    {
        return $this->record;
    }

    public function user(): mixed
    {
        return $this->user;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    public function with(string $key, mixed $value): static
    {
        return new self(
            record: $this->record,
            user: $this->user,
            data: [
                ...$this->data,
                $key => $value,
            ],
        );
    }
}
