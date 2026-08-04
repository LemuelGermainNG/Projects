<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasLoadingMessage
{
    protected string|Closure|null $loadingMessage = null;

    public function loadingMessage(
        string|Closure|null $loadingMessage = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->loadingMessage;
        }

        return $this->with(
            'loadingMessage',
            $loadingMessage,
        );
    }
}
