<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasProps;

final class NavigationSchema extends Schema
{
    use HasProps;

    /**
     * @var array<NavigationItemSchema|NavigationGroupSchema>
     */
    protected array $items = [];

    /**
     * @var array<NavigationGroupSchema>
     */
    protected array $groups = [];

    /**
     * @param array<NavigationItemSchema|NavigationGroupSchema>|null $items
     */
    public function items(
        ?array $items = null,
    ): array|static {
        if (func_num_args() === 0) {
            return $this->items;
        }

        return $this->with('items', $items ?? []);
    }

    /**
     * @param array<NavigationGroupSchema>|null $groups
     */
    public function groups(
        ?array $groups = null,
    ): array|static {
        if (func_num_args() === 0) {
            return $this->groups;
        }

        return $this->with('groups', $groups ?? []);
    }
}
