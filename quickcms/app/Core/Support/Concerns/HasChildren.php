<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasChildren
{
    /**
     * @var array<Schema>
     */
    protected array $children = [];

    /**
     * @return array<Schema>|static
     */
    public function children(?array $children = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->children;
        }

        return $this->with('children', $children);
    }

    public function child(Schema $child): static
    {
        return $this->with('children', [
            ...$this->children,
            $child,
        ]);
    }
}
