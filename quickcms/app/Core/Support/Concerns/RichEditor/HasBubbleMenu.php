<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasBubbleMenu
{
    protected bool|Closure $bubbleMenu = false;

    public function bubbleMenu(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'bubbleMenu',
            $enabled,
        );
    }

    public function isBubbleMenu(): bool|Closure
    {
        return $this->bubbleMenu;
    }
}
