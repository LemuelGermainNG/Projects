<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasProps
{
    /**
     * @var array<string, mixed>
     */
    protected array $props = [];

    /**
     * @param array<string, mixed>|null $props
     *
     * @return array<string, mixed>|static
     */
    public function props(?array $props = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->props;
        }

        return $this->with('props', $props);
    }

    public function prop(
        string $key,
        mixed $value,
    ): static {
        return $this->props([
            ...$this->props,
            $key => $value,
        ]);
    }

    public function hasProp(string $key): bool
    {
        return array_key_exists(
            $key,
            $this->props,
        );
    }

    public function removeProp(string $key): static
    {
        $props = $this->props;

        unset($props[$key]);

        return $this->props($props);
    }
}
