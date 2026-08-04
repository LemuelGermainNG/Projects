<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasNoResultsMessage
{
    protected string|Closure|null $noResultsMessage = null;

    public function noResultsMessage(
        string|Closure|null $noResultsMessage = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->noResultsMessage;
        }

        return $this->with(
            'noResultsMessage',
            $noResultsMessage,
        );
    }
}
