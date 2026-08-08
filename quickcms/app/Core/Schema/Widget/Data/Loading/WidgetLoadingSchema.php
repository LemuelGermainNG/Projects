<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Loading;

use App\Core\Schema\Schema;
use Closure;

final class WidgetLoadingSchema extends Schema
{
    protected bool|Closure $enabled = false;

    protected string|Closure|null $message = null;

    public function enabled(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'enabled',
            $enabled,
        );
    }

    public function message(
        string|Closure|null $message,
    ): static {
        return $this->with(
            'message',
            $message,
        );
    }

    public function isEnabled(): bool|Closure
    {
        return $this->enabled;
    }

    public function messageValue(): string|Closure|null
    {
        return $this->message;
    }
}
