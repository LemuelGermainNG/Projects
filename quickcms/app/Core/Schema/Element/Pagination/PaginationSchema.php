<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Pagination;

use App\Core\Schema\Schema;

final class PaginationSchema extends Schema
{
    protected bool $enabled = true;

    protected int $perPage = 15;

    /**
     * @var array<int>
     */
    protected array $options = [
        15,
        30,
        50,
        100,
    ];

    protected bool $simple = false;

    public function enable(): static
    {
        return $this->with('enabled', true);
    }

    public function disable(): static
    {
        return $this->with('enabled', false);
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function perPage(?int $perPage = null): int|static
    {
        if (func_num_args() === 0) {
            return $this->perPage;
        }

        return $this->with('perPage', $perPage);
    }

    /**
     * @param array<int>|null $options
     *
     * @return array<int>|static
     */
    public function options(?array $options = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->options;
        }

        return $this->with('options', $options);
    }

    public function simple(): static
    {
        return $this->with('simple', true);
    }

    public function isSimple(): bool
    {
        return $this->simple;
    }
}
