<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use App\Core\Support\Enum\Editor\ToolbarItem;
use Closure;

trait HasToolbar
{
    /**
     * @var array<int, ToolbarItem|string>|Closure|null
     */
    protected array|Closure|null $toolbar = null;

    /**
     * @param array<int, ToolbarItem|string>|Closure|null $toolbar
     *
     * @return array<int, ToolbarItem|string>|Closure|static|null
     */
    public function toolbar(
        array|Closure|null $toolbar = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->toolbar;
        }

        return $this->with(
            'toolbar',
            $toolbar,
        );
    }
}
