<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasDehydrated
{
    protected bool|Closure $dehydrated = true;

    public function dehydrated(
        bool|Closure $dehydrated = true,
    ): static {
        return $this->with(
            'dehydrated',
            $dehydrated,
        );
    }

    public function shouldDehydrate(): bool|Closure
    {
        return $this->dehydrated;
    }
}
