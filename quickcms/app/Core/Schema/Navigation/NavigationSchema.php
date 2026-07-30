<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasProps;

final class NavigationSchema extends Schema
{
    use HasIcon;
    use HasLabel;
    use HasProps;

    /**
     * @var array<NavigationItemSchema>
     */
    protected array $items = [];

    /**
     * @param array<NavigationItemSchema>|null $items
     *
     * @return array<NavigationItemSchema>|static
     */
    public function items(?array $items = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->items;
        }

        return $this->with('items', $items);
    }
}
