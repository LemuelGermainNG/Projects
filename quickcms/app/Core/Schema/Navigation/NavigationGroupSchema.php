<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasProps;

final class NavigationGroupSchema extends Schema
{
    use HasLabel;
    use HasIcon;
    use HasProps;

    protected ?string $id = null;

    protected int $sort = 0;

    /**
     * @var array<NavigationItemSchema>
     */
    protected array $items = [];

    public function id(
        ?string $id = null,
    ): string|static|null {
        if (func_num_args() === 0) {
            return $this->id;
        }

        return $this->with('id', $id);
    }

    public function sort(
        ?int $sort = null,
    ): int|static {
        if (func_num_args() === 0) {
            return $this->sort;
        }

        return $this->with('sort', $sort ?? 0);
    }

    /**
     * @param array<NavigationItemSchema>|null $items
     */
    public function items(
        ?array $items = null,
    ): array|static {
        if (func_num_args() === 0) {
            return $this->items;
        }

        return $this->with('items', $items ?? []);
    }
}
