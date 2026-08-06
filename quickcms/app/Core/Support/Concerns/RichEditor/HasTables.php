<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasTables
{
    protected bool|Closure $tables = false;

    public function tables(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'tables',
            $enabled,
        );
    }

    public function isTables(): bool|Closure
    {
        return $this->tables;
    }
}
