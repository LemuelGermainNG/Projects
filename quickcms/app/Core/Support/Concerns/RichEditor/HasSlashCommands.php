<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasSlashCommands
{
    protected bool|Closure $slashCommands = false;

    public function slashCommands(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'slashCommands',
            $enabled,
        );
    }

    public function isSlashCommands(): bool|Closure
    {
        return $this->slashCommands;
    }
}
