<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasChildren
{
    /**
     * @var array<int, Schema>
     */
    protected array $children = [];

    /**
     * @param array<int, Schema>|null $children
     *
     * @return array<int, Schema>|static
     */
    public function children(?array $children = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->children;
        }

        return $this->with('children', $children);
    }

    public function addChild(Schema $child): static
    {
        return $this->children([
            ...$this->children(),
            $child,
        ]);
    }

    public function hasChildren(): bool
    {
        return $this->children() !== [];
    }

    public function firstChild(): ?Schema
    {
        return $this->children()[0] ?? null;
    }

    public function lastChild(): ?Schema
    {
        $children = $this->children();

        if ($children === []) {
            return null;
        }

        return $children[array_key_last($children)];
    }
}
