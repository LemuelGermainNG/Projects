<?php

declare(strict_types=1);

namespace App\Core\Support\Contexts;

use App\Core\Support\Contracts\EvaluationContextInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

final readonly class EvaluationContext implements EvaluationContextInterface
{
    public function __construct(
        protected mixed $record = null,

        protected ?Collection $records = null,

        protected ?Authenticatable $user = null,

        protected array $data = [],
    ) {
    }

    public function record(): mixed
    {
        return $this->record;
    }

    public function records(): Collection
    {
        return $this->records ?? collect();
    }

    public function hasRecords(): bool
    {
        return $this->records()->isNotEmpty();
    }

    public function user(): ?Authenticatable
    {
        return $this->user;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function has(string $key): bool
    {
        return array_key_exists(
            $key,
            $this->data,
        );
    }

    public function get(
        string $key,
        mixed $default = null,
    ): mixed {
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

    public function isBulk(): bool
    {
        return $this->hasRecords();
    }

    public function isRow(): bool
    {
        return $this->record() !== null;
    }

    public function isHeader(): bool
    {
        return ! $this->isRow() && ! $this->isBulk();
    }
}
