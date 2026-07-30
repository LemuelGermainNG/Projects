<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasAttributes
{
    /**
     * Extra HTML attributes.
     *
     * @var array<string, mixed>
     */
    protected array $attributes = [];

    /**
     * Get all HTML attributes.
     *
     * @return array<string, mixed>
     */
    public function attributes(): array
    {
        return $this->attributes;
    }

    /**
     * Set an HTML attribute.
     */
    public function attribute(string $key, mixed $value): static
    {
        $this->attributes[$key] = $value;

        return $this;
    }
}
