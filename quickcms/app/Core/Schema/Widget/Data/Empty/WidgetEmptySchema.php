<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Empty;

use App\Core\Schema\Schema;
use Closure;

final class WidgetEmptySchema extends Schema
{
    protected string|Closure|null $message = null;

    protected string|Closure|null $icon = null;

    public function message(
        string|Closure|null $message,
    ): static {
        return $this->with(
            'message',
            $message,
        );
    }

    public function icon(
        string|Closure|null $icon,
    ): static {
        return $this->with(
            'icon',
            $icon,
        );
    }

    public function messageValue(): string|Closure|null
    {
        return $this->message;
    }

    public function iconValue(): string|Closure|null
    {
        return $this->icon;
    }
}
