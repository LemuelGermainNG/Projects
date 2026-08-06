<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Image;

use Closure;

trait HasAvatar
{
    protected bool|Closure $avatar = false;

    public function avatar(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'avatar',
            $enabled,
        );
    }

    public function isAvatar(): bool|Closure
    {
        return $this->avatar;
    }
}
