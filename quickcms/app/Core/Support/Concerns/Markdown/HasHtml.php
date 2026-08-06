<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use Closure;

trait HasHtml
{
    protected bool|Closure $html = false;

    public function html(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('html', $enabled);
    }

    public function isHtml(): bool|Closure
    {
        return $this->html;
    }
}
