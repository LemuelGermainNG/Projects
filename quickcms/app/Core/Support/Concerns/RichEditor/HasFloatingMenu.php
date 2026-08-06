<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasFloatingMenu
{
    protected bool|Closure $floatingMenu = false;

    public function floatingMenu(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'floatingMenu',
            $enabled,
        );
    }

    public function isFloatingMenu(): bool|Closure
    {
        return $this->floatingMenu;
    }
}
