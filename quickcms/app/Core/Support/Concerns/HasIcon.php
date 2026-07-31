<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Contracts\IconInterface;
use Closure;

trait HasIcon
{
    protected IconInterface|string|Closure|null $icon = null;

    public function icon(
        IconInterface|string|Closure|null $icon = null,
    ): IconInterface|string|static|Closure|null {
        if (func_num_args() === 0) {
            return $this->icon;
        }

        return $this->with('icon', $icon);
    }
}
