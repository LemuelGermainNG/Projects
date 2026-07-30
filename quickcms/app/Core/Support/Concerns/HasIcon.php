<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Contracts\IconInterface;
use Closure;

trait HasIcon
{
    protected string|IconInterface|Closure|null $icon = null;

    public function icon(
        string|IconInterface|Closure|null $icon = null,
    ): string|IconInterface|Closure|static|null {
        if (func_num_args() === 0) {
            return $this->icon;
        }

        return $this->with('icon', $icon);
    }
}
