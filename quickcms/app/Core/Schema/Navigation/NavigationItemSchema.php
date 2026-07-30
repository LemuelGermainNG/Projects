<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation;
use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasBadge;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasRoute;
use App\Core\Support\Concerns\HasUrl;
use App\Core\Support\Concerns\HasVisible;

final class NavigationItemSchema extends Schema
{
    use HasLabel;
    use HasIcon;
    use HasRoute;
    use HasUrl;
    use HasBadge;
    use HasVisible;
    use HasProps;

    /**
     * @var array<NavigationItemSchema>
     */
    protected array $children = [];

     /**
     * @param array<NavigationItemSchema> $children
     */
    public function children(?array $children = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->children;
        }

        return $this->with('children', $children);
    }
}
